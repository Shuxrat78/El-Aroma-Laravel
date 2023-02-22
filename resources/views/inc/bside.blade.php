<div class="d-md-flex flex-md-row flex-md-wrap">
@if (isset($data))
@foreach($data as $prod)
<div class="d-grid mx-4 mb-5">
  <div class="card border border-dark" style="width: 360px;">
    <div class="border-bottom border-dark" style="width: 358px;">
      <a href="#"><img src="img/{{$prod->filename}}" class="img-thumbnail rounded" alt="..." style="width: 358px; height: 250px"></a>
    </div>
<div class="card-body bg-light">
  <div class="text-wrap" style="width: 330px;">
    <a href="#">
      @if($prod->cpct == 0)
        <h5>{{$prod->name}}</h5>
      @else
      <h4>{{$prod->name}} - {{$prod->cpct}} ml</h4>
      @endif
    </a>
</div>
  <p class="card-text fs-5"><b>Цена - {{$prod->price}} руб</b></p>
    <p class="card-text fs-5"><b>Рейтинг - </b>
      @for($i=1, $k=2; $i<=5; $i++)
        @if($i<=$k)
          <i class="fas fa-star"></i>
        @else
          <i class="far fa-star"></i>
        @endif
      @endfor
    </p>
      <div class="justify-content-bottom">
        <a href="#" class="rounded-pill btn btn-success px-4">Купить</a>
        <a href="#" class="rounded-pill btn btn-danger ms-2 px-4">В корзину</a>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
@endif
