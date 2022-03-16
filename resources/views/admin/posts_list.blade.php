@include('admin.sidebar')

<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    @if($type=='text')
                      <h4 class="card-title"> Texts</h4>
                    @elseif($type=='image')
                      <h4 class="card-title"> Images</h4>
                    @elseif($type=='video')
                      <h4 class="card-title"> Videos</h4>
                    @else
                      <h4 class="card-title"> Audios</h4>
                    @endif
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Title
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Vote
                          </th>
                          <th>
                            Image Path
                          </th>
                          <th>
                            Date Created
                          </th>
                          <th class="text-right">
                            Action
                          </th>
                        </thead>
                        <tbody>
                          @php($i=0)
                            @foreach($posts as $post)
                          <tr>
                            <td>
                            {{ $post->title }}
                            </td>
                            <td>
                            {{ $post->description }}
                            </td>
                            <td>
                              {{ $votes[$i]}}
                            </td>
    
                            <td>
                            {{ $post->image_path }}
                            </td>
                            <td>
                            {{ $post->created_at }}
                            </td>
                            <td class="text-right">

                            <a class="btn btn-info" href="{{ route('update_post', ['id' => $post->id])}}">Update</a>
                            <a class="btn btn-danger" href="{{ route('delete_post', ['id' => $post->id])}}">Delete</a>
                            <a class="btn btn-success" href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}">View</a>
                            </td>
                            @php($i++)
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
    
                  </div>
                </div>
              </div>
    
        </div>
      </div>

    </body>