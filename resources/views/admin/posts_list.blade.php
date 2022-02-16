@include('admin.sidebar')

<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Posts</h4>
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
                            Context
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
                            @foreach($posts as $post)
                          <tr>
    
                            <td>
                            {{ $post->title }}
                            </td>
                            <td>
                            {{ $post->description }}
                            </td>
                            <td>
                            vote
                            </td>
                            <td>
                            context
                            </td>
    
                            <td>
                            {{ $post->image_path }}
                            </td>
                            <td>
                            {{ $post->created_at }}
                            </td>
                            <td class="text-right">
                            <input type="submit" name="update" value="Update"></input>
                            <input type="submit" name="delete" value="Delete"></input>
                            </td>
    
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