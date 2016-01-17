<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link href="{{ asset('css/all.css') }}" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		@include('partials.header')
		@include('partials.nav')

		<div class="container">
			@include('flash::message')
			@yield('content')
		</div>
		@include('articles._asideLatest')

		<!-- Scripts -->
		<script src="{{ asset('js/all.js') }}"></script>
		@yield('footer')

	</div>
	<script>
		//$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>

</body>
</html>
