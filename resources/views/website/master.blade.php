<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">


<head>
	@include('website.components.head')
</head>

<body>

<!-- <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="ABgBjhuZ"></script> -->
<div class="home-page-box">
	<header>
		@include('website.components.header')
		@include('website.components.mainBanner')
	</header>
</div>
	@yield('main')
	@include('website.components.teamBanner')
	@include('website.components.footer')
	@include('website.components.scripts')
	@yield('scripts')
	<!--end::Page Scripts-->

		<!-- Go to www.addthis.com/dashboard to customize your tools --> 
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63fdeb2a80d380cd"></script>
</body>
<!--end::Body-->

</html>
