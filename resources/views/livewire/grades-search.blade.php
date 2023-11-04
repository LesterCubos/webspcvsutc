<div class="col-lg-12 grid-margin stretch-card">
  <div class="card" style="margin-top: 50px; border-radius: 10px">
      <div class="card-body">
        @foreach ($courses as $course)
          <h4 class="card-title" style="font-size: 20px">{{ $course->instructor_name }}</h4>
          <p class="card-description" style="font-size: 16px">
            {{ $course->course_name }}
          </p>
        @endforeach
        <a class="btn btn-primary btn-icon-text" href="{{ route('grades.create') }}">
          <i class="mdi mdi-plus-circle btn-icon-prepend"></i>Add Grades
        </a>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Student Number..." wire:model.lazy="searchGrade">
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
                  Remarks
                </th>
                <th>
                  Year Level
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
                    {{ $grade->remarks }}
                  </td>
                  <td>
                    {{ $grade->year_level }}
                  </td>
                  <td>
                    <form method="post" action="{{ route('grades.destroy', $grade->id) }}">      
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('grades.edit', $grade->id) }}"><i class="icon-open"></i></a>
                        <button id="icon_delete" type="submit" class="btn btn-danger">
                          <i class="icon-trash"></i>
                        </button>
                    </form>
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
            {!! $grades->links() !!}
          </div>
        </div>
      </div>
  </div>
</div>