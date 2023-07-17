
@if(session()->has('success'))
    <x-alert type="success"  :message="session()->get('success')"></x-alert>
@elseif(session()->has('error'))
    <x-alert type="danger"  :message="session()->get('error')"></x-alert>
@endif



{{-- <x-alert :type="request()->get('type', 'success')" message="Some message"></x-alert>
   <x-alert type="success" message="Some message"></x-alert>
   <x-alert type="warning" message="Some message"></x-alert>
   <x-alert type="info"  message="Some message"></x-alert>
   <x-alert type="danger"  message="Some message"></x-alert>
   <x-alert type="alert" message="Some message"></x-alert> --}}