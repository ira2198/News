
@if(session()->has('success'))
    <x-alert type="success"  :message="session()->get('success')"></x-alert>
@elseif($errors->any())
@foreach($errors->all() as $error)
    <x-alert type="danger"  :message="$error"></x-alert>
@endforeach
@endif



{{-- <x-alert :type="request()->get('type', 'success')" message="Some message"></x-alert>
   <x-alert type="success" message="Some message"></x-alert>
   <x-alert type="warning" message="Some message"></x-alert>
   <x-alert type="info"  message="Some message"></x-alert>
   <x-alert type="danger"  message="Some message"></x-alert>
   <x-alert type="alert" message="Some message"></x-alert> --}}