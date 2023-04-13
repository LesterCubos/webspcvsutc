<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success rounded-pill']) }}>
    {{ $slot }}
</button>
