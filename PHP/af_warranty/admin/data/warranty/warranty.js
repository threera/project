$(function () {
    $("select#status_level").on("change", function () {
        $.post("data/warranty/update.php", {
            status_level: $(this).val(),
            employee_id: $("#employee_id").val()
        }, function (data) {
            $('.alert-lavel').addClass("show");
            $('.alert-lavel').removeClass("hide");
            $('.alert-lavel').addClass("showAlert");
            setTimeout(function () {
                $('.alert-lavel').removeClass("show");
                $('.alert-lavel').addClass("hide");
                window.location.reload();
            }, 2000);
        });
    });
});