$(document).ready(function () {
    $("#search_SerialNumber").keyup(function () {
        var text = $('#search_SerialNumber').val();
        if (text == "") {
            $("#display").html("");
        } else {
            if (text.length == 17) {
                $.ajax({
                    type: "POST",
                    url: "data/check/check.php",
                    data: {
                        search: text
                    },
                    success: function (response) {
                        $("#display").html(response);
                    },
                    error: function () {
                        $("#display").html("เกิดข้อผิดพลาดการค้นหา");
                    }
                });
            } else {
                $('#search_form').addClass(" was-validated");
            }
        }
    });
});