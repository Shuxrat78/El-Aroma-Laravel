{{--<form action="{{route('product-req')}}" method="post" id="br_data">
    @csrf--}}
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
                    <form id="br_data">
                        @csrf
                        @foreach($brend as $brnd)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="{{$brnd->id}}" id="brend-id">
                                    {{$brnd->brand_name}}
                                </label>
                            </div>
                        @endforeach
                    </form>
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
                    <form id="cat_data">
                        @csrf
                            @foreach($category as $categori)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="{{$categori->id}}" id="category-id">
                                        {{$categori->category_name}}
                                    </label>
                                </div>
                            @endforeach
                    </form>
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
                    <form id="cap_data">
                        @csrf
                            @foreach($capacity as $capaciti)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="{{$capaciti->id}}" id="capacity-id">
                                        {{$capaciti->cpct}}
                                    </label>
                                </div>
                            @endforeach
                    </form>
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
                    <form id="pr_data">
                        @csrf
                            <div class="input-group mb-3">
                                <label class="form-control-label fs-5" for="flexCheckChecked4_1">от</label>
                                <div class="col-1"></div>
                                    <div class="col-8">
                                        <input class="form-control fs-6" type="number" min="0" step="5000" name="min" id="flexCheckChecked4_1">
                                    </div>
                            </div>
                            <div class="input-group">
                                <label class="form-control-label fs-5" for="flexCheckChecked4_2">до</label>
                                <div class="col-1"></div>
                                    <div class="col-8">
                                        <input class="form-control fs-6" type="number" min="0" step="5000" name="max" id="flexCheckChecked4_2">
                                    </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

            <div class="mt-4 fs-4 mb-2">
                <button type="submit" class="rounded-pill btn btn-success px-4 ms-2 me-1 shadow"> OK </button>
                <button type="reset" class="rounded-pill btn btn-danger px-4 ms-1 me-1 shadow">Отмена</button>
            </div>
</div>
{{--</form>--}}
<script>
let zap = 1;
    function first_ajax() {
        $("#dataPlace").html(" ");
        $.ajax({
            url: "{{route('product-req')}}",
            method: "POST",
            dataType: "json",
            data: {
                   zp: zap,
                data1: $("#br_data").serializeArray(),
                data2: $("#cat_data").serializeArray(),
                data3: $("#cap_data").serializeArray(),
                data4: $("#pr_data").serializeArray(),
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            /*beforeSend: function () {
                $("#loader").show();
                $("#loadData").remove();
            },*/
            success: function (data) {
                console.log(data.databr);
                console.log(data.datacat);
                $("#dataPlace").append(data.html);
            },
            complete: function () {
            if (zap < 2){zap++}
                /*$("#loader").hide();*/
            },
        });
    };

    $("input:checkbox").click(function () {
        first_ajax();
    });

    $(document).ready(function () {
        first_ajax();
    });

</script>
