<div class="col-lg-12 grid-margin stretch-card">
        @if(session('notif.success') || session('notif.danger'))
          <div class="card" style="border-radius: 10px">
        @else
          <div class="card" style="margin-top: 50px; border-radius: 10px">
        @endif
      <div class="card-body">
        <h4 class="card-title">Student Accounts</h4>
        <p class="card-description" style="font-size: 16px">
            <code>View</code> and <code>Edit</code>
        </p>
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
                  <tr style="font-weight: bolder; color: #000">
                    <th>STUDENT NUMBER</th>
                    <th>FIRST NAME</th>
                    <th>SURNAME</th>
                    <th>EMAIL</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($students as $student)
                    <tr>
                      <td>{{ $student->studentNumber}}</td>
                      <td>{{ $student->firstName}}</td>
                      <td>{{ $student->lastName }}</td>
                      <td>{{ $student->email}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" style="text-align: center; font-size: 24px">
                          <div class="py-5" style="">No student Found...</div>
                      </td>  
                    </tr>
                  @endforelse
                </tbody>
            </table>
          {{-- Pagination --}}
          <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $students->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
