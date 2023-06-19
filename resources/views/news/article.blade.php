@extends('layouts.index')

@section('page.title')
{{ $article[0]->title }}
@endsection

@section('content')

<div class="descript  text-end mb-5 text-info-emphasis"> 
    <div>category: {{$article[0]->category}}</div>
    <div>id: {{($article[0]->id) ?? 0}}</div>
    <div >author: {{$article[0]->name}}  {{$article[0]->name}}</div>
    <div>date of publication: {{($article[0]->created_at) ?? "John Dou" }}</div>
</div>

<h3 class="descript  text-center mb-4">{{$article[0]->title}}</h3>

<div class="cotent">{!!$article[0]->text!!}</div>

     
@endsection