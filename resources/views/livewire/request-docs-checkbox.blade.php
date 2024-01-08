<div>
    <div>
        <h5 style="color: green">Tick the box to select document you want to request among the list of documents. Multiple document requests are allowed. Below, state your purpose of requesting document. Please be specific in your purpose. Thank you. </h5>

        <div class="col-md-6">
            <div class="form-group">
                <label>List of Documents:</label>
                @foreach ($reqoptions as $reqoption)
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" value="{{ $reqoption->reqoption }}" class="form-check-input" wire:change="updateCheckedDocuments('{{ $reqoption->reqoption }}')">
                        {{ $reqoption->reqoption }}
                        <i class="input-helper"></i></label>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        {{-- <h3>Checked Documents: {{ var_export($documents) }}</h3> --}}
        <div class="form-group">
            <label for="totalPrice">Total Price:</label>
            @php ($totalp = 0)
            @forelse ($documents as $document)
                @foreach ($reqoptions as $reqoption)
                    @if($document == $reqoption->reqoption)
                        @php ($totalp = $totalp + $reqoption->price )
                    @endif
                @endforeach
            @empty
            
            @endforelse
            <input type="number" class="form-control @error('totalPrice') is-invalid @enderror" id="totalPrice" name="totalPrice" value="{{ $totalp }}" step="0.01" readonly>
            @error('totalPrice')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
