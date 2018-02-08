<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
	<style>
		body {
			padding-top: 70px;
		}

		/* Sticky footer styles
-------------------------------------------------- */

		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			height: 60px;
			/* Set the fixed height of the footer here */
			line-height: 60px;
			/* Vertically center the text there */
			background-color: #f5f5f5;
		}

		/* Custom page CSS
-------------------------------------------------- */
	</style>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/home') }}">SIUM | AYUDA</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					<li>
						<a href="{{ url('/auth/login') }}">Entrar</a>
					</li>
					<li>
						<a href="{{ url('/auth/register') }}">Registrar</a>
					</li>
					@else
					<li>
						<a href="{{url('admin/bank')}}">Bancos</a>
					</li>
					<li>
						<a href="{{url('admin/layout')}}">Procesar Layout</a>
					</li>
					<li>
						<a href="#">{{ Auth::user()->name }}</a>
					</li>
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">Cerrar</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
					@endif
				</ul>
			</div>
		</div>
		<!-- /.container-fluid -->
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<footer class="footer">
		<div class="container">
			&copy; {{ date('Y') }}. Universidad Maya
			<br/>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	@yield('scripts')
</body>

</html>