@extends('layouts.app')

@section('title-b')
Бренды
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-2">

    <div class="border bg-light px-2 py-2">

    <div class="text-center fs-4">
        <p class="fw-bolder">Бренды</p>
        <hr>
    </div>

    <div class="text-center py-0">

      @foreach($brend as $brnd)        
          
          <i class="fs-5">{{$brnd->name}}</i><br>
              
      @endforeach

    </div>

    </div>
    </div>

    <div class="col-1">

    </div>
    <div class="col-6">

    <form action="brendsubmit" method="get" class="border bg-light px-4 py-4">
    @csrf

  <div class="input-group input-group-lg mb-4">
    <label class="input-group-text" for="inputGroupSelect01">Названия Бренда</label>
    <input type="text" name="brend" placeholder="Введите название Бренда" class="form-control shadow bg-body rounded" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
  </div>

  <button type="submit" class="btn btn-success btn-lg mt-3">Сохранить</button>

</form>
</div>
</div>
</div>

@endsection
