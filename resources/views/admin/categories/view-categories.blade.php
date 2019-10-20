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
					<a href="#" class="current">View Categories</a>
				</div>
				<h1>All Categories</h1>
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
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								<h5>Ctegories</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Description</th>
											<th>Url</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($categories as $category)
											<tr class="gradeX">
												<td>{{ $category->id }}</td>
												<td>{{ $category->name }}</td>
												<td>{{ $category->description }}</td>
												<td>{{ $category->url }}</td>
												<td class="center">
													<a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-mini">Edit</a>
													<a href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-mini">Delete</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end-main-container-part-->
@endsection