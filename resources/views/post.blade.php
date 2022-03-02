
<!DOCTYPE HTML>
<html>
	<head>
        @include('navbar')
        @include('partials.vote')
        @include('partials.scripts')
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


		<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

	</head>
	<body class="is-preload">

    <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
				<div id="main">
                    <form action="" method="get">
						<!-- Post -->
                        <article class="post">

                            <header>
                                <div class="title">
                                    <h2><a href="#">{{ $post['title'] }} (VOTE: {{ $vote }}%)</a></h2>
                                    <p>{{ $post['description'] }}</p>
                                </div>
                                <div class="meta">
                                    <time class="published" datetime="2015-11-01">  {{ $post['created_at']}}</time>
                                    <a href='{{ route('profile',['id' => $user['id'] ])}}' class="author"><span class="name">{{ $user['username'] }}</span><img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="" /></a>
                                </div>
                            </header>

                            <a href="#" class="image featured"><img src="\{{ $post['image_path'] }}" alt="" /></a>
                                                            
                            @if($post['type']=='text')
                                    @foreach($text_post as $tp)
                                        {{-- <div>{!! Str::limit($tp['context'], 60) !!}</div>  --}}
                                        <div style="max-height: 98px; overflow:hidden;">
                                        {!! $tp['context'] !!}
                                         </div>
                                    @endforeach
                                    ...
                            @endif   
                            
                            <footer class="post_footer">
                                <ul class="actions">
                                    @if($post['type']=='text')
                                        <li><a onclick="location.href='{{ route('post_next', ['id' => $post['id']])}}'" class="button large">Continue Reading</a></li>
                                    @endif
                                </ul>
                                <ul class="actions">
                                    <li><a onclick="makeVisible('comments')" class="button medium">Show Comments</a></li>
                                </ul>
                                @if($is_voted==true)
                                    <ul class="actions disabled">
                                        <a class="button medium"
                                        style="cursor: pointer;background:rgb(194, 80, 80)"
                                        data-toggle="modal"
                                        data-target="#voteModal">{{ __('Vote') }}</a>
                                        <li></li>
                                    </ul>
                                @else
                                <ul class="actions">
                                    <a class="button medium"
                                    style="cursor: pointer;background:rgb(95, 158, 95)"
                                    data-toggle="modal"
                                    data-target="#voteModal">{{ __('Vote') }}</a>
                                    <li></li>
                                </ul>
                                @endif

                                <ul class="stats">
                                    <li><a href="#">{{ $post['type'] }}</a></li>
                                </ul>
                            </footer>
                        </article>
                    </form>


                <article  id="comments" style="visibility: hidden;padding-top:10px;" class="post">
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- Fetch Comments -->
                                        <div class="card my-4">
                                            {{-- <h5 class="card-header">Comments <span class="badge badge-dark"></span></h5> --}}
                                            <div class="card-body">
                                                <form method="post" action="{{ route('make_comment', ['id' => $post['id']])}}" enctype="multipart/form-data">
                                                    @csrf
                                                <textarea placeholder="Add a new comment..." name="comment" class="form-control"></textarea>
                                                <input style="float: right;" type="submit" name="submit" class="btn btn-dark mt-2" />
                                                </form>
                                            </div>
                                            <hr/>
                                            <div class="card-body">
                                                @foreach($comments as $comment)
                                                <blockquote class="blockquote">
                                                    <div><div d-flex flex-row mb-2><img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" width="40" style="border-radius:50px;margin-right:20px;float: left;">
                                                    <div style="font-weight:bold;" class="d-flex flex-row"><small>cilememre</small> </div></div>
                                                    <p class="d-flex content">{{ $comment['content'] }}</p></div>
                                                    <footer class="blockquote-footer" style="float: right;">{{ $comment['created_at'] }}</footer>
                                                </blockquote>
                                                <hr/>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                        
                                </div>
							</article>

                        </div>
					</div>
                    
                </nav>
            </div>
        </section>



        <script>
            function makeVisible(id){
                var x = document.getElementById(id);
                
                if (x.style.visibility === 'hidden') {
                    x.style.visibility = 'visible';
                } else {
                    x.style.visibility = 'hidden';
                }

            }
        </script>

	</body>
</html>


