<!DOCTYPE HTML>

<html>
	<head>
        @include('navbar')
        @include('partials.vote')
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	</head>
	<body class="single is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">title</a></h2>
										<p>description</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">November 1, 2015</time>
										<a onclick="location.href='profile.php?username=username'" class="author"><span class="name">cilememre</span><img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="" /></a>
									</div>
								</header>
								<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
								<p>The various visual arts exist within a continuum that ranges from purely aesthetic purposes at one end to purely utilitarian purposes at the other. Such a polarity of purpose is reflected in the commonly used terms artist and artisan, the latter understood as one who gives considerable attention to the utilitarian. This should by no means be taken as a rigid scheme, however. Even within one form of art, motives may vary widely; thus a potter or a weaver may create a highly functional work that is at the same time beautiful—a salad bowl, for example, or a blanket—or may create works that have no purpose beyond being admired. In cultures such as those of Africa and Oceania, a definition of art that encompasses this continuum has existed for centuries. In the West, however, by the mid-18th century the development of academies for painting and sculpture established a sense that these media were “art” and therefore separate from more utilitarian media. This separation of art forms continued among art institutions until the late 20th century, when such rigid distinctions began to be questioned.</p>
								<footer class="post_footer">
                                    <ul class="actions">
                                        <li><a onclick="makeVisible('comments')" class="button medium">Show Comments</a></li>
                                    </ul>
                                    <ul class="actions">
                                        <a class="button medium"
                                        style="cursor: pointer;"
                                        data-toggle="modal"
                                        data-target="#voteModal">{{ __('Vote') }}</a>
                                        <li></li>
                                    </ul>
                                    <ul class="stats">
                                        <li><a href="#">Text</a></li>
                                    </ul>
                                </footer>
							</article>
</form>
					</div>

			</div>

		 <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
			<script src="{{ asset('js/browser.min.js') }}"></script>
			<script src="{{ asset('js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('js/util.js') }}"></script>
			<script src="{{ asset('js/main.js') }}"></script>
	</body>
</html>
