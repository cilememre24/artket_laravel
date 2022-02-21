{{-- 
<link rel="stylesheet" href="{{ asset('css/chat.css') }}" /> --}}
<!doctype html>
<html lang="en">
  <head>

  	<title>Chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />

</head>

<body>
<div class="message-wrapper">
    <header>
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
        <div>
            <h2>{{ $user->username }}</h2>
            <h3>{{ $user->first_name }} {{ $user->last_name }} </h3>
        </div>
    </header>
    <ul id="chat">
        @foreach ($messages as $message)
        <li class="{{ ($message->sender_id == $current_user_id) ? 'me' : 'you' }}">
            <div class="entete">
                <span class="status green"></span>
                <h2>Vincent</h2>
                <h3>{{ date('d M y, h:i a',strtotime($message->created_at)) }}</h3>
            </div>
            <div class="triangle"></div>
            <div class="message">
                {{ $message->message }}
            </div>
        </li>
        @endforeach
    </ul>
</div>
<footer>
        <input style="width: 400px;
        height: 100px;" id="message_area" type="text" name="message" class="submit">
        <button id="send_button" type="submit" name="submit" value="Send" ></button>
</footer>

</body>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    var receiver_id='';
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        Pusher.logToConsole = false;

        var pusher = new Pusher('b9d31bbfd443ce40f0ef', {
        cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            if ({{ Session::get('current_user_id') }} == data.sender_id) {
                $('#' + data.receiver_id).click();
            } else if ({{ Session::get('current_user_id') }} == data.receiver_id) {
                if ({{ Session::get('current_user_id') }} == data.sender_id) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.sender_id).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.sender_id).find('.pending').html());
                    if (pending) {
                        $('#' + data.sender_id).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.sender_id).append('<span class="pending">1</span>');
                    }
                }
            }
        });

        $('.user').click(function(){
            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "chat/" + receiver_id,
                data:"",
                cache: false,
                success: function(data){
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $('#send_button').click(function() {
            var message = $('#message_area').val();
            receiver_id = {{ $user_id }};

            if ( message != '' && receiver_id != '') {
                $('#message_area').val(''); 

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "chat", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });

    });

    function scrollToBottomFunc() {
        $('#chat').animate({
            scrollTop: $('#chat').get(0).scrollHeight
        }, 50);
    }
</script>

</html>