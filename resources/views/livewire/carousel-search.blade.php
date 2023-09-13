<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-6" style="margin-bottom: 10px; float:right">
                <input type="text"  class="form-control" placeholder="Search Carousel..." wire:model.lazy="searchCarousel" />
            </div>
    
            <table class="table table-bordered table-hover border-primary">
                <thead class="table-display text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Featured Image</th>
                    <th scope="col">Content</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
        
                <tbody>
                    {{-- populate our carousel item data --}}
                    @forelse ($carouselitems as $carousel_item)
                        <tr>
                            <th scope="row">{{ $carousel_item->id }}</th>
                            <td>{{ $carousel_item->title }}</td>
                            <td><img style="width:250px" src="{{ Storage::url($carousel_item->featured_image) }}" alt="{{ $carousel_item->title }}" srcset=""></td>
                            <td>{{ $carousel_item->content }}</td>
                            <td>{{ $carousel_item->created_at }}</td>
                            <td>{{ $carousel_item->updated_at }}</td>
                            <td>
                                <form method="post" action="{{ route('carousel_items.destroy', $carousel_item->id) }}" class="d-grid gap-2">
            
                                    {{-- <a class="btn btn-info" href="{{ route('carousel_items.show', $carousel_item->id) }}">Show</a> --}}
                                    <a class="btn" id="icon_edit" href="{{ route('carousel_items.edit', $carousel_item->id) }}"><i class="ri-edit-box-fill"></i></a>
                                    @csrf
                                    @method('DELETE')
            
                                    <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                                </form>
                                
                                @livewire('switch-status', ['model' => $carousel_item, 'field' => 'isActive'], key($carousel_item->id))
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Carousel Found...</div>
                            </td>  
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $carouselitems->links() !!}
            </div>
        </div>
    </div>
</div>
