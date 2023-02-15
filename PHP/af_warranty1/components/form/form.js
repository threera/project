
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')
// Loop over them and prevent submission
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })

function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("SerialNumberALL");
  var text1 = document.getElementById("SerialNumberRemove");
  if (checkBox.checked == true) {
    text.style.display = "block";
    text1.style.display = "none";
  } else {
    text.style.display = "none";
    text1.style.display = "block";
  }
}



