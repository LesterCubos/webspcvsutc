<form wire:submit.prevent="submit" enctype="multipart/form-data">
  
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    
    @if ($routeName == 'downloadable_forms.create')
        <div class="form-group">
            <label for="exampleInputName">Title:</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter title" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputName">File:</label>
            <input type="file" class="form-control" id="exampleInputName" wire:model="file">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="flex text-center" style="padding-top: 10px">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('downloadable_forms.index') }}" class="btn btn-warning">Cancel</a>
        </div>
    @else
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>
                    File Name
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Updated At
                </th>
                <th>
                    Action
                </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($files as $file)
                <tr>
                    <td>
                    {{ $file->title }}
                    </td>
                    <td>
                    {{ $file->created_at }}
                    </td>
                    <td>
                    {{ $file->updated_at }}
                    </td>
                    <td>
                    <div class="d-flex">
                        <button wire:click="download({{ $file->id }})" class="btn btn-info" style="margin-right: 5px"><i class="icon-download"></i></button>
                        {{-- <button wire:click="viewFile({{ $file->id }})" class="btn btn-primary" style="margin-right: 5px"><i class="icon-eye"></i></button> --}}
                        <form method="post" action="{{ route('downloadable_forms.destroy', $file->id) }}">      
                            @csrf
                            @method('DELETE')
                            <button id="icon_delete" type="submit" class="btn btn-danger">
                                <i class="icon-trash"></i>
                            </button>
                        </form>
                    </div>
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
            {{-- <div class="d-flex justify-content-center" style="margin-top: 20px">
            {!! $files->links() !!}
            </div> --}}
        </div>
    @endif
</form>
