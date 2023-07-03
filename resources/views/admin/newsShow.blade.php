@extends('layouts.index')

@section('page.title', 'News')


@section('content')

<h2>News</h2>
    <div class="mt-5 ">
    
        <table class="table ">
            <thead class="table-info">
                <tr>
                    <th>#ID</th>
                    <th>Categories</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date created</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($newsList as $news)

                    <tr>
                        <th>{{ $news->id }}</td>
                        <td>{{ $news->category->category_name}}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->users->first_name }} {{ $news->users->first_name }}</td>
                        <th>{{ $news->status }}</th>
                        <td>{{ $news->created_at }}</td>
                        
                        <td  class="text-center">

                            <button class="btn btn-outline-primary btn-sm">
                                 <a  class="navbar-brand" href="{{route('source.article.show', $news->id)}}" >Sources</a>
                            </button>

                            <button class="btn btn-outline-danger btn-sm">Delete</button>
                            <button class="btn btn-outline-success btn-sm">
                                <a class="navbar-brand" href="{{route('admin.article.edit', ['news'=>$news])}}">Redact</a>                            </button>                       
                        </td>
                   </tr>
                @endforeach

            </tbody>

        </table>
        {{ $newsList->links() }}

@endsection