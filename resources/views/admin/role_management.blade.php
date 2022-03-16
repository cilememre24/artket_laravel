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
                                  @foreach ($admin_permissions as $ap )
                                    <button class="btn btn-primary btn-block">{{ $ap->name }}</button>       
                                  @endforeach                   
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
                                @foreach ($artist_permissions as $ap )
                                  <button class="btn btn-primary btn-block">{{ $ap->name }}</button>       
                                @endforeach                   
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
                                @foreach ($prof_permissions as $pp )
                                  <button class="btn btn-primary btn-block">{{ $pp->name }}</button>       
                                @endforeach                   
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