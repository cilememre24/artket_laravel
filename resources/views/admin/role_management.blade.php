@include('admin.sidebar')
<style>

.table .btn {
    margin: 5px;
}
</style>

{{-- UPDATE E BASTIĞINDA PERMISSIONLARIN LİSTESİ GELECEK İŞARETLİ OLANLARI ASSIGN EDECEK --}}
<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Roles</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Role
                          </th>
                          <th>
                            Permissions
                          </th>
                          <th class="text-right">
                            Action
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            Admin
                            </td>
                            <td>
                                <div style="display:flex;">
                                    <button class="btn btn-primary btn-block">Create user</button>
                                    <button class="btn btn-primary btn-block">Edit user</button>
                                    <button class="btn btn-primary btn-block">Share post</button>
                                    <button class="btn btn-primary btn-block">Vote</button>
                                    <button class="btn btn-primary btn-block">Make comment</button>
                                
                                </div>
                            </td>
                            <td class="text-right">
                            <input type="submit" name="delete" value="Update"></input>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Artist
                            </td>
                            <td>
                                <div style="display:flex;">
                                    <button class="btn btn-primary btn-block">Create user</button>
                                    <button class="btn btn-primary btn-block">Edit user</button>
                                    <button class="btn btn-primary btn-block">Share post</button>
                                    <button class="btn btn-primary btn-block">Vote</button>
                                    <button class="btn btn-primary btn-block">Make comment</button>
                                
                                </div>
                            </td>
                            <td class="text-right">
                            <input type="submit" name="delete" value="Update"></input>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Endustry Professional
                            </td>
                            <td>
                                <div style="display:flex;">
                                    <button class="btn btn-primary btn-block">Create user</button>
                                    <button class="btn btn-primary btn-block">Edit user</button>
                                    <button class="btn btn-primary btn-block">Share post</button>
                                    <button class="btn btn-primary btn-block">Vote</button>
                                    <button class="btn btn-primary btn-block">Make comment</button>
                                
                                </div>
                            </td>
                            <td class="text-right">
                            <input type="submit" name="delete" value="Update"></input>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
    
        </div>
      </div>

    </body>