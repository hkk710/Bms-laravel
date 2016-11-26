<!DOCTYPE html>
<html>
	<head>
		@section('title', "Edit - $mb->name")
		@include('partials._head')
	</head>
	<body style="background: #000;">
		@include('partials._sidenav')
		<div class="container w3-margin-top w3-padding-top">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						{!! Form::model($mb, ['route' => ['membership.update', $mb->id], 'method' => 'PUT']) !!}
							{{ Form::label('name', 'Name:') }}
							{{ Form::text('name', null, ['class' => 'form-control w3-margin-bottom', 'placeholder' => 'name...']) }}

							{{ Form::label('gender', 'Gender:') }}
							<div class="w3-margin-bottom">
								{{ Form::radio('gender', 'male', true, ['id' => 'g-male']) }} {{ Form::label('g-male', 'Male') }}
								{{ Form::radio('gender', 'female', false, ['id' => 'g-female']) }} {{ Form::label('g-female', 'Female') }}
							</div>

							{{ Form::label('department', 'Department:') }}
							{{ Form::text('department', null, ['class' => 'form-control w3-margin-bottom', 'placeholder' => 'department...']) }}

							{{ Form::label('religion', 'Religion:') }}
							{{ Form::text('religion', null, ['class' => 'form-control w3-margin-bottom', 'placeholder' => 'religion...']) }}

							{{ Form::label('caste', 'Caste:') }}
							{{ Form::text('caste', null, ['class' => 'form-control w3-margin-bottom', 'placeholder' => 'caste...']) }}

							{{ Form::label('address', 'Address:') }}
							{{ Form::textarea('address', null, ['class' => 'form-control w3-margin-bottom', 'placeholder' => 'address...', 'style' => 'max-width: 100%; min-width: 100%; min-height: 150px; max-height: 150px']) }}

							{{ Form::label('profile_picture', 'Profile Picture') }}
							{{ Form::file('profile_picture', ['class' => 'w3-margin-bottom']) }}

							{{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@include('partials._message')
		<script>
			function w3_open() {
			    $("#mySidenav").show('slow');
			    $("#mySidenav1").show();
			}
			function w3_close() {
			    $("#mySidenav").hide('slow');
			    $("#mySidenav1").hide();
			}
		</script>
	</body>
</html>