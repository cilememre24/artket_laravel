

<!doctype html>
<html lang="en">
  <head>

    @include('navbar')
    @include('partials.scripts')
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
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light text-center" id="ftco-navbar">

            <div class="categories">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <div class="" style="max-width: 250px; margin: auto;">
                  <select id="js-select-type" class="category form-control js-select-design" name="category">
                        <option data-content="Choose the category" value="0" selected>Choose the category</option>
                        <option data-content="Text" value="1" >Text</option>
                        <option data-content="Image" value="2" >Image</option>
                        <option data-content="Video" value="3" >Video</option>
                        <option data-content="Audio" value="4" >Audio</option>
                </select>
              </div>
  
  
        </nav>
          </div>
  
    </section>

    <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
        
      <div class="container-fluid" id="explore-container">
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

  <script>
          var cat_id =0;
        $('#js-select-type').on('change', function(e){
          cat_id = e.target.value;

          $.ajax({
                type: "get",
                url: "explore/" + cat_id,
                data:"",
                cache: false,
                success: function(data){
                  $("#explore-container").html(data);
                }
            })

        });
  </script>


</body>
</html>

