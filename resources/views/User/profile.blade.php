@extends('template.section')

@section('title', 'Profile')

@section('content')

<div class="container-fluid">
	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
	<div class="row d-flex justify-content-center align-items-center">
		<div class="col-sm-5">
			<div class="card card-primary">
				<div class="card-header" style="background-color:rgb(238, 241, 247)">
					<h5 class="mt-2"><i class="fa fa-user"></i> Profile </h5>
				</div>
				<div class="card-header d-flex justify-content-center align-items-center" style="background-color:rgb(238, 241, 247)">
					<i class="fas fa-4x fa-user-circle"></i>
					<span class="mr-2 d-none d-lg-inline text-gray-600 large" style="padding-left: 15px;">Douglas McGee</span>
				</div>
				<div class="card-body">
					<div class="box-content">
						<form class="form-horizontal" method="POST" action=""
							enctype="multipart/form-data">
							<fieldset>
								<div class="control-group mb-3">
									<label class="control-label" for="typeahead">Id User </label>
									<div class="input-group">
										<input type="text" class="form-control" style="border-radius:0px;" name="nama"
											data-items="4" value="ADM-001" readonly>
									</div>
								</div>
								<div class="control-group mb-3">
									<label class="control-label" for="typeahead">Username </label>
									<div class="input-group">
										<input type="text" class="form-control" style="border-radius:0px;" name="nama"
											data-items="4" value="Admin Penjualan" readonly>
									</div>
								</div>
								<div class="control-group mb-3">
									<label class="control-label" for="typeahead">Email </label>
									<div class="input-group">
										<input type="email" class="form-control" style="border-radius:0px;" name="email"
											value="adminpenjualan1@gmail.com" readonly>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->


@endsection