<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    	<!-- Styles -->
		
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
		<link href="{{ asset('css/summernote.css') }}" rel="stylesheet"> 
	</head>
<body>		

	@include('admin.nav')



	<div id="app">

		@yield('content')
	</div>


	
		
			<!-- Scripts -->
		<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('js/popper.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

		<script src="https://cdn.jsdelivr.net/npm/vue"></script>
		<script src="https://unpkg.com/vuex"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
		<script src="{{ asset('js/summernote.min.js') }}"></script>


		@stack('scripts-admin')
	</body>
</html>
