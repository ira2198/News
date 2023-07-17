@extends('layouts.index')

@section('page.title', 'News')


@section('content')
    
<h2>Users</h2>
    
        <table class="table ">
            <thead class="table-info">
                <tr>
                    <th>#ID</th>
                    <th>Last name</th>
                    <th>First name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Date created</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($users as $item)

                    <tr>
                        <th>{{ $item->id }}</td>
                        <td>{{ $item->first_name}}</td>
                        <td>{{ $item->last_name}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->phone}}</td>
                        <th>{{ $item->status }}</th>
                        <td>{{ $item->created_at }}</td>
                        
                        <td  class="text-center">
                            <button class="btn btn-outline-primary btn-sm">
                                <a  class="navbar-brand" >
                                    Articles
                                </a>
                            </button>
                            <button class="btn btn-outline-danger btn-sm delete" rel="{{$item->id}}" value="/admin/user/delete">
                                Delete
                            </button>
                            <button class="btn btn-outline-success btn-sm" >
                                <a class="navbar-brand" href="{{route('user.edit', ['user'=>$item])}}" >
                                    Redact
                                </a>
                            </button>                       
                        </td>
                   </tr>
                @endforeach

            </tbody>
 
        </table>
        {{-- {{ $users->links() }} --}}

@endsection

@push('jsDel')
<script type="text/javascript" src="{{ asset("js/delete.js") }}"></script>
@endpush 