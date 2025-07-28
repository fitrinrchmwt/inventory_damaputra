@extends('template.section')

@section('title', 'Profile')

@section('content')

<div class="container-fluid">
	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
	<div class="row d-flex justify-content-center align-items-center">
		<div class="col-sm-5">
			<div class="card card-primary">
				<div class="card-header" style="background-color: #99627A; color: white;">
					<h5 class="mt-2"><i class="fa fa-user"></i> Profile </h5>
				</div>
				<div class="card-header d-flex justify-content-center align-items-center" style="background-color: #99627A; color: white;">
					<i class="fas fa-4x fa-user-circle"></i>
					<span class="mr-2 d-none d-lg-inline text-white-600 large" style="padding-left: 15px;">
						{{ $user->username }}
					</span>
				</div>
				<div class="card-body">
					<div class="box-content">
						<form class="form-horizontal" method="POST" action=""
							enctype="multipart/form-data">
							<fieldset>
								<div class="control-group mb-3">
									<label class="control-label" for="typeahead">Id User </label>
									<div class="input-group">
										<input type="text" class="form-control" style="border-radius:0px;" name="id_user"
											data-items="4" value="{{ $user->id_user }}" readonly>
									</div>
								</div>
								<div class="control-group mb-3">
									<label class="control-label" for="typeahead">Username </label>
									<div class="input-group">
										<input type="text" class="form-control" style="border-radius:0px;" name="username"
											data-items="4" value="{{ $user->username }}" readonly>
									</div>
								</div>

								<div class="control-group mb-3">
									<label class="control-label" for="typeahead">Email </label>
									<div class="input-group">
										<input type="email" class="form-control" style="border-radius:0px;" name="email"
											value="{{ $user->email }}" readonly>
									</div>
								</div>
								<div class="control-group mb-3">
									<label class="control-label" for="typeahead">Level </label>
									<div class="input-group">
										<input type="text" class="form-control" style="border-radius:0px;" name="level_user"
											value="{{ $user->level_user }}" readonly>
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