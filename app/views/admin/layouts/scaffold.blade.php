<!doctype html>
<html>
	<head>
		<title>SILVEIRACAMILO - CMS</title>
		<meta charset="utf-8">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
		
		<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="logo-topo">
		   <img src="/assets/images/logo_silveiracamilo_admin.jpg"/>
		</div>
		</br>
		<div class="content">
			<div id="menu">
				
				<a href="/admin/homes" title="Home" class="btn btn-primary">Home</a>
				<a href="/admin/abouts" title="About" class="btn btn-primary">About</a>
				<a href="/admin/work_types" title="Work Types" class="btn btn-primary">Work Types</a>
				<a href="/admin/works" title="Works" class="btn btn-primary">Works</a>
				<a href="/admin/services" title="Services" class="btn btn-primary">Services</a>
				<a href="/admin/posts" title="Posts" class="btn btn-primary">Posts</a>
				<a href="/admin/logout" title="Logout" class="btn btn-danger pull-right">Logout</a>
				
			</div>
			</br>
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>

	</body>

</html>