<!doctype html>
<html lang="en">
  <head>
    @include('navbar')

  	<title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>


<body>
<section class="ftco-section">
    <div class="container">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
            <div  class="row" style="width: 100%;
            height: 100%;
            object-fit: cover;
            margin: 0px;">
                <div class="col-md-12 mx-auto">
                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="px-4 pt-0 pb-4 cover">

                          <div class="media align-items-end profile-head">
                              <div class="profile mr-3"><img src="../{{ $user['imgfile_path'] }}" alt="..." width="130" class="rounded mb-2 img-thumbnail">

                                @if($user['id'] == $current_user_id)
                              <a href='{{ route('update_profile')}}' id="follow_id" class="btn btn-outline-dark btn-sm btn-block">Update</a></div>
                                @elseif ($is_follower == 1)
                                <a href='{{ route('unfollow',['id' => $user['id']])}}' id="follow_id" class="btn btn-outline-dark btn-sm btn-block">Unfollow</a></div>
                                @elseif($is_follower == 0)
                                <a href='{{ route('follow',['id' => $user['id']])}}' id="follow_id" class="btn btn-outline-dark btn-sm btn-block">Follow</a></div>
                               
                                @endif
                              <div class="media-body mb-5 text-white">
                                  <h4 class="mt-0 mb-0">{{ $user['first_name'] }} {{ $user['last_name'] }} </h4>
                                  <p class="small mb-4" style="color: black;"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $user['username'] }}</p>
                              </div>
                          </div>
                        </div>
                        <!-- show post number -->
                        <div class="bg-light p-4 d-flex justify-content-end text-center">
                            <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#profile-timeline" class="active nav-link">
                                    <div class="nav-field">Timeline</div>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href='{{ route('profile_post',['id' => Crypt::encrypt($user['id'])])}}'  class="nav-link">
                                    <div class="nav-field">Posts</div>
                                    <div class="nav-value">{{ $num_of_posts }}</div>
                                </a>
                                </li>
                                <!--show following and follower  -->
                                <li class="nav-item">
                                    <a href='{{ route('followers_list',['id' => Crypt::encrypt($user['id'])]) }}' class="nav-link">
                                        <div class="nav-field">Followers</div>
                                        <div class="nav-value">{{ $num_of_followers }}</div>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="{{ route('followings_list',['id' => Crypt::encrypt($user['id'])]) }}" class="nav-link">
                                        <div class="nav-field">Following</div>
                                        <div class="nav-value">{{ $num_of_following }}</div>
                                    </a>
                                    </li>
                            </ul>
                        </div>
                        @if($user['id'] == $current_user_id)
                            <div class="px-4 py-3">
                                <!-- <h5 class="mb-0">Create New Post</h5> -->
                                <div class="p-4 rounded shadow-sm bg-light">
                                    <div class="d-flex flex-row text-white" style="cursor: pointer;">
                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'text']) }}" >
                                            <h6>Text</h6>
                                        </a>
                                        
                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'image']) }}" >
                                            <h6>Image</h6>
                                        </a>

                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'video']) }}" >
                                            <h6>Video</h6>
                                        </a>
                            
                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'audio']) }}" >
                                            <h6>Audio</h6>
                                        </a>
                                    </div>
                                </div>
                        </div>
                        @endif

                        <div class="py-4 px-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0">Timeline</h5>
                            </div>
                            <div class="row">
                            <div class="container">
                                <div class="row" style="width: 100%;
                                height: 100%;
                                object-fit: cover;
                                margin: 0px;">
                                   <div class="col-md-12">
                                      <div id="content" class="content content-full-width">
                                         <div class="profile-content">
                                            <!-- begin tab-content -->
                                            <div class="tab-content p-0">

                                            <div class="tab-pane fade  active show" id="profile-timeline">
                                                  <!-- begin timeline -->
                                                  
                                                  @include('partials.timeline')

                                                  <!-- end timeline -->
                                               </div>


                                               <!-- end #profile-post tab -->
                                            </div>
                                            <!-- end tab-content -->
                                         </div>
                                         <!-- end profile-content -->
                                      </div>
                                   </div>
                                </div>
                             </div>
                        </div>
                    </div>

                </div>
            </div>
  </div>
      </nav>

    </div>

</section>


<script src="{{ asset('js/timeline.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>