@if($errors->any())
    <div class="row alert alert-danger">
        <div class="col-11 fs-5">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-1 d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="row alert alert-success">
        <div class="col-11 fs-5">
            {{session('success')}}
        </div>
        <div class="col-1 d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif