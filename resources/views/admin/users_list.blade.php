@include('admin.sidebar')

<body class="">

    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              @if($label == '1')
              <h4 class="card-title"> Admins</h4>
              @endif
              @if($label == '2')
              <h4 class="card-title"> Artists</h4>
              @endif
              @if($label == '3')
              <h4 class="card-title"> Endustry Professionals</h4>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      Username
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      First Name
                    </th>
                    <th>
                      Last Name
                    </th>
                    <th>
                      Gender
                    </th>
                    <th class="text-right">
                      Action
                    </th>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                        <td>
                        {{ $user->username }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->first_name }}
                        </td>
                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>
                          @if($user->gender == 1)
                            Female
                          @endif
                          @if($user->gender == 2)
                          Male
                        @endif
                        </td>
                        <td class="text-right">
                          <a class="btn" href="{{ route('view_update_page', ['id' => $user->id,'label'=>$label])}}">Update</a>
                          <a class="btn" href="{{ route('delete_user', ['id' => $user->id])}}">Delete</a>
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