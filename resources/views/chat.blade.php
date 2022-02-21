
<link rel="stylesheet" href="{{ asset('css/chat.css') }}" />

<div id="container">
	<aside>
		<header>
			<input class="input-text" type="text" placeholder="search">
		</header>
		<ul>
            @foreach ($all_people as $all_person)
            <a href="">
                <li class="user" id="{{ $all_person->id }}">
                    {{-- @if($all_person->unread)
                        <span class="pending">{{ $all_person->unread }}</span>
                    @endif --}}
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
                    
                    <div>
                        <h2>{{ $all_person->username }}</h2>
                        <h3>
                            @if($all_person->unread)
                            <span class="pending status orange"></span>
                            {{ $all_person->unread }} unread message
                            @endif
                        </h3>
                    </div>
                </li>
            </a>
			@endforeach
		</ul>
	</aside>
	<main id="messages">

	</main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var receiver_id='';
    $(document).ready(function(){

        $('.user').click(function(){
            $('.user').removeClass('active');
            $(this).addClass('active');

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "chat/" + receiver_id,
                data:"",
                cache: false,
                success: function(data){
                    $('#messages').html(data);
                }
            })
            return false;
        });

    })
</script>