<!DOCTYPE html>
<head>

  {{-- <style>

.ui-state-active h4,
.ui-state-active h4:visited {
    color: #26004d ;
}

.ui-menu-item{
    height: 80px;
    border: 1px solid #ececf9;
}
.ui-widget-content .ui-state-active {
    background-color: white !important;
    border: none !important;
}
.list_item_container {
    width:740px;
    height: 80px;
    float: left;
    margin-left: 20px;
}
.ui-widget-content .ui-state-active .list_item_container {
    background-color: #f5f5f5;
}
    .image {
    width: 15%;
    float: left;
    padding: 10px;
}
.image img{
    width: 80px;
    height : 60px;
}
.label{
    width: 85%;
    float:right;
    white-space: nowrap;
    overflow: hidden;
    color: rgb(124,77,255);
    text-align: left;
}
input:focus{
    background-color: #f5f5f5;
} --}}

{{-- </style> --}}

</head>

<body>
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
                    <a href="{{ route('logout')}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-sign-out"><i class="sr-only">Log Out</i></span></a>
                </p>
        </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto mr-md-3">
                <li class="nav-item">
                  <div style="position: relative;">
                      <svg style="  position: absolute;
                      top: 4px;
                      left: 15px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                      <input style="    height: 25px;
                      margin-top: 15px;
                      background-color: #efefef;
                      color: #8e8e8e;
                      font-size: 15px;
                      padding: 0 16px;
                      font-weight: 300;
                      cursor: text;
                      padding-left: 40px;
                  " type="text" autocomplete="off" name="search_box" id="search" class="form-control input-lg" placeholder="Search Here" />
                  </div>
                </li>
                <li class="nav-item {{ 'explore' == request()->path() ? 'active' : '' }}"><a href='{{ route('explore')}}' class="nav-link">Explore</a></li>
                <li class="nav-item {{ 'top_list' == request()->path() ? 'active' : '' }}"><a href='{{ route('top_list')}}' class="nav-link">Top List</a></li>
                <li class="nav-item {{ 'contact' == request()->path() ? 'active' : '' }}"><a href='{{ route('contact')}}' class="nav-link">Contact</a></li>
                <li class="nav-item {{ 'profile/{id}' == request()->path() ? 'active' : '' }}"><a href='{{ route('profile',['id' => Crypt::encrypt(Session::get('current_user_id')) ])}}' class="nav-link">Profile</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

</section>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript">
  $(document).ready(function(){
      $("#search").keyup(function(){
          // source: "{{ url('demos/autocompleteajax') }}",
          //     focus: function( event, ui ) {
          //     //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
          //     return false;
          // },
          // select: function( event, ui ) {
          //     window.location.href = ui.item.url;
          // }

          $search=$( "#search" ).val();
          $.ajax({
                type: "get",
                url: "demos/autocompleteajax",
                data:$search,
                cache: false,
                success: function(data){
                    // $('#messages').html(data);
                    // scrollToBottomFunc();

                    var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="label"><h4><b>' + item.title + '</b></h4></div></div></a>';
          return $( "<li></li>" )
                  .data( "item.autocomplete", item )
                  .append(inner_html)
                  .appendTo( ul );
                }
            });
      })
  });
  </script> 
</body>


