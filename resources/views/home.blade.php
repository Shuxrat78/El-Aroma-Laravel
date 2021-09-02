@extends('layouts.app')

@section('title-b') <!-- (Часть заголовки) -->
Главная страница
@endsection

@section('content')
<div class="container-fluid mt-5">
    @include('inc.messages')  <!-- Верхний часть (Показ сообщений) -->
    <div class="row">
        <div class="col-2">          
          @include('inc.aside') <!-- Левый часть (Окно сортировки) -->
        </div>
        <div class="col-10">
          @include('inc.bside') <!-- Правый часть (Показ товаров) -->
        </div>
    </div>
</div>
@endsection
