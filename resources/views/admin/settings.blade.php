@extends('layouts.adminLayout.admin_design')

@section('content')
		<!--main-container-part-->
		<div id="content">
			<!--breadcrumbs-->
			<div id="content-header">
				<div id="breadcrumb">
					<a href="index.html" title="Go to Home" class="tip-bottom">
						<i class="icon-home"></i> Home
					</a>
					<a href="#" class="current">Settings</a>
				</div>
				<h1>Admin Settings</h1>
	            @if (Session::has('flash_message_error'))
	                <div class="alert alert-error alert-dismissible">
	                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <strong>{!! session('flash_message_error') !!}</strong>
	                </div>
	            @endif

	            @if (Session::has('flash_message_success'))
	                <div class="alert alert-success alert-dismissible">
	                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <strong>{!! session('flash_message_success') !!}</strong>
	                </div>
	            @endif
			</div>
			<!--End-breadcrumbs-->
			
			<div class="container-fluid">
				<hr>
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"> <i class="icon-info-sign"></i> </span>
								<h5>Update Password</h5>
							</div>
							<div class="widget-content nopadding">
								<form class="form-horizontal" method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">
									@csrf
									
									<div class="control-group">
										<label class="control-label">Current Password</label>
										<div class="controls">
											<input type="password" name="current_pwd" id="current_pwd" />
											<span id="chkPwd"></span>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">New Password</label>
										<div class="controls">
											<input type="password" name="new_pwd" id="new_pwd" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Confirm password</label>
										<div class="controls">
											<input type="password" name="confirm_pwd" id="confirm_pwd" />
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" value="Update Password" class="btn btn-success">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end-main-container-part-->
@endsection