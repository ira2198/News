@extends('layouts.index')

@section('page.title', 'Admin')

@section('content')

   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2 class="descript text-center mb-5">Admin</h2>
   </div>
   <x-alert :type="request()->get('type', 'success')" message="Some message"></x-alert>
   <x-alert type="success" message="Some message"></x-alert>
   <x-alert type="warning" message="Some message"></x-alert>
   <x-alert type="info"  message="Some message"></x-alert>
   <x-alert type="danger"  message="Some message"></x-alert>
   <x-alert type="alert" message="Some message"></x-alert>
@endsection
