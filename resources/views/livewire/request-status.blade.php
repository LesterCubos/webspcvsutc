<div>
    @foreach($options as $option)
        <input type="radio" id="{{ $option }}" name="option" value="{{ $option }}" wire:model.lazy="selectedOption">
        <label for="{{ $option }}">{{ $option }}</label><br>
    @endforeach
    {{-- <button wire:click="store">Store Selected Option</button> --}}
</div>
