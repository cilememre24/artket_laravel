

<!doctype html>
<html lang="en">
  <head>

    @include('navbar')
  	<title>Explore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="post.css">-->
	<!-- <link rel="stylesheet" href="explore.css">  -->


  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

	</head>
	<body>

    <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
      <div class="container-fluid">
    	<div class="row">
      <div class="card-columns">
            @foreach($posts as $post)
              <div class="card card-pin">
                <img class="card-img" src="{{ $post['image_path'] }}" alt="Card image">
                <div class="overlay">
                  <h2 class="card-title title"><{{ $post['title'] }}</h2>
                  <div class="more">
                  <a href="{{ route('go_to_post', ['id' => $post['id']])}}">
                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
    	</div>
    </div>
		  </nav>

        </div>

	</section>


	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
