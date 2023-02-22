@extends('layouts.app')

@section('title-b')
Товары
@endsection

@section('content')
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

<div class="container">
@include('inc.messages')
  <div id="ExportReport"></div>
  <br>
  <table class="table caption-top" id="example">
  
    <thead class="table-secondary fs-4">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Фото</th>
        <th scope="col">Имя товара</th>
        <th scope="col">Бренд</th>
        <th scope="col">Категория</th>
        <th scope="col">Объем</th>
        <th scope="col">Цена</th>      
        <th scope="col">Действие</th>
      </tr>
  </thead>
<tbody class="fs-5">
  @foreach($data as $prod)
    <tr>
      <td scope="row">{{($data->currentpage()-1) * $data->perpage() + ($loop->index+1)}}</td>
      <td><a onclick = "rasm('{{$prod->id}}', '{{$prod->name}}', 'img/{{$prod->filename}}')"><img src="img/{{$prod->filename}}" class="rounded" alt="..." style="width: 45px; height: 35px" data-bs-toggle="modal" data-bs-target="#exampleModal"/></a></td>
      <form action="{{route('product-edit-submit', $prod->id)}}" method="post">
        @csrf

      <td width="40%">
      {{$prod->name}}
      </td>

      <!-- Столбец Бренда -->
      <td>
      {{$prod->brend->name}}
      </td>

      <!-- Столбец Категории -->
      <td>
        {{$prod->category->name}}
      </td>

      <!-- Столбец Объема -->
      <td>
        {{$prod->capacity->cpct}}
      </td>

      <td width="10%">
        {{$prod->price}}
      </td>
      <td class="px-0 py-1" id="btn{{$prod->id}}"><button type="button" class="btn btn-info me-3 py-0 ms-3" onclick="prod_edit('{{$prod->id}}')"><i class="fas fa-edit"></i></button></a><a href="#"><button class="btn btn-danger py-0"><i class="fas fa-trash-alt"></i></button></td>


    </tr>
</form>
@endforeach
  </tbody>
</table>
  <br>

<div class="row">
  <div class="col-3">
    <button class="btn btn-success px-4 fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal2">Добавить</button>
  </div>
  <div class="col-7">
  </div>
  <div class="col-2">
    {{$data->links()}}
  </div>
</div>

</div>

<!-- Modal-1 begin -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="col-10 centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"><img src="" id="mb">
      </div>
      <div class="modal-footer">

      <div id="fl">      
          <button type="button" class="btn btn-success" onclick="foto_edit()">Изменить</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> OK </button>
        </form>
      </div>

      
        <div class="col-8" id="fl1" hidden>
          <form action="{{route('update-foto-submit')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="number" name="id" id="id" hidden>
          <input type="file" multiple name="file[]" class="form-control shadow bg-body rounded" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
        </div>
        <div id="fl2" hidden>
          <button type="submit" class="btn btn-success">Сохранить</button>
          <button type="button" class="btn btn-secondary" onclick="foto_cancel()">Отмена</button>
          </form>
        </div>      
      
      </div>
    </div>
    </div>
  </div>
</div>
<!-- Modal-1 end -->

<!-- Modal-2 begin -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModal2Label"><i>Ввод нового товара</i></h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{ route('product-new-submit') }}" enctype="multipart/form-data">
      <input name="_token" type="hidden" value="{{ csrf_token() }}">

      <div class="input-group input-group-lg mb-4">

      @include('product-new')

      </div>

      <div class="modal-footer">
        <button type="reset" class="btn btn-danger btn-lg me-3">Очистить</button>
        <button type="submit" class="btn btn-success btn-lg me-3">Сохранить</button>
        <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal"> Отмена </button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal-2 end -->

{{--<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>--}}

<script>

let d = 0; //доступ к редактирование товара в строке таблицы...

function rasm(id, mn, fn){ //функция для увеличения и изменения фото
  document.getElementById("id").value = id;
  document.getElementById("exampleModalLabel").innerHTML = mn;
  let a;
  a = document.getElementById("mb");
  a.width = '600';
  a.src = fn;
}

function foto_edit(){ // функция изменения фото
  document.getElementById("fl").setAttribute("hidden","hidden");
  document.getElementById("fl2").removeAttribute("hidden");
  document.getElementById("fl1").removeAttribute("hidden");
}

function foto_cancel(){ // функция отмены изменения фото
  document.getElementById("fl1").setAttribute("hidden","hidden");
  document.getElementById("fl2").setAttribute("hidden","hidden");
  document.getElementById("fl").removeAttribute("hidden");
}

function prod_edit(id){ // функция редактирования
  if (d == 0){
    document.getElementById("prn"+id).removeAttribute("disabled");
    document.getElementById("brn"+id).removeAttribute("disabled");
    document.getElementById("catn"+id).removeAttribute("disabled");
    document.getElementById("capn"+id).removeAttribute("disabled");
    document.getElementById("prc"+id).removeAttribute("disabled");
    document.getElementById("btn"+id).setAttribute("hidden","hidden");
    document.getElementById("bttn"+id).removeAttribute("hidden");
    d = 1;
  }
}

function prod_cancel(id){ // отмена редактирования
  document.getElementById("prn"+id).setAttribute("disabled","disabled");
  document.getElementById("brn"+id).setAttribute("disabled","disabled");
  document.getElementById("catn"+id).setAttribute("disabled","disabled");
  document.getElementById("capn"+id).setAttribute("disabled","disabled");
  document.getElementById("prc"+id).setAttribute("disabled","disabled");
  document.getElementById("btn"+id).removeAttribute("hidden");
  document.getElementById("bttn"+id).setAttribute("hidden","hidden");
  d = 0;
}

/*$(document).ready(function () {
  $('#example').DataTable({

    paging: false,
    ordering: true,
    info: false,
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
});*/
table = $('#example')
        .DataTable({
          /*lengthMenu: [15],*/
          info: false,
          searching: false,
          colReorder: false,
          paging: false,
          dom: 'Bfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'],
        });

$('#example').DataTable().buttons().container().appendTo('#ExportReport');

</script>

@endsection
  {{--<td class="px-0 py-1" id="bttn{{$prod->id}}" hidden><button  type="submit" class="btn btn-info me-3 py-0 ms-3"><i class="fas fa-save"></i></button><button type="button" onclick="prod_cancel('{{$prod->id}}')" class="btn btn-danger py-0"><i class="fas fa-window-close"></i></button></td>--}}
