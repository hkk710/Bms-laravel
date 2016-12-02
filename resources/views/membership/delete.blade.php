<!DOCTYPE html>
<html>
	<head>
		@section('title', "Delete - $mb->name")
		@include('partials._head')
	</head>
	<body style="background: #000;">
		@include('partials._sidenav')
		<div class="container w3-padding-top w3-margin-top">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 class="w3-text-red text-center">Are you sure you want to delete this member?</h2>
						<hr>
						{!! Form::model($mb) !!}
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
							<div class="col-sm-12 col-md-5 w3-padding-0">
	    						{{ Form::label('profile_picture', 'Profile Picture') }}
	    						<div class="thumbnail">
	      							<img src="{{ asset($mb->profile_picture) }}" alt="">
							    </div>
							</div>
						{!! Form::close() !!}
						<div class="col-md-12">
							<div class="container-fluid">
								<div class="col-sm-6">
									{!! Form::open(['route' => ['membership.destroy', $mb->id], 'method' => 'DELETE']) !!}
										{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block w3-margin-bottom']) }}
									{!! Form::close() !!}
								</div>
								<div class="col-sm-6">
									<a href="{{ route('membership.show', $mb->id) }}" class="btn btn-default btn-block w3-margin-bottom">Cancel</a>
								</div>
							</div>
						</div>
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
			$(function() {
				$('input, textarea').attr('readonly', 'readonly');
				$('input[type="radio"]').attr('disabled', 'disabled');
			})
		</script>
	</body>
</html>