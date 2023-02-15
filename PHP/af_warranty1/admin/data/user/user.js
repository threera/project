$(document).ready(function () {
    $(document).on('click', '.delete_data', function () {
         var employee_id = $(this).attr("id");
         if (employee_id != '') {
              $.ajax({
                   url: "data/user/delete.php",
                   method: "POST",
                   data: {
                        employee_id: employee_id
                   },
                   success: function (data) {
                        $('.alert-delete').addClass("show");
                        $('.alert-delete').removeClass("hide");
                        $('.alert-delete').addClass("showAlert");
                        setTimeout(function () {
                            $('.alert-delete').removeClass("show");
                            $('.alert-delete').addClass("hide");
                            window.location.reload();
                        }, 2000);
                   }
              });
         }
    });
});