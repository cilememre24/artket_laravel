<!doctype html>
<html lang="en">
  <head>
    @include('navbar')
    @include('partials.scripts')
  	<title>Top List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/top_list.css') }}">

	</head>
	<body>

  <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light text-center" id="ftco-navbar">
          <div class="search-container">
            <input id="search" type="text" name="search" placeholder="Search..." class="search-input">
            <a href="#" class="search-btn">
                    <i class="fas fa-search"></i>
            </a>
          </div>

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
		<div class="container" id="top_list_body">
            @php($i=1)
            @foreach($ordered_posts as $post)
                <div class="tab-content">
                    <div class="tab-pane fade show active" role="tabpanel">
                        <div class="accordion">
                            <div class="card content_pool_item_add content_pool_item">
                                    <div class="card-header">
                                        <a href="{{ route('go_to_post', ['id' => $post->id])}}" noajax="1" class="btn_toplist_play_descriptor">
                                            <div class="item">
                                                <div class="item-order fixed">
                                                    <p>{{ $i++ }}</p>
                                                </div>

                                                <div class="item-img">
                                                    <img src="{{ $post->image_path }}" width="125" height="81"/>
                                                </div>

                                                <div class="item-link">
                                                  <strong>{{ $post->title }}</strong>
                                                  <span>{{ $post->description }}</span>
                                                  <div class="postcard__bar"></div>
                                                  <h6><i>Vote: {{ $post->value }}</i></h6>
                                                </div>

                                                <i class="fas fa-angle-double-right"></i>

                                            </div>
                                        </a>
                                    </div>

                                </div>

                </div>
        <!-- </div> -->

    </div>

		  <!-- </nav> -->
    </div>
    @endforeach

        </div>
	</section>

    <script>
        window.console = window.console || function(t) {};
      </script>

        <script>
        if (document.location.search.match(/type=embed/gi)) {
          window.parent.postMessage("resize", "*");
        }
      </script>

      <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var cat_id =0;
        $('#js-select-type').on('change', function(e){
          cat_id = e.target.value;

          $.ajax({
                type: "get",
                url: "top_list/" + cat_id,
                data:"",
                cache: false,
                success: function(data){
                  $("#top_list_body").html(data);
                }
            })

        });

        $('#search').on('keyup',function(){
           var value=$(this).val();

          if(value != ''){
            $.ajax({
                type: "post",
                url: "top_list/",
                data:"value=" + value,
                cache: false,
                success: function(data){
                  $("#top_list_body").html(data);
                  // console.log(data);
                }
            })
          }

        });

      </script>



</body>
</html>
