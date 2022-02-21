<!-- POST GALLERY -->

<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('css/profile_post.css') }}">
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="	background-image: url('../red-green-background.jpg'); ">
				<div class="inner">
					<a href="#" class="image avatar"><img src="upload\images\arkhe-sanat-akademisi-resim-is-ogretmenligi-01.jpg" alt="" /></a>
					<h1><strong>Ad Soyad</strong><br />
					@prof1<br />
					you can go to the profile <a href="http://127.0.0.1:8080/artket/profile.php?username=prof1">here</a>.</h1>
				</div>
			</header>

		<!-- Main -->
			<div id="main">
					<section id="two">
						<h2>Posts</h2>
						<div class="row">
							<article class="col-6 col-12-xsmall work-item">
								<a href="images/fulls/01.jpg" class="image fit thumb"><img src="upload\images\Abstract-Art-Logo-Design.png" alt="" /></a>
								<h3>Title</h3>
								<p>Description </p>
							</article>
							<article class="col-6 col-12-xsmall work-item">
								<a href="images/fulls/02.jpg" class="image fit thumb"><img src="upload\images\Abstract-Art-Logo-Design.png" alt="" /></a>
								<h3>Title</h3>
								<p>Description </p>
							</article>
							<article class="col-6 col-12-xsmall work-item">
								<a href="images/fulls/03.jpg" class="image fit thumb"><img src="upload\images\Abstract-Art-Logo-Design.png" alt="" /></a>
								<h3>Title</h3>
								<p>Description </p>
							</article>
							<article class="col-6 col-12-xsmall work-item">
								<a href="images/fulls/04.jpg" class="image fit thumb"><img src="upload\images\Abstract-Art-Logo-Design.png" alt="" /></a>
								<h3>Title</h3>
								<p>Description </p>
							</article>
							<article class="col-6 col-12-xsmall work-item">
								<a href="images/fulls/05.jpg" class="image fit thumb"><img src="upload\images\Abstract-Art-Logo-Design.png" alt="" /></a>
								<h3>Title</h3>
								<p>Description </p>
							</article>
							<article class="col-6 col-12-xsmall work-item">
								<a href="images/fulls/06.jpg" class="image fit thumb"><img src="upload\images\Abstract-Art-Logo-Design.png" alt="" /></a>
								<h3>Title</h3>
								<p>Description </p>
							</article>
						</div>
					</section>


			</div>

	</body>
</html>



<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/browser.min.js') }}"></script>
<script src="{{ asset('js/breakpoints.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script src="{{ asset('js/post_main.js') }}"></script>