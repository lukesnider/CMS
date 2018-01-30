<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$page->title}}</title>

    	<!-- Styles -->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
  
	</head>
<body>	


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
        
	</body>
</html>
