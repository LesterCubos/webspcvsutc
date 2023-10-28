<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Annoucement..." wire:model.lazy="searchadmin_announce">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th>POSTER</th>
                <th>STATUS</th>
                <th>DATE CREATED</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($admin_announces as $admin_announce)
                <tr>
                  <td>{{ $admin_announce->id}}</td>
                  
                  <td>{{ $admin_announce->title}}</td>
                  <td>{{ $admin_announce->content }}</td>
                  <td>{{ $admin_announce->poster}}</td>
                  <td>
                    @if($admin_announce->isActive == 1)
                      <label class="badge badge-success">Active</label>
                    @elseif($admin_announce->isActive == 0)
                      <label class="badge badge-danger">Inactive</label>
                    @endif
                  </td>
                  <td>{{$admin_announce->created_at}}</td>
                  
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Announcement Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
