<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $data['country'] = DB::table('country')->orderBy('country', 'asc')->get();
        return view('index', $data);
    }


    public function worldlist(Request $request)
    {
        // $data['city']=DB::table('city')->orderBy('city1','asc')->get();
        // return view('index',$data);
        $customers = DB::table('city')
            ->select('city.*', 'country.country as countryName', 'state.state as stateName')
            ->leftJoin('country', 'country.id', 'city.country')
            ->leftJoin('state', 'state.id', 'city.state')
            ->get();
        // return $customers;

        return view('world', ['data' => $customers]);
    }


    public function getState(Request $request)
    {
        //echo "f";
        $cid = $request->post('cid');
        $state = DB::table('state')->where('country', $cid)->orderBy('state', 'asc')->get();
        // print_r($state);
        $html = '<option value="">Select State</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->state . '</option>';
        }
        echo $html;
    }

    public function getCity(Request $request)
    {
        $sid = $request->post('sid');
        $city = DB::table('city')->where('state', $sid)->orderBy('city', 'asc')->get();
        $html = '<option value="">Select City</option>';
        foreach ($city as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->city . '</option>';
        }
        echo $html;
    }

    public function upload(Request $request)
    {
        $customer = DB::table('country')->insert(
            [
                [
                    'country' => $request->country
                ]
            ]
        );

        return response()->json([]);
    }


    public function uploadstate(Request $request)
    {
        $customer = DB::table('state')->insert(
            [
                [
                    'country' => $request->country,
                    'state' => $request->state
                ]
            ]
        );

        return response()->json([]);
    }


    public function uploadcity(Request $request)
    {
        //  echo "ggg";
        $customer = DB::table('city')->insert(
            [
                [
                    'country' => $request->country1,
                    'state' => $request->state1,
                    'city1' => $request->city1
                ]
            ]
        );
        // print_r($customer);
        return response()->json([]);
    }
}
