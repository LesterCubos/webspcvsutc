<div class="col-lg-12 grid-margin stretch-card">
  @if(session('notif.success') || session('notif.danger'))
    <div class="card">
  @else
    <div class="card" style="margin-top: 50px; border-radius: 10px">
  @endif
        <div class="card-body">
            <h4 class="card-title" style="font-size: 20px">Grades</h4>
            <p class="card-description" style="font-size: 16px">
              View and <code>DELETE</code> grades
            </p>
          <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Student Number..." wire:model.lazy="searchAdminGrade">
          </div>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    Student Number
                  </th>
                  <th>
                    Grade
                  </th>
                  <th>
                    Course Subject
                  </th>
                  <th>
                    Instructor Name
                  </th>
                  <th>
                    Remarks
                  </th>
                  <th>
                    Academic Year
                  </th>
                  <th>
                    Semester
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @php($a = 0)
                @forelse ($grades as $grade)
                  <tr>
                    <td>
                    {{ $grade->student_number }}
                    </td>
                    <td>
                      {{ $grade->grade }}
                    </td>
                    <td>
                        {{ $grade->course_name }}
                    </td>
                    <td>
                        {{ $grade->instructor_name }}
                    </td>
                    <td>
                      {{ $grade->remarks }}
                    </td>
                    <td>
                      {{ $grade->academic_year }}
                    </td>
                    <td>
                      {{ $grade->semester }}
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button id="icon_delete{{ $grade->id }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion{{ $grade->id }}">
                            <i class="icon-trash"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirm-user-deletion{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this Academic Year?') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form method="POST" action="{{ route('admin_grades.destroy', $grade->id) }}">
                                @csrf
                                @method('delete')

                                <div class="modal-body">
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once the Grade is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this Academic Year.') }}
                                </p>
                                <br>
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-color:black">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </td>
                  </tr>  
                @empty
                  <tr>
                    <td colspan="7" style="text-align: center; font-size: 24px">
                        <div class="py-5" style="">No Data Found...</div>
                    </td>  
                  </tr> 
                @endforelse
              </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center" style="margin-top: 20px">
              {!! $grades->links() !!}
            </div>
          </div>
        </div>
    </div>
  </div>