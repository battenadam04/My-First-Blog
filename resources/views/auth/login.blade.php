@extends('main')

@section('title', '| Login')

@section('content')
	
	<div class="row account-section col-12 col-sm-6 col-md-offset-3">
		<div class="col-md-10 col-md-offset-1">
			<h1>Login</h1>
			{!! Form::open() !!}

				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}

				{{ Form::label('password', "Password:") }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				
				<br>
				{{ Form::checkbox('remember') }}{{ Form::label('remember', "Remember Me") }}
				
				<br>
				{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}

				<p><a href="{{ url('password/reset') }}">Forgot My Password</a>


			{!! Form::close() !!}
		</div>
	</div>

@endsection