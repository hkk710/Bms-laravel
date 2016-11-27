<!DOCTYPE html>
<html>
	<head>
		@section('title', 'You are already a member?')
		@include('partials._head')
	</head>
	<body style="background-color: #000;">
		@include('partials._sidenav')
		<div class="container w3-margin-top w3-padding-top">
			<div class="col-md-12">
				<div class="panel-default panel">
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>gender</th>
									<th>department</th>
									<th>religion</th>
									<th>caste</th>
									<th>address</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($mbs as $mb)
									<tr>
										<td>{{ $mb->id }}</td>
										<td>{{ $mb->name }}</td>
										<td>{{ $mb->gender }}</td>
										<td>{{ $mb->department }}</td>
										<td>{{ $mb->religion }}</td>
										<td>{{ $mb->caste }}</td>
										<td>{{ substr(strip_tags($mb->address), 0, 30) }}{{ strlen(strip_tags($mb->address)) > 30 ? "....." : "" }}</td>
										<td><a href="{{ route('membership.show', $mb->id) }}" class="btn btn-primary btn-sm">View</a> <a href="{{ route('membership.edit', $mb->id) }}" class="btn btn-warning btn-sm">Edit</a> <a href="{{ route('membership.delete', $mb->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
									</tr>
								@endforeach
							</tbody>
							{{ $mbs->links() }}
						</table>
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