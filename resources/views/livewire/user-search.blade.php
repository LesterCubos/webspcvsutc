<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search User Name..." wire:model.lazy="searchUser">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>AVATAR</th>
                <th>FIRST NAME</th>
                <th>SURNAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>STATUS</th>
                <th>DATE CREATED</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td>{{ $user->id}}</td>
                  <td class="py-1">
                    @if (empty($user->avatar))
                      <img src="{{ asset('img/default.png') }}" alt="Profile Photo">
                    @else
                      <img src="/avatars/{{ $user->avatar }}" alt="Profile Photo">
                    @endif
                  </td>
                  <td>{{ $user->first_name}}</td>
                  <td>{{ $user->surname }}</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->role}}</td>
                  <td>
                    @if($user->isActive == 1)
                      <label class="badge badge-success">Active</label>
                    @elseif($user->isActive == 0)
                      <label class="badge badge-danger">Inactive</label>
                    @endif
                  </td>
                  <td>{{$user->created_at}}</td>
                  <td> 
                    <form method="post" action="{{ route('user.destroy', $user->id) }}" class="d-grid gap-2">
                      <a href="/superadmin/sp/users/userView{{$user->id}}" class="btn btn-primary btn-rounded btn-fw"><i class="icon-eye"></i></a>
                      {{-- <a type="button" class="btn btn-info btn-rounded btn-fw" ><i class="icon-open"></i></a> --}}

                      @csrf
                      @method('DELETE')

                      <button  id="icon_delete" type="submit" class="btn btn-danger btn-rounded btn-fw"><i class="icon-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No User Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
