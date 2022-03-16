@include('admin.sidebar')

<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Permissions</h4>
                    <input style="float: right;" type="submit" name="new_per" value="New Permission"></input>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            ID
                          </th>
                          <th>
                            Permission
                          </th>
                          <th>
                            Date Created
                          </th>
                          <th class="text-right">
                            Action
                          </th>
                        </thead>
                        <tbody>
                          @foreach ($permissions as $permission)
                          <tr>
                            <td>
                              {{ $permission->id }}
                            </td>
                            <td>
                            {{ $permission->name }}
                            </td>
                            <td>
                            {{ $permission->created_at }}
                            </td>
                            <td class="text-right">
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