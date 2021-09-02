@extends('layouts.app')

@section('title-b')
Xabarlar
@endsection

@section('content')
    <h1>Barcha xabarlar</h1>
    @foreach($data as $el)
        <div class="alert alert-info">
            <h3>{{$el->xabar_nomi}}</h3>
            <p>{{$el->email}}</p>
            <p><small>{{$el->created_at}}</small></p>
            <a href="{{route('contact-data-one', $el->id)}}"><button class="btn btn-info">Batafsil</button></a>
        </div>

    @endforeach
@endsection
