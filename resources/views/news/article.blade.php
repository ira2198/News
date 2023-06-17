@extends('layouts.index')

@section('page.title')
    {{$article['title']}}
@endsection

@section('content')

<div class="descript  text-end mb-5 text-info-emphasis"> 
    <div>category: {{$article['category']}}</div>
    <div>id: {{($article['id']) ?? 0}}</div>
    <div >author: {{$article['author']}}</div>
    <div>date of publication: {{($article['created_at']) ?? "Jon Conner" }}</div>
</div>

<h3 class="descript  text-center mb-4">{{$article['title']}}</h3>

<div class="cotent">{!!$article['text']!!}</div>

     
@endsection