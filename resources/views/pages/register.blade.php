@extends('layouts.default')
@section('content')

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Academic Registration</h3>
	  </div>
	  <div class="panel-body">
	    <div class="row">
			<div class="col-md-6">
			    <form class="form-horizontal to-start form-register" id="form-register" method="post" enctype="multipart/form-data">
			      <div class="form-group">
			        <label class="col-sm-3 control-label" for="exampleInputUsername">Username</label>
			        <div class="col-sm-7">
			            <input name="username" type="text" class="form-control" id="exampleInputUsername" placeholder="john" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputEmail1">Email</label>
			        <div class="col-sm-7">
			            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="john@gmail.com" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputAcademy">Academy Name</label>
			        <div class="col-sm-7">
			            <input name="academy_name" type="text" class="form-control" id="exampleInputAcademy" placeholder="Lorem Ipsum School" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputTimeslots">Timeslots</label>
			        <div class="col-sm-7">
			            <input name="timeslots" type="text" class="form-control" id="exampleInputTimeslots" placeholder="10:00AM to 06:00PM" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputPhone">Phone</label>
			        <div class="col-sm-7">
			            <input name="phone" type="text" class="form-control" id="exampleInputPhone" placeholder="+91 9876543219" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputDescription">Description</label>
			        <div class="col-sm-7">
			            <textarea name="description" class="form-control" id="exampleInputDescription" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. " rows="3"></textarea>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputLatitude">Latitude</label>
			        <div class="col-sm-7">
			            <input name="latitude" type="text" class="form-control" id="exampleInputLatitude" placeholder="28.98765783" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputLongitude">Longitude</label>
			        <div class="col-sm-7">
			            <input name="longitude" type="text" class="form-control" id="exampleInputLongitude" placeholder="42.56748927" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputFile">Image</label>
			        <div class="col-sm-7">
			            <input name="image" type="file" id="exampleInputFile" required>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for="exampleInputTags">Tags</label>
			        <div class="col-sm-7">
			            <textarea name="tags" class="form-control" id="exampleInputTags" placeholder="Scahool, University, Tuition" rows="3"></textarea>
			        </div>
			      </div>
			      <div class="form-group">
			        <label class="col-sm-3 control-label"  for=""></label>
			        <div class="col-sm-7">
			            <button type="submit" class="btn btn-default">Submit</button>
			        </div>
			      </div>
			      
			    </form>
			</div>	 
			<div class="col-md-6" id="alert-messages">
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Welcome KleverKid!</strong>
				</div>
			</div>     
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
	    $(".form-register").submit(function(){
	        var formData = new FormData($(this)[0]);
	        $.ajax({
	            url: "<?php echo url('/'); ?>/api/signup",
	            type: 'POST',
	            data: formData,
	            async: false,
	            success: function (data) {
	                if(data.status == 'success'){
	                    // alert('Successfully registred.');
	                    document.getElementById("alert-messages").innerHTML += ('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully registred.</div>');
	                    document.getElementById("form-register").reset();
	                }else{
	                    // alert(data.message);
	                    document.getElementById("alert-messages").innerHTML += ('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data.message+'</div>');
	                }
	            },
	            error: function (data){
	                alert("Error : "+data);
	            },
	            cache: false,
	            contentType: false,
	            processData: false
	        });

	        return false;
	    });
	</script>
	<style type="text/css">
	.form-register label{
		text-align: left !important;
	}
	</style>
@stop