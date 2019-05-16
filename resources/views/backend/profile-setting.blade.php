@extends('backend.layouts.master')

<?php $title = strtolower(Auth::user()->username) ; ?>
@section('title', $title)

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">
<style>
/* style for skill level */
.eo-button-box-radio{
    cursor:pointer;
}
label{
	display: inline-block;
	font-weight: bold;
}
.eo-button-box{

margin-right: 10px;
height: 145px;
}
.col-md-4{
	padding: 3px;
}
.active{
	color:green;
}

</style>
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Account Settings</h4>
				<button form="profile-info-form" class="button mid-short primary">Save Changes</button>
            </div>
            <!-- /HEADLINE -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item">
					<h4>Profile Information</h4>
					<label for="name" class="right-edit-button position-absolute" id="edit"> Edit </label> 
					<hr class="line-separator">
					
					<div class="input-container row">
						<div class="col-md-3">
							<label for="acc_name" class="rl-label">User Id: </label> 
						</div>
						<div class="col-md-8"> 
							<span class="text-name">{{$user->username }}</span> 
						</div>
						
					</div>
					<form action="{{url('/profile/update')}}" id="update_profile" data-parsley-validate method="post">
					<input id="token" type="hidden" name="_token" value="{{csrf_token() }}" />
					<div class="input-container">
						<label  class="rl-label ">Full Name</label>
						<input value="{{$user->name }}" disabled="false"  required type="text" id="name" name="name" placeholder="Enter name here...">
					</div>
					
					<div class="input-container">
						<label class="rl-label ">Email Address</label>
						<input value="{{$user->email }}" disabled="false" required type="email" id="email" name="email" placeholder="Enter email address here...">
						<span class="invalid-feedback"></span>
					</div>

					<div class="input-container">
						<label class="rl-label">Title</label>
						<input value="{{$userinfo->user_title }}" disabled="false" type="text" id="user_title" name="user_title" placeholder="Enter title here...">
					</div>

					<div class="">
						<label  class="rl-label">Description</label>
						<textarea  disabled="false" id="user_description" disabled="false" name="user_description" placeholder="Enter description here...">{{$userinfo->user_description }}</textarea>
					</div>

					<div class="input-container">
						<label class="rl-label ">Additonal Notes</label>
						<input disabled="false" value="{{$userinfo->user_additional_info }}" type="text" id="additional_info" name="additional_info" placeholder="Enter additional info here...">
					</div>

					<div class="input-container">
						<label class="rl-label ">Hourly Rate </label>
						<input disabled="false" value="{{$user->hourly_rate }}" type="text" id="hourly_rate" style="font-weight: bolder;font-size: 20px;" name="hourly_rate" placeholder="Enter hourly rate here...">
						<span  style="font-weight: bolder;font-size: 20px;margin: -37px 2px;position: absolute;">$</span>
					</div>

					<span id="buttoncontrol">
						<button type="reset" id="cancalreadonly" class="btn btn-sm btn-default">Cancal</button>
						<button type="submit" id="update" class="btn btn-sm btn-success">Update</button>
					</span>
				</form>
			</div>
				<!-- /FORM BOX ITEM -->

				<div class="form-box-item position-relative">
					<h4>Location</h4>
						<button type="button" class="right-edit-button position-absolute" data-toggle="modal" data-target="#location"> Edit </button> 
					<hr class="line-separator">
					
					<form action="account-setting/" method="POST" name="location-form" id="location-form">	

					<div class="input-container row">
						<div class="col-md-4"><label for="city_name" class="rl-label">Country </label> </div>
						<div class="col-md-8"> <span class="text-name"><img src="http://localhost/hotlancerd/images/badges/flags/flag_usa_s.png" alt=""> {{ $user->country}}</span> </div>
					</div>

					<div class="input-container row ">
						<div class="col-md-4"><label for="city_name" class="rl-label">Language </label> </div>
						<div class="col-md-8"> 
							<span class="text-name">{{ $userinfo->language.' - '.$userinfo->lang_level }}</span> 
						</div>
					</div>

					<div class="input-container row">
						<div class="col-md-4"><label for="time_zone" class="rl-label">Time Zone </label> </div>
							<div class="col-md-8"> <span class="text-name">{{$userinfo->user_timezone }}</span> 
						</div>
					</div>

					<div class="input-container row">
						<div class="col-md-4"><label for="city_name" class="rl-label">State/city </label> </div>
						<div class="col-md-8"> <span class="text-name">{{$userinfo->user_state}} </span> </div>
												
					</div>
					
					<div class="input-container row">
						<div class="col-md-4"><label for="zipcode" class="rl-label">Postal Code</label> </div>
						<div class="col-md-8"> <span class="text-name">{{$userinfo->zip_code}} </span> </div>					
					</div>
					
					<div class="input-container">
						
					</div>
					<!-- /INPUT CONTAINER -->

					<div class="input-container row">
						<div class="col-md-4"><label for="phone_no" class="rl-label">Phone </label> </div>
							<div class="col-md-8"> <span class="text-name">{{$userinfo->user_phone}} </span> </div>
												
					</div>
					
					<!-- INPUT CONTAINER -->
					
					<div class="input-container row">
						<div class="col-md-4"><label for="address_name" class="rl-label">Address </label> </div>
							<div class="col-md-8"> <span class="text-name">{{$userinfo->user_address}} </span> </div>
												
					</div>
					
					<hr class="line-separator">
					<h4>Experience level </h4>
					<hr class="line-separator">
					<div class=" row control-feedback">
                      	<label for="Entry" class="col-md-4 labbel_box"  onclick="activeButton('Entryactive')">
									<div class="p-lg-top-bottom ng-pristine ng-untouched ng-valid eo-button-box eo-button-box-radio ng-not-empty report_hidden <?php if($userinfo->skill_level == 'Entry'){echo 'active';} ?>" id="Entryactive">
									<span>Entry level</span>
									<p class="m-sm-bottom">Starting to build experience.</p> 
									<input type="radio" id="Entry" class="labbel_box_radio"  name="experience_level" value="Entry level" onchange='select_radio_project_type("Entry")'>
									</div>
                                </label>
								<label for="Intermediate" class="col-md-4  labbel_box"  for="Intermediate" onclick="activeButton('Intermediateactive')">
									<div class="p-lg-top-bottom ng-pristine ng-untouched ng-valid eo-button-box eo-button-box-radio ng-not-empty report_hidden <?php if($userinfo->skill_level == 'Intermediate'){echo 'active';} ?>" id="Intermediateactive">
									<span>Intermediate</span>
									<p class="m-sm-bottom">A few years of professional experience.</p>
									<input type="radio" id="Intermediate" class="labbel_box_radio" name="experience_level"  value="Intermediate Level" onchange='select_radio_project_type("Intermediate")'>
									</div>
								</label> 

								<label class="col-md-4 labbel_box"  for="Expert" onclick="activeButton('Expertactive')">
									<div class="p-lg-top-bottom ng-pristine ng-untouched ng-valid eo-button-box eo-button-box-radio ng-not-empty report_hidden <?php if($userinfo->skill_level == 'Expert'){echo 'active';} ?>" id="Expertactive">
									<span>Expert</span>

									<p class="m-sm-bottom">Many years of professional experience.</p>
									<input type="radio" id="Expert" class="labbel_box_radio" name="experience_level"  value="Expert" onchange='select_radio_project_type("Expert")'>
									</div>
								</label> 
                     	</div>	
                     	</form>			
				</div>

				<div class="form-box-item selected">
					<h4>Skills & Tags </h4>
					<button type="button" class="right-edit-button position-absolute" data-toggle="modal" data-target="#Skills_Tags"> Edit </button> 
					<hr class="line-separator">
					
					<div class="input-container">
						<label for="state_city2" class="rl-label ">Select skills</label>
						<p>
						<?php 
							$getskills= explode(',', $userinfo->user_skills);
							for($i = 0; $i<count($getskills); $i++){
								echo ' <span class="Tags">'.$getskills[$i].'</span> ';
							}
						?>
							
						</p>
					</div>
					<div class="input-container">
						<label for="state_city2" class="rl-label">Select Tags</label>
						<p>
						<?php 
							$gettags = explode(',', $userinfo->user_tags);
							for($j = 0; $j<count($gettags); $j++){
								echo ' <span class="skills">'.$gettags[$j].'</span> ';
							}
						?>
					</p>
					</div>
				</div>
			</div>
			<!-- /FORM BOX -->
        </div>
        <!-- DASHBOARD CONTENT -->
      
 <!-- location modal --->  
	<div id="location" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Location</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			<form action="{{url('location/update')}}" data-parsley-validate method="post" id="profile_info">
				 {{ csrf_field() }}
	        <div class="modal-body form-box-item">

				<div class="input-container half">
					<label for="state_city2" class="rl-label required">Select Language</label>
					<label for="state_city2" class="select-block">
						<select name="language" style="width:100%" class="select2">

							<option value="{{$userinfo->language }}">{{$userinfo->language }}</option>
							@foreach ($get_language as $language) 
								<option value="{{ $language->lang_name}}">
									{{ $language->lang_name}}
								</option>
							@endforeach
						</select>
						
					</label>
				</div>

				<div class="input-container half">
					<label for="state_city2" class="rl-label required">Language Level</label>
					<label for="state_city2" class="select-block">
						<select name="lang_level" style="width:100%">

							<option value="{{$userinfo->lang_level }}">{{$userinfo->lang_level }}</option>
								<option value="Basic">Basic</option>
								<option value="Conversational">Conversational</option>
								<option value="Fluent">Fluent</option>
								<option value="Native">Native</option>
						</select>
						
					</label>
				</div>

				<div class="input-container">
					<label for="state_city2" class="rl-label required">Timezone</label>
					<label for="state_city2" class="select-block">
						<select name="user_timezone" style="width:100%" class="select2">

							<option value="{{$userinfo->user_timezone }}">{{$userinfo->user_timezone }}</option>
							@foreach ($get_timezone as $timezone) 
								<option value="{{'('.$timezone->UTC_offset.') '.$timezone->TimeZone }}">
									{{'('.$timezone->UTC_offset.') '.$timezone->TimeZone }}
								</option>
							@endforeach
						</select>
						</label>
					</div>

					<div class="input-container half">
						<label class="rl-label required">State/City</label>
						<input name="user_state" value="{{ $userinfo->user_state }}" type="text" placeholder="Enter your Zip Code here...">
					</div>
					<div class="input-container half">
						<label for="zipcode3" class="rl-label required">Zip Code</label>
						<input name="zip_code" value="{{$userinfo->zip_code }}" type="text" placeholder="Enter your Zip Code here...">
					</div>

					<div class="input-container">
					
						<label class="rl-label">Phone</label>
						<div class="input-group">
							
							<input name="user_phone" type="text" value="{{$userinfo->user_phone }}" placeholder="Exam: +100000000">
						</div>					
					</div>
					<div class="input-container">
						<label class="rl-label required">Address</label>
						<input name="user_address" value="{{$userinfo->user_address }}" type="text" id="" placeholder="Enter address here...">
					</div>
	        </div>
	        <div class="modal-footer">
	          <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Cancal</button>
	          <button type="submit" class="btn btn-sm btn-success">Update</button>
	        </div>
	        </form>
	      </div>
	    </div>
	</div>
	<!-- End location model---->

	<div id="Skills_Tags" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Skills & Tags</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			<form action="{{url('skillTags/update')}}" method="post" id="profile_info">
				 {{ csrf_field() }}
	        <div class="modal-body form-box-item">
				<div class="input-container">
						<label for="state_city2" class="rl-label ">Select skills</label>
						<label for="state_city2" class="select-block">
							<select name="user_skills[]" id="user_skills" multiple="multiple" style="width:100%" class="select2">
								<?php 
									if($userinfo->user_skills){
										$getselectkills = explode(',', $userinfo->user_skills);
										for($i = 0; $i<count($getselectkills); $i++){
											echo '<option selected="selected" value="'.$getselectkills[$i].'">'.$getselectkills[$i].'</option>';
										}
									}
								?>
								@foreach ($get_key_skills as $key_skill) 
									<option value="{{ $key_skill->skills_name }}">
										{{ $key_skill->skills_name }}
									</option>
								@endforeach
							</select>
							
						</label>
				</div>
				<div class="input-container">
					<label for="state_city2" class="rl-label">Select Tags</label>
					<label for="state_city2" class="select-block">
						<select name="user_tags[]" id="user_tags" multiple="multiple" style="width:100%" class="select2">

							<?php 	
								if($userinfo->user_tags){
									$getselecttags = explode(',', $userinfo->user_tags);
									for($i = 0; $i<count($getselecttags); $i++){
										echo '<option selected="selected" value="'.$getselecttags[$i].'">'.$getselecttags[$i].'</option>';
									}
								}
							?>

							@foreach ($get_key_keyword as $keyword) 
								<option value="{{$keyword->keyword_name}}">
									{{$keyword->keyword_name}}
								</option>
							@endforeach
						</select>
						
					</label>
				</div>
	        </div>
	        <div class="modal-footer">
	          <button type="reset" class="btn btn-sm btn-default" data-dismiss="modal">Cancal</button>
	          <button type="submit" class="btn btn-sm btn-success">Update</button>
	        </div>
	        </form>
	      </div>
	    </div>
	</div>
