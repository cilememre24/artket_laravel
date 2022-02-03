
<!DOCTYPE HTML>
<html>
	<head>
        @include('navbar')
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
                                    <h2><a href="#">{{ $post['title'] }} (VOTE: VOTE%)</a></h2>
                                    <p>{{ $post['description'] }}</p>
                                </div>
                                <div class="meta">
                                    <time class="published" datetime="2015-11-01">November 1, 2015</time>
                                    <a onclick="location.href='PROFILE'" class="author"><span class="name">{{ $user['username'] }}</span><img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="" /></a>
                                </div>
                            </header>

                            <a href="#" class="image featured"><img src="{{ $post['image_path'] }}" alt="" /></a>
                            <p>The various visual arts exist within a continuum that ranges from purely aesthetic purposes at one end to purely utilitarian purposes at the other. Such a polarity of purpose is reflected in the commonly used terms artist and artisan, the latter understood as one who gives considerable attention to the utilitarian. This should by no means be taken as a rigid scheme, however. </p>
                            <footer class="post_footer">
                                <ul class="actions">
                                    <li><a onclick="location.href='LONG TEXT POST'" class="button large">Continue Reading</a></li>
                                </ul>
                                <ul class="stats">
                                    <li><a href="#">General</a></li>
                                    <li><a href="#" class="icon solid fa-heart">28</a></li>
                                    <li><a href="#" class="icon solid fa-comment">128</a></li>
                                </ul>
                            </footer>
                        </article>
                    </form>

                <article class="post">

								<footer class="post_footer">
                                <div  class="container">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#vote" data-toggle="tab">Vote</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#comment" data-toggle="tab">Comment</a></li>
                                            </ul>
                                        </div>

                                    <div class="tab-content clearfix" style="margin-top:25px;text-align:center;">
                                        <div class="active tab-pane" id="vote">

                                        <form  action="" method="post" enctype="multipart/form-data">
                                            <input type="text" name="vote_num" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125"
                                            value="100" data-width="100" data-height="60" data-fgColor="#924219">
                                            <hr>
                                            <input type="submit" name="vote" value="Vote" style="background-color:#924219;color:white;" class="btn d-flex flex-row icons d-flex align-items-center">
                                        </form>
                                        </div>

                                        {{-- YORUM YAPAN USERLARI BUL POST İDLER EŞLEŞİYOR COMMENTS TABLOSUYLA
                                        USER TABLOSUNDAN DA YORUMU YAPAN KİŞİNİN BİLGİLERİNİ GETİR --}}

                                        <div class="tab-pane" id="comment">

                                          <div id="comments" class="comments">

                                            <div class="d-flex flex-row mb-2"> <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" width="40" class="rounded-image">
                                                <div class="d-flex flex-column ml-2"><b> <span class="name">USERNAME</span></b> <small class="comment-text">CONTENT</small>
                                                    <div class="d-flex flex-row align-items-center status">DATE</small> </div>
                                                </div>
                                            </div>
                                            <hr>

                                          </div>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="input-group">
                                                    <input type="text" name="comment_content" class="form-control rounded-corner" placeholder="Write a comment...">
                                                    <span class="input-group-btn p-l-10">
                                                    <input class="btn btn-primary f-s-6 rounded-corner" name="Comment" type="submit" value="Comment">
                                                    </span>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    </div>
                                </div>
								</footer>
							</article>
                        </div>
					</div>
                </nav>
            </div>
        </section>


		{{-- <!-- Scripts -->
			<script src="js/jquery.min.js"></script>
            <script src="js/popper.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/adminlte.min.js"></script>
            <script src="js/jquery.knob.min.js"></script>
			<script src="js/browser.min.js"></script>
			<script src="js/breakpoints.min.js"></script>
			<script src="js/util.js"></script>
            <script src="js/post_main.js"></script> --}}

{{-- 

            <script>
                  $(function($) {

                $(".knob").knob({
                    change : function (value) {
                        //console.log("change : " + value);
                    },
                    release : function (value) {
                        //console.log(this.$.attr('value'));
                        console.log("release : " + value);
                    },
                    cancel : function () {
                        console.log("cancel : ", this);
                    },
                    /*format : function (value) {
                        return value + '%';
                    },*/
                    draw : function () {

                        // "tron" case
                        if(this.$.data('skin') == 'tron') {

                            this.cursorExt = 0.3;

                            var a = this.arc(this.cv)  // Arc
                                , pa                   // Previous arc
                                , r = 1;

                            this.g.lineWidth = this.lineWidth;

                            if (this.o.displayPrevious) {
                                pa = this.arc(this.v);
                                this.g.beginPath();
                                this.g.strokeStyle = this.pColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });

                // Example of infinite knob, iPod click wheel
                var v, up=0,down=0,i=0
                    ,$idir = $("div.idir")
                    ,$ival = $("div.ival")
                    ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
                    ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
                $("input.infinite").knob(
                                    {
                                    min : 0
                                    , max : 20
                                    , stopper : false
                                    , change : function () {
                                                    if(v > this.cv){
                                                        if(up){
                                                            decr();
                                                            up=0;
                                                        }else{up=1;down=0;}
                                                    } else {
                                                        if(v < this.cv){
                                                            if(down){
                                                                incr();
                                                                down=0;
                                                            }else{down=1;up=0;}
                                                        }
                                                    }
                                                    v = this.cv;
                                                }
                                    });
                });
        </script> --}}

	</body>
</html>
