<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="margin-top: 50px; border-radius: 10px">
        <div class="card-body">
            <h4 class="card-title" style="font-size: 20px">Grades</h4>
            <p class="card-description" style="font-size: 16px">
            View your <code>Grades</code>
            </p>
        <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
            <div class="input-group-prepend">
                <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                <i class="icon-search"></i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Search Academic Year..." wire:model.lazy="searchStudentGrade">
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