 <!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.head')
@stack('style')
</head>
<body class="hold-transition sidebar-mini skin-purple layout-fixed">
	<div class="wrapper">
		@include('layouts.header')
		@include('layouts.sidebar')
		@section('main-content')
			@show	
		@include('layouts.footer')	 
	</div>
</body>
@stack('script')
</html>