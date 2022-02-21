<section class="ftco-section">
    <div class="container">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href='{{ route('explore')}}'><img style="margin-top: -21px;height: 57px;width: 134px;" src="{{ asset('art_logo.png')}}" width="125" height="81"/></a>
            <div class="social-media order-lg-last">
                <p class="mb-0 d-flex">

                  {{-- FOOTER --}}
                    {{-- <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                    <a href="https://www.instagram.com/artketcom/" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a> --}}

                    <a href="{{ route('chat')}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-paper-plane"><i class="sr-only">Direct Message</i></span></a>
                    <a onclick="location.href='logout.php'" class="d-flex align-items-center justify-content-center"><span class="fa fa-sign-out"><i class="sr-only">Log Out</i></span></a>
                </p>
        </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto mr-md-3">
                <li class="nav-item active"><a href='{{ route('explore')}}' class="nav-link">Explore</a></li>
                <li class="nav-item"><a href='{{ route('top_list')}}' class="nav-link">Top List</a></li>
                <li class="nav-item"><a href='{{ route('contact')}}' class="nav-link">Contact</a></li>
                <li class="nav-item"><a href='{{ route('profile',['id' => Session::get('current_user_id') ])}}' class="nav-link">Profile</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

</section>