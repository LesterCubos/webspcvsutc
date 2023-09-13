<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-6" style="margin-bottom: 10px; float:right">
                <input type="text"  class="form-control" placeholder="Search News..." wire:model.lazy="searchNews" />
            </div>
    
            <table class="table table-bordered table-hover border-primary">
                <thead class="table-display text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">News Title</th>
                    <th scope="col">Headline</th>
                    <th scope="col">Content</th>
                    <th scope="col">News Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
        
                <tbody>
                    {{-- populate our carousel item data --}}
                    @forelse ($news as $new)
                        <tr>
                            <th scope="row">{{ $new->id }}</th>
                            <td>{{ $new->news_title }}</td>
                            <td>{{ $new->news_headline }}</td>
                            <td >{!! Str::limit($new->news_content,'250','...') !!}</td>
                            <td><img style="width:250px" src="{{ Storage::url($new->news_image) }}" alt="{{ $new->news_title }}" srcset=""></td>
                            <td>{{ $new->created_at }}</td>
                            <td>{{ $new->updated_at }}</td>
                            <td>
                                <form method="post" action="{{ route('news.destroy', $new->id) }}" class="d-grid gap-2">
            
                                    <a class="btn" id="icon_edit" href="{{ route('news.edit', $new->id) }}"><i class="ri-edit-box-fill"></i></a>
            
                                    @csrf
                                    @method('DELETE')
            
                                    <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                                    
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No News Found...</div>
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $news->links() !!}
            </div>
        </div>
    </div>
</div>
