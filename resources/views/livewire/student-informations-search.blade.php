<div class="col-lg-12 grid-margin stretch-card">
  @if(session('notif.success') || session('notif.danger'))
    <div class="card">
  @else
    <div class="card" style="margin-top: 50px; border-radius: 10px">
  @endif
    {{-- <div class="card" style="border-radius: 10px"> --}}
      <div class="card-body">
        <h4 class="card-title">Student Informations Table</h4>
        <p class="card-description">
         Edit<code>Student Informations</code>
        </p>
        <a class="btn btn-primary btn-icon-text" href="{{ route('adchangeinforeqs.index') }}">
          <span class="badge bg-dark badge-number" style="font-size: 18px">{{ $pendingChange }}</span> <i class="bi bi-chat-left-text btn-icon-prepend" style="font-size: 1.225rem;"></i>Manage Request Change
        </a>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Student Number..." wire:model.lazy="searchStudent">
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
                  <td>{{ $user->studentNumber}}</td>
                  <td class="py-1">
                    @if (empty($user->avatar))
                      @if ($user->gender == 'Male')
                        <img src="{{ asset('img/default.png') }}" alt="Profile Photo">
                      @elseif ($user->gender == 'Female')
                        <img src="{{ asset('img/woman.png') }}" alt="Profile Photo">
                      @endif
                    @else
                      <img src="/avatars/{{ $user->avatar }}" alt="Profile Photo">
                    @endif
                  </td>
                  <td>{{ $user->firstName}}</td>
                  <td>{{ $user->lastName }}</td>
                  <td>{{ $user->email}}</td>
                  <td>
                    @if($user->isActive == 1)
                      <label class="badge badge-success">Active</label>
                    @elseif($user->isActive == 0)
                      <label class="badge badge-danger">Inactive</label>
                    @endif
                  </td>
                  <td> 
                    <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('student_informations.edit', $user->id) }}"><i class="bi bi-pencil-square"></i></a>
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
