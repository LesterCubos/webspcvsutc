<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="margin-top: 50px; border-radius: 10px">
        <div class="card-body">
            <h4 class="card-title" style="font-size: 20px">Grades</h4>
            <p class="card-description" style="font-size: 16px">
            View your <code>Grades</code>
            </p>

            @php
                $academic_year_semesters = [];
            @endphp

            @forelse ($grades as $grade)
                @php
                $key = $grade->academic_year . '_' . $grade->semester;
                if (!isset($academic_year_semesters[$key])) {
                    $academic_year_semesters[$key] = [];
                }
                array_push($academic_year_semesters[$key], $grade);
                @endphp
            @empty
            @endforelse

            @foreach ($academic_year_semesters as $key => $grades)
                @php
                list($academic_year, $semester) = explode('_', $key);
                @endphp
                <div class="dropdown" style="margin-top: 20px;">
                    <button type="button" class="btn btn-primary col-lg-12" data-toggle="dropdown" style="text-align: left; font-weight: bolder; letter-spacing: 1px;">
                        {{ $academic_year }} || {{ $semester }}
                    </button>
                    <div class="dropdown-menu col-lg-12" >
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>SUBJECT CODE</th>
                                <th>SUBJECT TITLE</th>
                                <th>GRADE</th>
                                <th>UNITS</th>
                                <th>CREDITS</th>
                                <th>INSTRUCTOR</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    @if ($grade->academic_year == $academic_year && $grade->semester == $semester)
                                        <tr>
                                            <td>{{ $grade->course_name }}</td>
                                            <td>{{ $grade->course_title }}</td>
                                            <td>{{ $grade->grade }}</td>
                                            <td>{{ $grade->units }}</td>
                                            <td>{{ $grade->credits }}</td>
                                            <td>{{ $grade->instructor_name }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>