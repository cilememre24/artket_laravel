<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/top_list.css') }}">

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

