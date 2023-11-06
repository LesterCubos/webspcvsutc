<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <h4 class="card-title">Student Informations Table</h4>
        <p class="card-description">
         Edit<code>Student Informations</code>
        </p>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search User Name..." wire:model.lazy="searchStudent">
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Student Number</th>
                <th>AVATAR</th>
                <th>FIRST NAME</th>
                <th>SURNAME</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td>{{ $user->student_number}}</td>
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
                  <td>
                    @if($user->isActive == 1)
                      <label class="badge badge-success">Active</label>
                    @elseif($user->isActive == 0)
                      <label class="badge badge-danger">Inactive</label>
                    @endif
                  </td>
                  <td> 
                    <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('student_informations.edit', $user->id) }}"><i class="icon-open"></i></a>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No User Found...</div>
                    </td>  
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $users->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
