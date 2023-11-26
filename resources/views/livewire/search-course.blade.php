<div>
    <!-- CSS -->
    <style type="text/css">
    .search-box .clear{
        clear:both;
        margin-top: 20px;
    }

    .search-box ul{
        list-style: none;
        padding: 0px;
        position: absolute;
        margin: 0;
        background: white;
    }

    .search-box ul li{
        background: lavender;
        padding: 4px;
        margin-bottom: 1px;
    }

    .search-box ul li:nth-child(even){
        background: purple;
        color: white;
    }

    .search-box ul li:hover{
        cursor: pointer;
    }

    .search-box input[type=text]{
        letter-spacing: 1px;
    }
    </style>

    <div class="search-box">
        <input type="text" class="form-control @error('program') is-invalid @enderror" id="program" name="program" value="{{ $course->program ?? old('program') }}"  wire:model="courseSearch" wire:keyup="searchResult" placeholder="{{ $progname }}" >

        <!-- Search result list -->
        @if($showdiv)
            <ul>
                @if(!empty($records))
                    @foreach($records as $record)

                         <li wire:click="fetchCourseDetail({{ $record->id }})">{{ $record->courseTitle}}</li>

                    @endforeach
                @endif
            </ul>
        @endif

        <div class="clear"></div>
        {{-- <div >
            @if(!empty($courseDetails))
                <div>
                     Name : {{ $courseDetails->name }} <br>
                     Email : {{ $courseDetails->email }}
                </div>
            @endif
        </div> --}}
    </div>

</div>