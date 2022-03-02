<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

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