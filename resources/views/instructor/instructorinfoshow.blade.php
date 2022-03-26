
  @extends('layouts/instructor-dashboard')
  @section('instructor-dashboard')   
  
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3>{{trans('instructor.instructor_Dashboard')}}</h3>
        </div>

        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">
			
				@include('instructor.instructor-leftmenu')
	
			</div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
                        
        
    <div class="section-title bg-info">
        <h3>{{trans('instructor.My_Info')}}</h3>
    </div>
    <div id="user-info" class="register">
        @if($errors->any())							
		<section class="widget-title">
			<div class="alert alert-success">
				<p class="text-center">
					{{$errors->first()}}								
				</p>
			</div>
		</section>						
		@endif
		<div class="clearfix"></div>
		
        <form method="POST" action="/instructor/info-update" accept-charset="UTF-8" class="form-horizontal bordered" accept-char="UTF-8" data-parsley-validate="" novalidate="">
		   {{ csrf_field() }}
		@foreach($instructorInfo as $item)
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="section-title bg-info">
                    <h3>{{trans('instructor.Basic_informations')}} </h3>
                </div>
                <div class="input-field col-md-6 col-sm-6 col-xs-12 ">
                    <input name="first_name1" id="first_name1" value="{{$item->firstname}}" placeholder="First Name" class="validate" type="text">
                    <label for="first_name1" class="active">{{trans('instructor.First_Name')}}</label>
                    <span class="help-block">                        
                    </span>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12 ">
                    <input name="last_name1" id="last_name1" value="{{$item->lastname}}" placeholder="Last Name" class="validate" type="text">
                    <label for="last_name1" class="active">{{trans('instructor.Last_Name')}} </label>
                    <span class="help-block">                        
                    </span>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="username" id="username" value="{{$item->name}}" placeholder="Username" class="validate" type="text">
                    <span class="help-block">                        
                    </span>
                    <label for="username" class="active">{{trans('instructor.Username')}}</label>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="email1" id="email1" value="{{$item->email}}" placeholder="Email" class="validate" type="email">                            
                    </span>
                    <label for="email1" class="active">{{trans('instructor.Email')}}</label>
                </div>

                <!--div class="input-field col-md-12 col-sm-12 col-xs-12">
                    <input name="oldpass" data-parsley-minlength="6" id="oldpass" value="" placeholder="Enter old password" class="validate" type="password">
                    <label for="oldpass" class="active">Enter old password</label>
                </div-->

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="newpass" data-parsley-minlength="6" id="newpass" value="" placeholder="New password" class="validate" type="password">
                    <label for="newpass" class="active">{{trans('instructor.New_password')}}</label>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="renewpass" data-parsley-equalto="#newpass" id="renewpass" value="" placeholder="Re-enter new password" class="validate" type="password">
                    <label for="renewpass" class="active">{{trans('instructor.Reenter_new_password')}}</label>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right: 0;margin-top: 20px;">
					<div class="box">						  
					  <select class="wide" id="gender" name="gender" required>
						@if($item->gender == 1)
							<option value="1" selected>{{trans('instructor.male')}}</option>
							<option value="2">{{trans('instructor.female')}}</option>
						@else
							<option value="1">{{trans('instructor.male')}}</option>
							<option value="2" selected>{{trans('instructor.female')}}</option>
						@endif
					  </select>
					  <label for="gender" class="active mt15">{{trans('instructor.Gender')}}:</label>
					</div>
                </div>

                <div class="input-field  col-md-6 ol-sm-6 col-xs-12 " style="padding-right: 0;margin-top: 20px;" >
					<div class="box">
					  <select class="wide" id="language" name="language" required>
						@if($item->language == 1)
							<option value="1" selected>English</option>
							<option value="2">العربية</option>
						@else
							<option value="1">English</option>
							<option value="2" selected>العربية</option>
						@endif
					  </select>
					  <label for="language" class="active  mt15">{{trans('instructor.Language')}}:</label>
					</div>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="age1" min="10" max="100" id="age1" value="{{$item->age}}"  placeholder="Age" class="validate" type="number">
                    <label for="age1" class="active">{{trans('instructor.Age')}}</label>
                </div>
				<input type="hidden" name="user-status2" value="1">
                <div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right: 0;margin-top: 20px;">
                   <div class="box">					  
					  <select class="wide" id="country1" name="country1" required>
											
					  </select>
					  <label for="country1"  class="active  mt15">{{trans('instructor.Country')}}:</label>
					</div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
		
		
		<div class="row more-info">
			@if(!$item->zoom)
			<div class="col-md-8 col-md-offset-2 col-sm-12">
				<div class="section-title bg-warning">
					<h3> Zoom.us </h3>
				</div>
				<div class="input-field col-md-6 col-sm-6 col-xs-12">
					<a href = "{{route('instructorzoomrequest')}}" class="btn btn-warning bg-warning btn-block waves-effect"> Send Request </a>
				</div>
				 
				<div class="input-field col-md-6 col-sm-6 col-xs-12">
					 <a href = "{{route('instructorzoomcheck')}}"  class="btn btn-warning bg-warning btn-block waves-effect"> Check </a>
				</div>
				<div class="clearfix"></div>
			</div>
			@endif
		</div>
	
		
		

		<div class="row more-info">
			<div class="col-md-8 col-md-offset-2 col-sm-12">
				<div class="section-title bg-warning">
					<h3>{{trans('instructor.Additional_informations')}} </h3>
				</div>
				<div class="input-field col-md-6 col-sm-6 col-xs-12">
					<input id="phone1" data-parsley-type="number" name="phone1" value="{{$item->phone}}" type="text">
					<label for="phone1">{{trans('instructor.Phone')}}</label>
				</div>
				<div class="input-field col-md-6 col-sm-6 col-xs-12">
					<input id="skype1" name="skype1" value="{{$item->skype}}" type="text">
					<label for="skype1" class="active">{{trans('instructor.Skype_ID')}}</label>
				</div>
				<div class="input-field col-md-12 col-sm-12 col-xs-12">
					<textarea id="notes1" name="notes1" class="materialize-textarea" >{{$item->notes}}</textarea>
					<label for="notes1">{{trans('instructor.Notes')}}</label>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

			<div class="row more-info">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<div class="section-title bg-warning">
						<h3>{{trans('instructor.Your_Connections')}} </h3>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="cwhatsapp" name="cwhatsapp" value="" type="text">
						<label for="cwhatsapp">{{trans('instructor.whatsapp')}}</label>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="csoma" name="csoma" value="" type="text">
						<label for="csomasoma')}}</label>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="cline" name="cline" value="" type="text">
						<label for="cline">{{trans('instructor.line')}}</label>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="cviber" name="cviber" value="" type="text">
						<label for="cviber">{{trans('instructor.viber')}}</label>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>	

			<div class="row buttons">
				<div class="col-md-12 col-md-offset-4 col-xs-12">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<button type="submit" class="btn btn-warning bg-warning btn-block waves-effect">{{trans('instructor.save')}}</button>
					</div>
				</div>
			</div>
			
		@endforeach
        </form>
    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
  
  @stop  
	