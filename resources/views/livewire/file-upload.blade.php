<form wire:submit.prevent="submit" enctype="multipart/form-data">
  
    <div>
        @if(session()->has('message'))
        <div class="alert alert-success fade in alert-dismissible show" role="alert" style="margin-top: 50px; margin-bottom: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" style="font-size:20px;">x</span>
            </button>
            <i class="bi bi-check-circle-fill" style="margin-right: 5px; font-size: 18px"></i>    
            <strong style="font-weight: bolder">{{ session('message') }}</strong>
          </div>
        @endif
    </div>
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
</form>
