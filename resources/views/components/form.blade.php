@props([
    'method' => 'post',
    'action' => ''
])
<form method="{{ $method === 'get' ? 'get' : 'post' }}"
      action="{{ $action }}"
    {{ $attributes }}>
    @csrf
    @if(!in_array($method, ['get', 'post']))
        @method($method)
    @endif
    {{ $slot }}
</form>
