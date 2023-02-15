// จังหวัด อำเภอ ตำบล
$(function () {
  var provinceObject = $('#province');
  var amphureObject = $('#amphure');
  var districtObject = $('#district');
  var zipcodeObject = $('#zipcode');
  // on change province
  provinceObject.on('change', function () {
    var provinceId = $(this).val();
    amphureObject.html('<option value="">เลือกอำเภอ</option>');
    districtObject.html('<option value="">เลือกตำบล</option>');
    zipcodeObject.html('input');
    $.get('components/form/get_amphure/get_amphure.php?province_id=' + provinceId, function (data) {
      var result = JSON.parse(data);
      $.each(result, function (index, item) {
        amphureObject.append(
          $('<option></option>').val(item.name_th).html(item.name_th)
        );
      });
    });
  });
  // on change amphure
  amphureObject.on('change', function () {
    var amphureId = $(this).val();
    districtObject.html('<option value="">เลือกตำบล</option>');
    $.get('components/form/get_amphure/get_district.php?amphure_id=' + amphureId, function (data) {
      var result = JSON.parse(data);
      $.each(result, function (index, item) {
        districtObject.append(
          $('<option></option>').val(item.name_th).html(item.name_th)
        );
      });
    });
  });

    // on change amphure
    districtObject.on('change', function () {
      var zipcodeId = $(this).val();
      zipcodeObject.html('input');
      $.get('components/form/get_amphure/zipcode.php?id=' + zipcodeId, function (data) {
        var result = JSON.parse(data);
        $.each(result, function (index, item) {
          zipcodeObject.append(
            $('#zipcode').val(item.zip_code).html(item.zip_code)
          );
        });

        
      });
    });
})