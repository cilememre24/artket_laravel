@include('admin.sidebar')

<body class="">

    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Users</h4>
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
                            {{ $user->gender }}
                        </td>
                        <td class="text-right">
                            DELETE
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