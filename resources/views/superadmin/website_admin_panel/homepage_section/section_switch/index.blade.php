{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}



@extends('superadmin.superadmin_master')


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
        
        </tbody>
    </table>

@endsection
