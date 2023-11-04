<div class="col-xl-9 grid-margin-lg-0 grid-margin stretch-card">
    <div class="card" style="border-radius: 10px">
      <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Academic Years</h4>
                <p class="card-description">
                    Add and Edit<code>Academic Years</code>
                </p>
            </div>
            <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Academic Year Name..." wire:model.lazy="searchAcademicYear">
            </div>
        </div>
          <div class="table-responsive mt-3">
            <table class="table table-header-bg">
              <thead>
                <tr>
                  <th>
                      Name
                  </th>
                  <th>
                      Start Year
                  </th>
                  <th>
                      End Year
                  </th>
                  <th>
                      Status
                  </th>
                  <th>
                      Action
                  </th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($academic_years as $academic_year)
                      <tr>
                          <td>
                              <span class="mdi mdi-calendar-clock" style="margin-right: 5px; font-size: 18px; color: purple"></span>{{ $academic_year->name }}  
                          </td>
                          <td>
                              {{ $academic_year->start_date }} 
                          </td>
                          <td>
                              {{ $academic_year->end_date }} 
                          </td>
                          <td>
                            @if($academic_year->isActive == 1)
                            <label class="badge badge-success">Active</label>
                            @elseif($academic_year->isActive == 0)
                                <label class="badge badge-danger">Inactive</label>
                            @endif
                          </td>
                          <td>
                              <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('academic_years.edit', $academic_year->id) }}"><i class="icon-open"></i></a>
                              <!-- Button trigger modal -->
                              <button id="icon_delete{{ $academic_year->id }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion{{ $academic_year->id }}">
                                  <i class="icon-trash"></i>
                              </button>
                              <!-- Modal -->
                              <div class="modal fade" id="confirm-user-deletion{{ $academic_year->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                      <h5 class="modal-title" id="ModalLabel">{{ __('Are you sure you want to delete this Academic Year?') }}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      </div>
                                      <form method="POST" action="{{ route('academic_years.destroy', $academic_year->id) }}">
                                      @csrf
                                      @method('delete')

                                      <div class="modal-body">
                                      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                          {{ __('Once the Academic Year is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this Academic Year.') }}
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
                          <td colspan="4" style="text-align: center; font-size: 24px">
                              <div class="py-5" style="">No Data Found...</div>
                          </td>  
                      </tr> 
                  @endforelse
              </tbody>
            </table>
            <div class="d-flex justify-content-center" style="margin-top: 20px">
                {!! $academic_years->links() !!}
            </div>
          </div>
      </div>
    </div>
  </div>