@endsection

@section('js')
<script>
	$(document).ready(function(){
		
		$('#user_tags').click(function(){
			alert("fs");
		});

		$('#email').blur(function(){
			var email = $(this).val();
			var token = $('input[name="_token"]').val();
			if(email != ""){
				$.ajax({
					method:'post',
					url:'{{ URL::to("/checkemail") }}',
					data:{email:email, _token:token },
					success:function(data){
						
						if(data){
							$('.invalid-feedback').html(data);
							$('#update').attr('disabled', 'disabled');
							$('#update').attr('style', 'cursor:not-allowed');
						}else{
							$('.invalid-feedback').empty();
							$('#update').removeAttr('disabled');
							$('#update').removeAttr('style', 'cursor:not-allowed');
						}
					}
				});
			}else{
				
				$('.invalid-feedback').html('Field is required');
				$('#update').attr('disabled', 'disabled');
				$('#update').attr('style', 'cursor:not-allowed');
			}
		});

		$('#edit').click(function(){
			$('#update_profile input, textarea').attr('style', 'border:1px solid #ebebeb');
			$('#update_profile input, textarea').removeAttr('disabled');
			$('#buttoncontrol').attr('style', 'display:block');
			
		});

		$('#cancalreadonly').click(function(){
			$('#update_profile input, textarea').attr('disabled', true);
			$('#update_profile input, textarea').attr('style', 'border:none');
			$('.invalid-feedback, .parsley-errors-list').empty();
			$('#buttoncontrol').attr('style', 'display:none');
		});

		$("#update_profile").submit(function(e){
    		e.preventDefault();

			var getdata = $(this).serialize();
				$.ajax({
					method:'post',
					url:'{{ URL::to("/profile/update") }}',
					data:getdata,
					success:function(data){
						
						if(data){
							$('#update_profile input, textarea').attr('disabled', true);
							$('#update_profile input, textarea').attr('style', 'border:none');
							$('#buttoncontrol').attr('style', 'display:none');
							
						}else{
							$('.invalid-feedback').html("error");
							alert('error');
						}
					}
				});
		});
	});

	
</script>

<script>
	function select_radio_project_type(level){

		$.ajax({
			method:'post',
			url:'{{ URL::to("/experience/update") }}',
			data:{
				experience_level:level,
				_token:$('#token').val()
			},
			success:function(data){
				alert('Experience updated');
			}
		});
		
	}
     function activeButton(id){

        if(id == "Entryactive"){
            var element = document.getElementById(id);
             element.classList.add("active");

             var remove = document.getElementById('Intermediateactive');
             remove.classList.remove("active");
             var remove = document.getElementById('Expertactive');
             remove.classList.remove("active");

        }
        if(id == "Intermediateactive"){
            var element = document.getElementById(id);
             element.classList.add("active");

             var remove = document.getElementById('Entryactive');
             remove.classList.remove("active");
             var remove = document.getElementById('Expertactive');
             remove.classList.remove("active");
        }

        if(id == "Expertactive"){
            var element = document.getElementById(id);
             element.classList.add("active");

             var remove = document.getElementById('Intermediateactive');
             remove.classList.remove("active");

             var remove = document.getElementById('Entryactive');
             remove.classList.remove("active");
        }

        
     }
    </script>


<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	
@endsection