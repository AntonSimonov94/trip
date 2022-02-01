@if(session()->has('success'))
    <x-alert type="success" :message="session()->get('success')"></x-alert>
@endif


@if(session()->has('error'))
    <x-alert type="danger" :message="session()->get('error')"></x-alert>
@endif

