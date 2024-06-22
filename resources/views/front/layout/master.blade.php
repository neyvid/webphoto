@include('front.layout.head')
	<body data-plugin-page-transition>		
		<div class="body">
@include('front.layout.header')

			<div role="main" class="main">
				@yield('main-content')
			
			</div>

@include('front.layout.footer')