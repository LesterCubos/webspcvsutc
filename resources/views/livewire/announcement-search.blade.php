<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-form col-6">
                <div class="col-6" style="margin-bottom: 10px; float:right">
                  <input type="text" class="form-control" placeholder="Search Announcement Title..." wire:model.lazy="searchAnnouncement">
                  <button><i class="bi bi-search"></i></button>
                </div>
            </div><!-- End search formn-->
            <table class="table table-bordered table-hover border-primary">
                <thead class="table-display text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
        
                <tbody>
                    {{-- populate our carousel item data --}}
                    @forelse ($announcements as $announcement)
                        <tr>
                            <th scope="row">{{ $announcement->id }}</th>
                            <td>{{ $announcement->title }}</td>
                            <td>{!! Str::limit($announcement->content,'250','...') !!} </td>
                            <td><img style="width:250px" src="{{ Storage::url($announcement->poster) }}" alt="{{ $announcement->title }}" srcset=""></td>
                            <td>{{ $announcement->created_at }}</td>
                            <td>{{ $announcement->updated_at }}</td>
                            <td>
                                @if ($announcement->isActive == 1)
                                    Show
                                @else
                                    Hidden    
                                @endif
                            </td>
                            <td>
                                <form method="post" action="{{ route('announcements.destroy', $announcement->id) }}" class="d-grid gap-2">
            
                                    {{-- <a class="btn btn-info" href="{{ route('announcements.show', $announcement->id) }}">Show</a> --}}
            
                                    <a class="btn" id="icon_edit" href="{{ route('announcements.edit', $announcement->id) }}"><i class="ri-edit-box-fill"></i></a>
                                    @csrf
                                    @method('DELETE')
            
                                    <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Announcement Found...</div> 
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $announcements->links() !!}
            </div>
        </div>
    </div>
</div>
