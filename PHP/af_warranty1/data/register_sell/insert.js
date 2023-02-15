$(document).ready(function () {
    $("#SerialNumber").keyup(function () {
        var SerialNumber = $('#SerialNumber').val();
        if ((SerialNumber.length == 17)) {
            $.ajax({
                type: "POST",
                url: "data/register_sell/fetchall.php",
                dataType: "json",
                data: {
                    SerialNumber: SerialNumber,
                },
                success: function (ret) {
                    if (ret['success']) {
                        $('.SerialNumber_show').removeClass("d-block");
                        $('#register_sell_save').removeClass("disabled");
                        $('#status').addClass("d-none");
                        $('#SerialNumber').val(ret['data'].SerialNumber);
                        $('#Brand').val(ret['data'].Brand);
                        $('#Dealer').val(ret['data'].Dealer);
                        $('#Model').val(ret['data'].Model);
                        $('#Product').val(ret['data'].Product);
                        $('#Warranty').val(ret['data'].Warranty);
                    } else {
                        // ค่างว่างเมื่อไม่เจอ
                        $('#Brand').val('');
                        $('#Dealer').val('');
                        $('#Model').val('');
                        $('#Product').val('');
                        $('#Warranty').val('');
                        $('.status_rn').removeClass("d-none");
                        $('.SerialNumber_show').removeClass("d-block");
                    }
                },
            });
        } else {
            $('#Brand').val('');
            $('#Dealer').val('');
            $('#Model').val('');
            $('#Product').val('');
            $('#Warranty').val('');
            $('#register_sell_save').addClass("disabled");
            $('.SerialNumber_show').addClass("d-block");
            $('.status_rn').addClass("d-none");
        }
    });

    $("#SerialNumber_Start,#SerialNumber_End").keyup(function () {
        var SerialNumber_Start = $('#SerialNumber_Start').val();
        var SerialNumber_End = $('#SerialNumber_End').val();
        if (SerialNumber_Start.length == 17 && SerialNumber_End.length == 17) {
            var SerialNumber = '';
            $.ajax({
                type: "POST",
                url: "data/register_sell/fetchall.php",
                dataType: "json",
                data: {
                    SerialNumber: SerialNumber,
                    SerialNumber_Start: SerialNumber_Start,
                    SerialNumber_End: SerialNumber_End,
                },
                success: function (ret) {
                    if (ret['success']) {
                        $('.SerialNumber_show').removeClass("d-block");
                        $('#register_sell_save').removeClass("disabled");
                        $('#status').addClass("d-none");
                        $('#Brand').val(ret['data'].Brand);
                        $('#Dealer').val(ret['data'].Dealer);
                        $('#Model').val(ret['data'].Model);
                        $('#Product').val(ret['data'].Product);
                        $('#Warranty').val(ret['data'].Warranty);
                    } else {
                        console.log(22);
                        // ค่างว่างเมื่อไม่เจอ
                        $('#Brand').val('');
                        $('#Dealer').val('');
                        $('#Model').val('');
                        $('#Product').val('');
                        $('#Warranty').val('');
                        $('.status_rn').removeClass("d-none");
                        $('.SerialNumber_show').removeClass("d-block");
                    }
                },
            });
        } else {
            console.log(33);
            $('#Brand').val('');
            $('#Dealer').val('');
            $('#Model').val('');
            $('#Product').val('');
            $('#Warranty').val('');
            $('.SerialNumber_show').addClass("d-block");
            $('.status_rn').addClass("d-none");
            $('#register_sell_save').addClass("disabled");
        }
    });

    $("#register_sell").submit(function (event) {
        event.preventDefault();
        if ($('#Purchase_date').val() != "" && $('#Customer_name').val() != ""
            && $('#Tel').val() != "" && $('#Number').val() != ""
            && $('#province').val() != "" && $('#amphure').val() != ""
            && $('#district').val() != "" && $('#zipcode').val() != "") {
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
            };
            $.ajax({
                type: "POST",
                url: "data/register_sell/insert.php",
                data: formData,
                dataType: 'json',
                success: function (ret) {
                    if (ret['success']) {
                        $('#SerialNumber').val('');
                        $('#SerialNumber_Start').val('');
                        $('#SerialNumber_End').val('');
                        $('#Purchase_date').val('');
                        $('#Brand').val('');
                        $('#Product').val('');
                        $('#Model').val('');
                        $('#Dealer').val('');
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
                        $('.alert-success').addClass("show");
                        $('.alert-success').removeClass("hide");
                        $('.alert-success').addClass("showAlert");
                        $('#table-show-create').removeClass("d-none");
                        setTimeout(function () {
                            $('.alert-success').removeClass("show");
                            $('.alert-success').addClass("hide");
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
                    }  else if (ret['success'] == 'Sort') {
                        $('.alert5').addClass("show");
                        $('.alert5').removeClass("hide");
                        $('.alert5').addClass("showAlert");
                        setTimeout(function () {
                            $('.alert5').removeClass("show");
                            $('.alert5').addClass("hide");
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
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        } else {
            $('.alert4').addClass("show");
            $('.alert4').removeClass("hide");
            $('.alert4').addClass("showAlert");
            setTimeout(function () {
                $('.alert4').removeClass("show");
                $('.alert4').addClass("hide");
            }, 4000);
        }
    });
});

