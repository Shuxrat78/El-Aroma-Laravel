<form action="{{route('product-req')}}" method="post">
    @csrf
        <div class="border border-dark bg-light px-2 py-2">

            <div class="mb-4 text-center fs-4">
                <p class="text-danger">Сортировка</p>
            </div>

            <div class="accordion" id="accordionPanelsStayOpenExample">

                <div class="accordion-item mb-3 shadow rounded fs-5 mx-2">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                        Бренд
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            @foreach($brend as $brnd)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="brend{{$brnd->id}}" value="brand" id="brend-id">
                                        {{$brnd->brand_name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 shadow rounded fs-5 mx-2">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Категория
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            @foreach($category as $categori)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="category{{$categori->id}}" value="category" id="category-id">
                                        {{$categori->category_name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 shadow rounded fs-5 mx-2">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Объем
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            @foreach($capacity as $capaciti)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="capacity{{$capaciti->id}}" value="capacity" id="capacity-id">
                                        {{$capaciti->cpct}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 shadow rounded fs-5 mx-2">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Цена
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <label class="form-control-label fs-5" for="flexCheckChecked4_1">от</label>
                                    <div class="col-1"></div>
                                    <div class="col-8">
                                        <input class="form-control fs-6" type="number" min="0" step="5000" name="min" value="{{$mn}}" id="flexCheckChecked4_1">
                                    </div>
                            </div>
                            <div class="input-group">
                                <label class="form-control-label fs-5" for="flexCheckChecked4_2">до</label>
                                    <div class="col-1"></div>
                                    <div class="col-8">
                                        <input class="form-control fs-6" type="number" min="0" step="5000" name="max" value="{{$mx}}" id="flexCheckChecked4_2">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 fs-4 mb-2">
                <button type="submit" class="rounded-pill btn btn-success px-4 ms-2 me-1 shadow"> OK </button>
                <button type="reset" class="rounded-pill btn btn-danger px-4 ms-1 me-1 shadow">Отмена</button>
            </div>
        </div>
</form>
