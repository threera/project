$(document).ready(function () {
    $("#claim_form").submit(function (event) {
        event.preventDefault();
        if ($('#SerialNumber').val() != "" && $('#Fullname').val() != "" && $('#Mobile').val() != "") {
            var formData = {
                SerialNumber: $('#SerialNumber').val(),
                Fullname: $('#Fullname').val(),
                Email: $('#Email').val(),
                Mobile: $('#Mobile').val(),
                Cause: $('#Cause').val()
            };
            $.ajax({
                type: "POST",
                url: "data/claim/insert.php",
                data: formData,
                dataType: 'json',
                success: function (ret) {
                    if (ret['success']) {
                        $('.alert-success').addClass("show");
                        $('.alert-success').removeClass("hide");
                        $('.alert-success').addClass("showAlert");
                        //$('input[type="text"],textarea').val('');
                        setTimeout(function () {
                            $('.alert-success').removeClass("show");
                            $('.alert-success').addClass("hide");
                        }, 5000);
                    } else {
                        $('.alert-danger').addClass("show");
                        $('.alert-danger').removeClass("hide");
                        $('.alert-danger').addClass("showAlert");
                        setTimeout(function () {
                            $('.alert-danger').removeClass("show");
                            $('.alert-danger').addClass("hide");
                        }, 4000);
                    }
                }
            });
        }
    });
});