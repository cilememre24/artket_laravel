<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sign_up.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >


    <title>SIGN IN</title>
  </head>
  <body>
    

    <div class="container register">
      <div class="row">
          <div class="col-md-3 register-left">
              <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
              <h3 style="color: #C77951;">Welcome</h3>
              <p>Burada slogan tarzı bir yazı olacak!</p>
              
              <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ route('sign_up') }}">Sign Up</a>
          </div>
          <div class="col-md-9 register-right">
              <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Artist</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Industry</a>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <h3 class="register-heading">Login as an Artist</h3>
                      <div class="row register-form">
                          
	                    <form action="{{ route('sign_in_to_explore')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="col-md-6">

                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" required>
			                </div>
                              <div class="form-group">
				                <input type="password" placeholder="Password" name="password" required>
                            </div>

                          </div>
                          <button type="submit" name="submit" class="btnRegister" value="Login as an Artist" ></button>

                      </form>
                      </div>

                  </div>
                    
                  <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <h3  class="register-heading">Login as an Industry Professional</h3>
                      <div class="row register-form">
                      <form action="{{ route('sign_in')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="col-md-6">

                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" required>
			                </div>
                              <div class="form-group">
				                <input type="password" placeholder="Password" name="password" required>
                            </div>
                              <button type="submit" name="submit" class="btnRegister" value="Login as a Professional" ></button>
                      </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      </div>	


</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>