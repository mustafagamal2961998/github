@props([
    'key',
])

@if (Session::has($key))
    <div class="alert alert-success">
        {{Session::get($key)}}
    </div>
@endif