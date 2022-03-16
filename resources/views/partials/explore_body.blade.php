<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="row">
    <div class="card-columns">
      @foreach($posts as $post)
      @if($post->type=='text')
      <div class="card card-pin" style="padding: 8px;background-color:rgb(253, 253, 163)">
      @elseif($post->type=='image')
      <div class="card card-pin" style="padding: 8px;background-color:rgb(253, 163, 170)">
      @elseif($post->type=='video')
      <div class="card card-pin" style="padding: 8px;background-color:rgb(163, 184, 253)">
      @else
      <div class="card card-pin" style="padding: 8px;background-color:rgb(178, 253, 163)">
      @endif
        <img class="card-img" src="{{ $post['image_path'] }}" alt="Card image">
        <div class="overlay">
          <h2 class="card-title title"><{{ $post['title'] }}</h2>
          <div class="more">
          <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post['id'])])}}">
            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
          </div>
        </div>
      </div>
    @endforeach
          </div>
      </div>