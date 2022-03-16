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
					<h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong><br />
					<span>@</span>{{ $user->username }}<br />
					you can go to the profile <a href='{{ route('profile',['id' => Crypt::encrypt($user->id )])}}'>here</a>.</h1>
				</div>
			</header>

		<!-- Main -->
			<div id="main">
					<section id="two">
						<h2>Posts</h2>
						@if (empty($posts))
              			<p>You have no post!</p>
            			@else
            			<div class="row">
              			@foreach ($posts as $post)
							<article class="col-6 col-12-xsmall work-item">
								<a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post['id'])])}}" class="image fit thumb"><img src="../{{ $post->image_path }}" alt="" /></a>
								<h3>{{ $post->title }}</h3>
								<p>{{ $post->description }} </p>
							</article>
						
							@endforeach
						</div>
					  @endif
					</section>


			</div>

	</body>
</html>



<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/browser.min.js') }}"></script>
<script src="{{ asset('js/breakpoints.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script src="{{ asset('js/post_main.js') }}"></script>