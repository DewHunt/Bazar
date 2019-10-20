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
					<a href="#">Categories</a>
					<a href="#" class="current">Edit Category</a>
				</div>
				<h1>Edit Category</h1>
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
								<h5>Edit Category</h5>
							</div>
							<div class="widget-content nopadding">
								<form class="form-horizontal" method="post" action="{{ url('/admin/edit-category/'.$categoryDetails->id) }}" name="edit_category" id="edit_category" novalidate="novalidate">
									@csrf
									<div class="control-group">
										<label class="control-label">Category Name</label>
										<div class="controls">
											<input type="text" name="category_name" id="category_name" value="{{ $categoryDetails->name }}">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Description</label>
										<div class="controls">
											<textarea name="description" id="description" rows="5">{{ $categoryDetails->description }}</textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">URL</label>
										<div class="controls">
											<input type="text" name="url" id="url" value="{{ $categoryDetails->url }}">
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" value="Edit Category" class="btn btn-success">
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