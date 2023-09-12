{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('superadmin.superadmin_master')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}

@section('content')
    <div class="pagetitle">
        {{-- <h1>Dashboard</h1> --}}
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Homepage</li>
            <li class="breadcrumb-item active">Section Switch</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    {{-- <input class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"> --}}

    <table class="table table-bordered table-hover border-primary">
        <thead class="table-display text-center">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
        </tr>
        </thead>

        <tbody>
            @forelse ($switchs as $key => $switch)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                        <td>{{ $switch->name }}</td>
                        <td>
                            @livewire('switch-status', ['model' => $switch, 'field' => 'isActive'], key($switch->id))
                        </td>
                </tr>
                    @empty
                    <tr>
                        <td colspan="4">Data not Found</td>
                    </tr>
            @endforelse
            {{-- @foreach ($switchs as $switch)
            <tr>
                <th scope="row">{{ $switch->id }}</th>
                <td>{{ $switch->name }}</td>
                <td>
                    <input data-id="{{$switch->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $switch->status ? 'checked' : '' }}> --}}
                    {{-- <center>
                        <input type="checkbox"
                            id="switch"
                            class="checkbox toggle-class" />
                                
                        <label for="switch"
                            class="toggle">
                            <p>
                                OFF     ON
                            </p>
                        </label>
                    </center>
                </td>
                
            </tr>
            @endforeach --}}
        </tbody>
    </table>

    


    {{-- <script>
        $(function() {
          $('.toggle-class').change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0; 
              var switch_id = $(this).data('id'); 
              console.log(status);
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/changeStatus',
                  data: {'status': status, 'switch_id': switch_id},
                  success: function(data){
                    console.log(data.success)
                  }
              });
          })
        })
      </script> --}}
    
@endsection
