$(document).ready(function () {
     $('#add').click(function () {
          $('#insert').val("Insert");
          $('#insert_form')[0].reset();
     });
     $(document).on('click', '.edit_data', function () {
          var employee_id = $(this).attr("id");
          $.ajax({
               url: "data/buy/fetch.php",
               method: "POST",
               data: { employee_id: employee_id },
               dataType: "json",
               success: function (data) {
                    var currentTime = new Date(data.Purchase_date);
                    var day = currentTime.getDate();
                    var month = currentTime.getMonth() + 1;
                    var year = currentTime.getFullYear();

                    if (day < 10) {
                         day = "0" + day;
                    }

                    if (month < 10) {
                         month = "0" + month;
                    }
                    year = year + 543;

                    var today_date = day + "/" + month + "/" + year;
                    $('#Purchase_date').val(today_date);
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
               url: "data/buy/insert.php",
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

     $(document).on('click', '.view_data', function () {
          var employee_id = $(this).attr("id");
          if (employee_id != '') {
               $.ajax({
                    url: "data/buy/select.php",
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

     $('.delete_checkbox').click(function () {
          if ($(this).is(':checked')) {
               $(this).closest('tr').addClass('removeRow');
          } else {
               $(this).closest('tr').removeClass('removeRow');
          }
     });

     $('#delete_all').click(function () {
          var checkbox = $('.delete_checkbox:checked');
          if (checkbox.length > 0) {
               var checkbox_value = [];
               $(checkbox).each(function () {
                    checkbox_value.push($(this).val());
               });

               $.ajax({
                    url: "data/buy/delete.php",
                    method: "POST",
                    data: {
                         checkbox_value: checkbox_value
                    },
                    success: function () {
                         $('.removeRow').fadeOut(1500);
                    }
               });
          } else {
               alert("เลือกอย่างน้อย 1 รายการเพื่อลบ");
          }
     });
});