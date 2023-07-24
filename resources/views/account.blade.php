@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card ">
                <div class="card-header bg-info-subtle text-emphasis-info h4 mb-3">
                    {{Auth::user()->name}} 
                </div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between flex-wrap" >
                        
                        <div class="w-25 h-50 border border-primary border-2 border-opacity-75 me-4 mb-3 rounded" style="min-width: 230px; min-height: 300px;">
                            <img src="{{Auth::user()->avatar}}"  class="object-fit-cover img-fluid" alt="">   
                                 
                        </div>
                               
                        <div class="m-4 d-flex flex-column ">

                            <ul class="list-group list-group-flush flex-grow-1">  
                                <p class="text-start h5 mb-3">
                                    Contacts
                                </p>  
                                <li class="mb-2">
                                    My email: {{Auth::user()->email}}
                                </li> 
                                <li class="mb-2">
                                    My phone: {{Auth::user()->phone}}
                                </li> 
                            </ul>

                            <button type="button" class="btn btn-outline-warning m-2 ms-0">
                                <a href="{{route('user.edit', ['user' => Auth::user()])}}" class="navbar-brand" style="color: rgb(48, 40, 4)">
                                     Redact profile
                                </a>
                                </button>

                                <button type="button" class="btn btn-outline-success m-2 ms-0">
                                    <a class="navbar-brand" href="{{ route('admin.article.create') }}" >
                                        Create new article
                                    </a>
                                </button>
                                
                                <button type="button" class="btn btn-outline-info m-2 ms-0">
                                    <a class="navbar-brand" href="" >
                                         Add sources
                                    </a>
                                </button>

                        </div>
                            
                            
                     
                        <div class="flex-grow-1">
                           
                            <p class="text-center h5">My articles</p>
                        
                            <div class="">
                                @forelse ($articles as $item)
                                    <div class=" border border-primary-subtle p-3 mb-3 border-opacity-50 rounded"  >
                                        <a  class="navbar-brand" href="{{ route('article',  $item->id)}}">
                                            <div class="blockquote ms-2 mb-0 mw-80 text-wrap">
                                                {{$item->title}}
                                            </div>
                                            <div class="text-end opacity-75 fw-smoll">{{$item->created_at}}</div>
                                        </a>
                                       <div class="">
                                        <button type="button" class="btn btn-outline-success">
                                            <a class="navbar-brand" href="{{route('admin.article.edit', ['news'=>$item->id])}}">
                                                edit
                                            </a>
                                        </button>
                                        <button class="btn btn-outline-danger delete"  rel="{{$item->id}}" value="/admin/news/delete">
                                            delete
                                        </button>
                                       </div>
                                    </div>
                                @empty
                            {{__("You don't have any articles yet")}}
                                @endforelse
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('jsDel')
<script type="text/javascript" src="{{ asset("js/delete.js") }}"></script>
@endpush 