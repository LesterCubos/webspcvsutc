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
        <input type="text" class="form-control @error('course_name') is-invalid @enderror" id="course_name" name="course_name" value="{{ $course->course_name ?? old('course_name') }}"  wire:model="subjectSearch" wire:keyup="searchResult" placeholder="{{ $subname }}" >

        <!-- Search result list -->
        @if($showdiv)
            <ul>
                @if(!empty($records))
                    @foreach($records as $record)

                         <li wire:click="fetchsubjectDetail({{ $record->id }})">{{ $record->subjectTitle}}</li>

                    @endforeach
                @endif
            </ul>
        @endif
    </div>

</div>