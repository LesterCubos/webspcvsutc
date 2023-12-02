<div class="col-lg-12 grid-margin stretch-card">
    @if(session('notif.success') || session('notif.danger'))
      <div class="card" style="border-radius: 10px">
    @else
      <div class="card" style="margin-top: 50px; border-radius: 10px">
    @endif
        <div class="card-body">
            <h4 class="card-title">Request Docements Table</h4>
              <a href="{{ route('request_docs.create') }}" class="btn btn-primary btn-icon-text">
                <i class="bx bxs-message-add btn-icon-prepend" style="font-size: 1.225rem;"></i>
                Add Request Option
              </a>
              <div class="input-group col-6 search-form" style="margin-bottom: 20px; float:right">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="search" style="background-color:  #ec37fc; color: #fff">
                    <i class="icon-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search Transaction No..." wire:model.lazy="searchStudentRequest">
              </div>
            <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                    TRANSACTION NO.
                    </th>
                    <th>
                    DATE REQUESTED
                    </th>
                    <th>
                    REQUEST
                    </th>
                    <th>
                    PURPOSE
                    </th>
                    <th>
                    STATUS
                    </th>
                    <th>
                    TOTAL PRICE
                    </th>
                    <th>
                    ACTION
                    </th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($requestdocs as $requestdoc)
                        <tr>
                            <td>
                                {{ $requestdoc->transNo }}
                            </td>
                            <td>
                                {{ $requestdoc->created_at->format('Y-m-d') }}
                            </td>
                            <td>
                                {{ $requestdoc->req }}
                            </td>
                            <td>
                                {!! Str::limit($requestdoc->purpose,'250','...') !!}
                            </td>
                            <td>
                              {{ $requestdoc->status}}
                              {{-- @if($requestdoc->isActive == 1)
                              <label class="badge badge-success">Active</label>
                              @elseif($requestdoc->isActive == 0)
                                  <label class="badge badge-danger">Inactive</label>
                              @endif --}}
                            </td>
                            <td>
                                {{ $requestdoc->totalPrice }}
                            </td>
                            <td>
                              <form method="post" action="{{ route('request_docs.destroy', $requestdoc->id) }}">      
                                @csrf
                                @method('DELETE')
                                {{-- <a class="btn btn-primary btn-fw" id="icon_edit" href="{{ route('request_docs.edit', $requestdoc->id) }}"><i class="bi bi-pencil-square"></i></a> --}}
                                <button id="icon_delete" type="submit" class="btn btn-danger">
                                  <i class="icon-trash"></i>
                                </button>
                              </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Data Found...</div>
                            </td>  
                        </tr> 
                    @endforelse
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center" style="margin-top: 20px">
              {!! $requestdocs->links() !!}
            </div>
            </div>
        </div>
    </div>
    </div>
    
    