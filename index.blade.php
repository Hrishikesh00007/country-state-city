<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Country State City Dropdown</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
	<div class="container">
  	<h2>Select Country</h2>
 <form class="form-inline" action="{{ url('ajaxupload') }}" method="POST" id="addpost">
     @csrf
     <div class="form-group">
        <label >Country</label>
         <input type="text" class="form-control" id="country" placeholder="Enter country" name="country">
      </div>
     <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  	<h2>Select state respect to country</h2>
	<form class="form-inline" action="{{ url('ajaxuploadstate') }}" method="POST" id="addpoststate">
         @csrf
		<div class="form-group">

		<select id="country" class="form-control" name="country">
			<option value="">Select Country</option>
			@foreach($country as $list)
				<option value="{{$list->id}}">{{$list->country}}</option>
			@endforeach
		</select>
		
		<br/>
		 <label >State</label>
         <input type="text" class="form-control" id="state" placeholder="Enter state" name="state">
		<br/>
		<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	  </form>
	</div>

	<h2>Country State City </h2>
	<form class="form-inline" action="{{ url('ajaxuploadcity') }}" method="POST" id="addpostcity">
          @csrf
		<div class="form-group">
		<select id="country1" class="form-control" name="country1">
			<option value="">Select Country</option>
			@foreach($country as $list1)
				<option value="{{$list1->id}}">{{$list1->country}}</option>
			@endforeach
		</select>
		<br/><br/>
		<br/>
		<select id="state1" class="form-control" name="state1">
			<option value="">Select State</option>
		</select>
		<br/>
		<br/><br/>
		<label >City</label>
         <input type="text" class="form-control" id="city1" placeholder="Enter city" name="city1">
		<br/>

        <button type="submit" class="btn btn-primary">Submit</button>
		</div>
	  </form>
	
		<br/><br/>
<a href="/world"><button type="button" class="btn btn-success">Show Table</button></a>
	</div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
		<script>
		jQuery(document).ready(function(){
			jQuery('#country1').change(function(){
               // alert('g');
				let cid=jQuery(this).val();
                //alert(cid);
				 jQuery('#city').html('<option value="">Select City</option>')
				jQuery.ajax({
					url:'/getState',
					type:'post',
					data:'cid='+cid+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#state1').html(result)
					}
				});
			});	

            $('#addpost').on('submit',function(event){
                event.preventDefault();
               jQuery.ajax({
                url:"{{ url('ajaxupload') }}",
                data:jQuery('#addpost').serialize(),
                type:'post',

                success:function(result){
                    jQuery('#addpost')[0].reset(); 
                }
               })
            });

              $('#addpoststate').on('submit',function(event){
                event.preventDefault();
               // alert('vh');
               jQuery.ajax({
                url:"{{ url('ajaxuploadstate') }}",
                data:jQuery('#addpoststate').serialize(),
                type:'post',

                success:function(result){
                    jQuery('#addpoststate')[0].reset(); 
                }
               })
            });

            $('#addpostcity').on('submit',function(event){
                event.preventDefault();
               // alert(event);
               jQuery.ajax({
                url:"{{ url('ajaxuploadcity') }}",
                data:jQuery('#addpostcity').serialize(),
                type:'post',

                success:function(result){
                    jQuery('#addpostcity')[0].reset(); 
                }
               })
            });

			
		});
			
		</script>
  </body>
</html>
		
		