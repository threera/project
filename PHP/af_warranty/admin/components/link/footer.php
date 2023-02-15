    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

    <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>



    <!-- End of Main Content -->
    <?php include 'components/alerts/create_product.php'; ?>

    <script>
        jQuery(function($) {
            $('#navigation ul li a').filter(function() {
                var locationUrl = window.location.href;
                var currentItemUrl = $(this).prop('href');

                return currentItemUrl === locationUrl;
            }).parent('li').addClass('active');
        });

        $.Thailand({
            $district: $("#district"), // input ของตำบล
            $amphoe: $("#amphure"), // input ของอำเภอ
            $province: $("#province"), // input ของจังหวัด
            $zipcode: $("#zipcode") // input ของรหัสไปรษณีย์
        });
    </script>
    <script>
        picker_date(document.getElementById("Purchase_date"), {
            year_range: "-12:+10"
        });
    </script>