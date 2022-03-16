<!DOCTYPE HTML>
<html>

<head>
  @include('partials.scripts')
  @include('partials.change_password')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/update_profile.css') }}">

</head>

<body>

  <div class="container rounded bg-white mt-5">
    <div id = "info_box" class="row">
        <div class="col-md-4 border-right">

          <form action="{{ '/update' }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><a href='{{ route('profile',['id' => Session::get('current_user_id') ])}}'><img  id="file-ip-1-preview" class="rounded-circle mt-5" src="{{ $user['imgfile_path'] }}" width="90"></a><span class="font-weight-bold">{{ $user['first_name'] }} {{ $user['last_name'] }} </span><span class="text-black-50">{{ $user['email'] }}</span><span>Artist</span></div>
            <div id="upload_img">

              <label class="center">Change Picture</label>
              <input class="center" onchange="showPreview(event);" type="file" name="update_img">
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6>Back to profile</h6>
                    </div>
                </div>
                  <div class="row mt-2">
                    <div class="col-md-6">
                      <label class="labels" for="first_name"> <strong>First Name</strong></label>
                      <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $user['first_name'] }}"></div>
                    <div class="col-md-6">
                      <label class="labels" for="last_name"><strong>Last Name</strong></label>
                      <input type="text" class="form-control" name="last_name" value="{{ $user['last_name'] }}" placeholder="Last Name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                      <label class="labels" for="email"><strong>Email</strong></label>
                      <input type="text" class="form-control" name="email" placeholder="email" value="{{ $user['email'] }}"></div>
                    <div class="col-md-6">
                      <label class="labels" for="username"><strong>Username</strong></label>
                      <input type="text" class="form-control" name="username" value="{{ $user['username'] }}" placeholder="username"></div>
                </div>

                <div class="mt-5 text-right">
                  <a class="btn btn-primary profile-button"
                  data-toggle="modal"
                  data-target="#cpModal">{{ __('Change Password') }}
                </a>
                  {{-- <button class="btn btn-primary profile-button" type="button">Change Password</button> --}}
                </div>
                <div class="mt-5 text-right"><button type="submit" class="btn btn-primary profile-button" type="button">Save Profile</button></div>

                </form>


            </div>
        </div>
    </div>
  </div>
  
  <script type="text/javascript">
    function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }
  </script>
  
  		 <!-- Scripts -->

       <script src="{{ asset('js/jquery.min.js') }}"></script>
       <script src="{{ asset('js/popper.js') }}"></script>
       <script src="{{ asset('js/bootstrap.min.js') }}"></script>
       <script src="{{ asset('js/jquery.knob.min.js') }}"></script>
      <script src="{{ asset('js/browser.min.js') }}"></script>
      <script src="{{ asset('js/breakpoints.min.js') }}"></script>
      <script src="{{ asset('js/util.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>



</body>
</html>
