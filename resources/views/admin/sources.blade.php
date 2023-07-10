@extends('layouts.index')
@section('page.title', 'News')

@section('content')

<h2>Sources</h2>
    <div class="mt-5 ">    
        <table class="table ">
            <thead class="table-info">
                <tr>
                    <th>#ID</th>
                    <th>Source name</th>
                    <th>Description</th>
                    <th>Links</th>
                    <th>Date created</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sources as $item)

                    <tr>
                        <th>{{ $item->id }}</td>
                        <td>{{ $item->name_source}}</td>
                        <td>{{ $item->description }}</td>   
                        <td>{{ $item->links}}</td>                       
                        <td>{{ $item->created_at }}</td>
                        
                        <td  class="text-center">
                            <button class="btn btn-outline-danger btn-sm delete" rel="{{$item->id}}" value="/admin/source/delete">
                                Delete
                            </button>
                            <button class="btn btn-outline-success btn-sm">
                                <a class="navbar-brand" href="{{route('admin.source.edit', ['source'=>$item])}}">
                                    Redact
                                </a>             
                            </button>                       
                        </td>                      
                @endforeach
            </tbody>
        </table>
   {{$sources->links()}}

@endsection
@push('jsDel')
<script type="text/javascript" src="{{ asset("js/delete.js") }}"></script>
@endpush 