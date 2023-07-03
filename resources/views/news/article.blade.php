@extends('layouts.index')

@section('page.title')
    {{ $article->title }}
@endsection

@section('content')

<div class="descript  text-end mb-5 text-info-emphasis"> 
    <div>category: {{$article->category->category_name}}</div>
    <div>id: {{($article->id) ?? 0}}</div>
    <div >author: {{$article->users->first_name}} {{$article->users->last_name}}</div>
    <div>date of publication: {{($article->created_at) ?? "00:00:00" }}</div>
</div>

<h3 class="descript  text-center mb-4">{{$article->title}}</h3>

<div class="cotent">{!!$article->text!!}</div>

     
@endsection