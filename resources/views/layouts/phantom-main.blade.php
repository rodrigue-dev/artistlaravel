<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <meta charset="utf-8">    
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ Vite::asset('resources/css/phantom/main.css') }}" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

        <!-- Fonts TODO : choisir les polices -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="shortcut icon" href="{{ Vite::asset('resources/images/curtains.png') }}" type="image/x-icon">
    </head>
	<body class="is-preload">
		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header -->
				<header id="header">
					<div class="inner">

						<!-- Logo -->
							<a href="index.html" class="logo">
								<span class="symbol"><img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" /></span><span class="title">Phantom</span>
							</a>

						<!-- Nav -->
							<nav>
								<ul>
									<li><a href="#menu">Menu</a></li>
								</ul>
							</nav>

					</div>
				</header>

			<!-- Menu -->
				<nav id="menu">
					<h2>Menu</h2>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="generic.html">Ipsum veroeros</a></li>
						<li><a href="generic.html">Tempus etiam</a></li>
						<li><a href="generic.html">Consequat dolor</a></li>
						<li><a href="elements.html">Elements</a></li>
					</ul>
				</nav>

			<!-- Main -->
				<div id="main">
					<div class="inner">
						<header>
							<h1>This is Phantom, a free, fully responsive site<br />
							template designed by <a href="http://html5up.net">HTML5 UP</a>.</h1>
							<p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
						</header>
						<section class="tiles">
						@foreach($shows as $show)
							<article class="{{ ['style1','style2','style3','style4','style5'][rand(0,4)] }}">
								<span class="image">
									<img src="{{ Vite::asset('resources/images/shows/'.$show->poster_url) }}" alt="{{ $show->title }}">
								</span>
								<a href="{{ route('show.showBySlug',$show->slug) }}">
									<h2>{{ $show->title }}</h2>
									<div class="content">
										<p>{{ $show-> description }}</p>
									</div>
								</a>
							</article>
						@endforeach	
						</section>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<section>
							<h2>Get in touch</h2>
							<form method="post" action="#">
								<div class="fields">
									<div class="field half">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>
									<div class="field half">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="field">
										<textarea name="message" id="message" placeholder="Message"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send" class="primary" /></li>
								</ul>
							</form>
						</section>
						<section>
							<h2>Follow</h2>
							<ul class="icons">
								<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
								<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
								<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
								<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
							</ul>
						</section>
						<ul class="copyright">
							<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</footer>

		</div>

		<!-- Scripts -->
		<script src="{{ Vite::asset('resources/js/phantom/jquery.min.js') }}"></script>
		<script src="{{ Vite::asset('resources/js/phantom/browser.min.js') }}"></script>
		<script src="{{ Vite::asset('resources/js/phantom/breakpoints.min.js') }}"></script>
		<script src="{{ Vite::asset('resources/js/phantom/util.js') }}"></script>
		<script src="{{ Vite::asset('resources/js/phantom/main.js') }}"></script>
	</body>
</html>
