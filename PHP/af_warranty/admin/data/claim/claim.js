$(document).ready(function () {
     $('#add').click(function () {
          $('#insert').val("Insert");
          $('#insert_form')[0].reset();
     });
     $('#insert_form').on("submit", function (event) {
          event.preventDefault();
          $.ajax({
               url: "data/claim/insert.php",
               method: "POST",
               data: $('#insert_form').serialize(),
               beforeSend: function () {
                    $('#insert').val("Inserting");
               },
               success: function (data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
               }
          });
     });


     $(document).on('click', '.delete_data', function () {
          var employee_id = $(this).attr("id");
          if (employee_id != '') {
               $.ajax({
                    url: "data/claim/delete.php",
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