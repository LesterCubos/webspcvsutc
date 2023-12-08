<div class="col-lg-12 grid-margin stretch-card">
@if(session('notif.success') || session('notif.danger'))
  <div class="card">
@else
  <div class="card" style="margin-top: 50px; border-radius: 10px">
@endif
    <div class="card-body">
        <h4 class="card-title">Courses Table</h4>
        <p class="card-description">
          Edit<code>Subject Courses</code>
        </p>
        {{-- <a class="btn btn-primary btn-icon-text" href="{{ route('courses.create') }}">
            <i class="bx bxs-book-add btn-icon-prepend" style="font-size: 1.225rem;"></i>Add Course
        </a> --}}
        <a class="btn btn-warning btn-icon-text" href="{{ route('Coursesexport') }}"><i class="bx bxs-lock-open-alt btn-icon-prepend" style="font-size: 1.225rem;"></i>Generate Pincode</a>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Course Subject..." wire:model.lazy="searchCourse">
        </div>
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                    SchedCode
                    </th>
                    <th>
                    Section
                    </th>
                    <th>
                    Course Code
                    </th>
                    <th>
                    Instructor Name
                    </th>
                    <th>
                    Action
                    </th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>
                                {{ $course->schedcode }}
                            </td>
                            <td>
                                {{ $course->section }}
                            </td>
                            <td>
                                {{ $course->course_name }}
                            </td>
                            <td>
                                {{ $course->instructor_name }}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('courses.edit', $course->id) }}" style="margin-bottom: 5px"><i class="bi bi-pencil-square"></i></a>
                                <!-- Button trigger modal -->
                                <button id="icon_delete{{ $course->id }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion{{ $course->id }}" style="margin-bottom: 5px">
                                    <i class="icon-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="confirm-user-deletion{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this Academic Year?') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form method="POST" action="{{ route('courses.destroy', $course->id) }}">
                                        @csrf
                                        @method('delete')

                                        <div class="modal-body">
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Once the Course is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this Academic Year.') }}
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
                            <td colspan="5" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Data Found...</div>
                            </td>  
                        </tr> 
                    @endforelse
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center" style="margin-top: 20px">
                {!! $courses->links() !!}
            </div>
        </div>
    </div>
</div>
</div>
