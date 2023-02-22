function first_ajax() {
    $.ajax({
        url: "{{route('product-req')}}",
        method: "POST",
        dataType: "json",
        data: {
            data_br: $("#br_data").serializeArray(),
            data_cat: $("#cat_data").serializeArray(),
            data_cap: $("#cap_data").serializeArray(),
            data_pr: $("#pr_data").serializeArray(),
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        /*beforeSend: function () {
            $("#loader").show();
            $("#loadData").remove();
        },*/
        success: function (data) {
            $("#dataPlace").append(data.html);
        },
        /*complete: function () {
            $("#loader").hide();
        },*/
    });
};

$("input:checkbox").click(function () {
    first_ajax();
    /*$("#search_form").submit();*/
});

/*$("#br_data").click(function () {
    first_ajax();
});

$("#cat_data").click(function () {
    first_ajax();
});

$("#cap_data").click(function () {
    first_ajax();
});

$("#pr_data").click(function () {
    first_ajax();
});*/
