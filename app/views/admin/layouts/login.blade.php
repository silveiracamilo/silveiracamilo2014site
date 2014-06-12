<!doctype html>
<html>
	<head>
		<title>SILVEIRACAMILO - CMS / Login</title>
		<meta charset="utf-8">
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="logo-topo">
		   <img src="/assets/images/logo_silveiracamilo_admin.jpg"/>
		</div>
		<br>
		<div class="content">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>
	</body>

</html>