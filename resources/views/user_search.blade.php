<!doctype html>
<html lang="en">
  <head>

  	<title>User Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_search.css') }}">
	</head>
  <body style="background-color: #536044">
    @include('navbar')
    @include('partials.scripts')
  <section class="ftco-section">
      <div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light text-center" id="ftco-navbar">

                <div class="container d-flex justify-content-center mt-50 mb-50">
            
                    <div class="row">
                        
                        <div class="col-md-12">
          
                            <div class="form">
                              <i class="fa fa-search"></i>
                              <input type="text" id="user_search" name="user_search" class="form-control form-input" placeholder="Search user...">
                            </div>
                            
                          </div>
 
                       <div class="col-md-12" style="margin-top: 30px;" id="user_search_body">
                        
                           {{--  <div class="card card-body">
                                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                            <div class="mr-2 mb-3 mb-lg-0">
                                                
                                                    <img style="border-radius: 10px;" src="images/hp-hero-slide1-02082022-large.jpg" width="150" height="150" alt="">
                                               
                                            </div>
            
                                            <div style="margin-left: 20px;" class="media-body">
                                                <h6 class="media-title font-weight-semibold">
                                                    <a href="#" data-abc="true">Cilem Emre</a>
                                                </h6>
                                                <hr>
            
                                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                                    <strong><li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">cilememre</a></li></strong>
                                                </ul>
            
                                                <p  class="mb-3 rainbow-text">Artist</p>
            
                                            </div>
            
                                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                                                <button type="button" class="btn btn-dark text-white"><i class="icon-cart-add mr-2"></i> Follow</button>
                                                <button type="button" class="btn btn-secondary text-white"><i class="icon-cart-add mr-2"></i> Message</button>
                                            </div>
                                        </div>
                                    </div>--}}
               
                    </div>                      
                    </div>
                </div>
		  </nav>

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


        $('#user_search').on('keyup',function(){
           var value=$(this).val();

           var data='';

           if(value==''){
              data='empty';
           }else{
             data=value;
           }

            $.ajax({
                type: "post",
                url: "user_search/",
                data:"value=" + data,
                cache: false,
                success: function(data){
                  $("#user_search_body").html(data);
                  // console.log(data);
                }
            })

        });

      </script> 


</body>
</html>
