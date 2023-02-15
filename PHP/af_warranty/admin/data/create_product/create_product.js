$(document).ready(function () {
    $("#SerialNumber").keyup(function () {
        var SerialNumber = $('#SerialNumber').val();
        if ((SerialNumber.length == 17)) {

            $('.SerialNumber_show').removeClass("d-block");
            $.ajax({
                type: "POST",
                url: "data/create_product/fetchall.php",
                dataType: "json",
                data: {
                    SerialNumber: SerialNumber,
                },
                success: function (ret) {
                    if (ret['success']) {
                        $('.status_rn').removeClass("d-none");
                        $('#create_product').addClass("btn-disabled ");
                    } else {
                        $('#create_product').removeClass("btn-disabled ");
                        $('.status_rn').addClass("d-none");
                    }
                },
            });
        } else {
            $('#create_product').addClass("btn-disabled ");
            $('.SerialNumber_show').addClass("d-block");
            $('.status_rn').addClass("d-none");
        }
    });

    $("#SerialNumber_Start,#SerialNumber_End").keyup(function () {
        var SerialNumber_Start = $('#SerialNumber_Start').val();
        var SerialNumber_End = $('#SerialNumber_End').val();
        if (SerialNumber_Start.length == 17 && SerialNumber_End.length == 17) {
            $('.SerialNumber_show').removeClass("d-block");
            var SerialNumber = '';
            $.ajax({
                type: "POST",
                url: "data/create_product/fetchall.php",
                dataType: "json",
                data: {
                    SerialNumber: SerialNumber,
                    SerialNumber_Start: SerialNumber_Start,
                    SerialNumber_End: SerialNumber_End,
                },
                success: function (ret) {
                    if (ret['success']) {
                        $('.status_rn').removeClass("d-none");
                        $('#create_product').addClass("btn-disabled");
                    } else {
                        $('#create_product').removeClass("btn-disabled");
                        $('.status_rn').addClass("d-none");
                    }
                },
            });
        } else {
            $('#create_product').addClass("btn-disabled");
            $('.SerialNumber_show').addClass("d-block");
            $('.status_rn').addClass("d-none");
        }
    });

    $("#form_create_product").submit(function (event) {
        event.preventDefault();
        if ($("#Customer").is(":checked")) {
            var Customer = 'on'
        } else {
            var Customer = 'off'
        }
        if ($("#Sell").is(":checked")) {
            var Sell = 'on'
        } else {
            var Sell = 'off'
        }

        var formData = {
            SerialNumber: $('#SerialNumber').val(),
            SerialNumber_Start: $('#SerialNumber_Start').val(),
            SerialNumber_End: $('#SerialNumber_End').val(),
            Purchase_date: $('#Purchase_date').val(),
            Brand: $('#Brand').val(),
            Product: $('#Product').val(),
            Model: $('#Model').val(),
            Warranty: $('#Warranty').val(),
            Dealer: $('#Dealer').val(),
            Customer_name: $('#Customer_name').val(),
            Tel: $('#Tel').val(),
            Email: $('#Email').val(),
            Number: $('#Number').val(),
            Village: $('#Village').val(),
            Soi: $('#Soi').val(),
            Road: $('#Road').val(),
            province: $('#province').val(),
            amphure: $('#amphure').val(),
            district: $('#district').val(),
            zipcode: $('#zipcode').val(),
            Comment: $('#Comment').val(),
            Customer: Customer,
            Sell: Sell,
        };
        $.ajax({
            type: "POST",
            url: "data/create_product/create_product.php",
            data: formData,
            dataType: 'json',
            success: function (ret) {
                if (ret['success'] == true) {
                    $('#SerialNumber').val('');
                    $('#SerialNumber_Start').val('');
                    $('#SerialNumber_End').val('');
                    $('#Purchase_date').val('');
                    $('#Brand').val('');
                    $('#Product').val('');
                    $('#Model').val('');
                    $('#Dealer').val('');
                    $('#Warranty').val('');
                    $('#Customer_name').val('');
                    $('#Email').val('');
                    $('#Tel').val('');
                    $('#Number').val('');
                    $('#Village').val('');
                    $('#Soi').val('');
                    $('#Road').val('');
                    $('#province').val('');
                    $('#amphure').val('');
                    $('#district').val('');
                    $('#zipcode').val('');
                    $('#Comment').val('');
                    $('.success').addClass("show");
                    $('.success').removeClass("hide");
                    $('.success').addClass("showAlert");
                    $('#table-show-create').removeClass("d-none");
                    setTimeout(function () {
                        $('.success').removeClass("show");
                        $('.success').addClass("hide");
                    }, 5000);
                    $('#table-text-create').append("<h3 class='text-primary'>รายการสินค้าที่คุณลงทะเบียน</h3> <h4>รวม : <span class='text-primary'>" + ret['sum'][0] + "</span></h4> <h4>สำเร็จ : <span class='text-success'>" + ret['sum'][1] + "</span></h4> <h4>ผิดพลาด : <span  class='text-danger'>" + ret['sum'][2] + "</span></h4>").addClass("text-center w-100%");
                    $.each(ret['data'], function (key, val) {
                        var tds = val.map(function (value) {
                            if (value == 'SUCCESS') {
                                return '<td class="text-success" contenteditable="true">' + value + '</td>';
                            } else if (value == 'FAIL') {
                                return '<td class="text-danger" contenteditable="true">' + value + '</td>';
                            } else {
                                return '<td contenteditable="true">' + value + '</td>';
                            }
                        });
                        $('#tBody').append('<tr>' + tds.join('') + '</tr>');
                    });
                } else if (ret['success'] == 'Sort') {
                    $('.alert4').addClass("show");
                    $('.alert4').removeClass("hide");
                    $('.alert4').addClass("showAlert");
                    setTimeout(function () {
                        $('.alert4').removeClass("show");
                        $('.alert4').addClass("hide");
                    }, 4000);
                } else {
                    $('.alert2').addClass("show");
                    $('.alert2').removeClass("hide");
                    $('.alert2').addClass("showAlert");
                    setTimeout(function () {
                        $('.alert2').removeClass("show");
                        $('.alert2').addClass("hide");
                    }, 4000);
                }
            }
        });
    });

    $('#import_excel').on("submit", function (event) {
        event.preventDefault();
        var formData = new FormData();
        formData.append('file', $('#file')[0].files[0]);
        $.ajax({
            url: 'data/create_product/import.php',
            type: 'POST',
            data: formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            dataType: 'json',  // tell jQuery not to set contentType
            success: function (ret) {
                if (ret['success']) {
                    $('.import_excel').addClass("show");
                    $('.import_excel').removeClass("hide");
                    $('.import_excel').addClass("showAlert");
                    $('#table-show-create').removeClass("d-none");
                    setTimeout(function () {
                        $('.import_excel').removeClass("show");
                        $('.import_excel').addClass("hide");
                    }, 5000);
                    $('#table-text-create').append("<h3 class='text-primary'>รายการสินค้าที่คุณลงทะเบียน</h3> <h4>รวม : <span class='text-primary'>" + ret['sum'][0] + "</span></h4> <h4>สำเร็จ : <span class='text-success'>" + ret['sum'][1] + "</span></h4> <h4>ผิดพลาด : <span  class='text-danger'>" + ret['sum'][2] + "</span></h4>").addClass("text-center w-100%");
                    $.each(ret['data'], function (key, val) {
                        var tds = val.map(function (value) {
                            if (value == 'SUCCESS') {
                                return '<td class="text-success" contenteditable="true">' + value + '</td>';
                            } else if (value == 'FAIL') {
                                return '<td class="text-danger" contenteditable="true">' + value + '</td>';
                            } else {
                                return '<td contenteditable="true">' + value + '</td>';
                            }
                        });
                        $('#tBody').append('<tr>' + tds.join('') + '</tr>');
                    });
                } else {
                    $('.import-excel-error').addClass("show");
                    $('.import-excel-error').removeClass("hide");
                    $('.import-excel-error').addClass("showAlert");
                    setTimeout(function () {
                        $('.import-excel-error').removeClass("show");
                        $('.import-excel-error').addClass("hide");
                    }, 4000);
                }
            }
        });
    });
    

});

