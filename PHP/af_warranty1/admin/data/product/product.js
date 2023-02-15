$(document).ready(function () {
     $('#add').click(function () {
          $('#insert').val("Insert");
          $('#insert_form')[0].reset();
     });
     $(document).on('click', '.edit_data', function () {
          var employee_id = $(this).attr("id");
          $.ajax({
               url: "data/product/fetch.php",
               method: "POST",
               data: { employee_id: employee_id },
               dataType: "json",
               success: function (data) {
                    $('#Purchase_date').val(data.Purchase_date);
                    $('#Brand').val(data.Brand);
                    $('#Product').val(data.Product);
                    $('#Model').val(data.Model);
                    $('#SerialNumber').val(data.SerialNumber);
                    $('#Warranty').val(data.Warranty);
                    $('#Dealer').val(data.Dealer);
                    $('#Customer_name').val(data.Customer_name);
                    $('#Email').val(data.Email);
                    $('#Tel').val(data.Tel);
                    $('#Number').val(data.Number);
                    $('#Village').val(data.Village);
                    $('#Soi').val(data.Soi);
                    $('#Road').val(data.Road);
                    $('#province').val(data.province);
                    $('#amphure').val(data.amphure);
                    $('#district').val(data.district);
                    $('#zipcode').val(data.zipcode);
                    $('#Comment').val(data.Comment);
                    $('#employee_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
               }
          });
     });
     $('#insert_form').on("submit", function (event) {
          event.preventDefault();
          $.ajax({
               url: "data/product/insert.php",
               method: "POST",
               data: $('#insert_form').serialize(),
               beforeSend: function () {
                    $('#insert').val("Inserting");
               },
               success: function (data) {
                    $('.success_edit').addClass("show");
                    $('.success_edit').removeClass("hide");
                    $('.success_edit').addClass("showAlert");
                    setTimeout(function () {
                         $('.success_edit').removeClass("show");
                         $('.success_edit').addClass("hide");
                    }, 3000);
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
               }
          });
     });

     $(document).on('click', '.view_data', function () {
          var employee_id = $(this).attr("id");
          if (employee_id != '') {
               $.ajax({
                    url: "data/product/select.php",
                    method: "POST",
                    data: {
                         employee_id: employee_id
                    },
                    success: function (data) {
                         $('#employee_detail').html(data);
                         $('#dataModal').modal('show');
                    }
               });
          }
     });


     $(document).on('click', '.delete_data', function () {
          var employee_id = $(this).attr("id");
          if (employee_id != '') {
               $.ajax({
                    url: "data/product/delete.php",
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