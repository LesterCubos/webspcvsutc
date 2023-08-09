@extends('layouts.show')

@section('content')
    <form action="{{ route('search.search') }}" method="GET">
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form>

    @if($$campus_history->isNotEmpty())
        @foreach ($campus_history as $campushistory)
            <div class="post-list">
                <p>{{ $campushistory->title }}</p>
                <img src="{{ $campushistory->image }}">
            </div>
        @endforeach
    @else 
        <div>
            <h2>No posts found</h2>
        </div>
    @endif

@endsection