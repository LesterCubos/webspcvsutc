@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Section Switch Control</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Section Switch Control</h2>
            {{-- <button href="{{ route('switch.create') }}" type="submit" name="" class="btn btn-success">Add Switch</button> --}}
            {{-- <a href="{{ route('switch.create') }}" class="btn btn-success">Add</a> --}}

            {{-- <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" id="show-section-switch" value="$showSection ? 'checked' : '' }}">
                <label class="form-check-label" for="show-section-switch">Show Section</label>
            </div> --}}

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <br>
            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <div id="testing">Hello</div> --}}
            <button id="show" class="btn btn-primary rounded pill">Show</button>


            <button id="hide" class="btn btn-secondary rounded pill">Hide</button>
            <button id="check" class="btn btn-success rounded pill">Check</button><br>
            Check Result: <strong><span id="result"></span></strong>
        </div>
    </div>




    <script>
        $("#check").click(function() {
      // Use ":hidden" to check if something is hidden instead of visible
      if ($("#testing").is(":visible")) {
        $("#result").text("Visible");
      } else {
        $("#result").text("Hidden");
      }
    });

    $("#hide").click(function() {
      $("#testing").hide();
      var value = 'hide';
    $.post('/switch', { value: value }, function(response) {
    console.log(response);
    });

    });

    $("#show").click(function() {
      $("#testing").show();
      var value = 'show';
    $.post('/switch', { value: value }, function(response) {
    console.log(response);
    });

    });
    </script>

@endsection


