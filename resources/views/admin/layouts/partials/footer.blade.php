<footer class="footer">
    <span class="text-right">                
        Copyright <a target="_blank" href="#">By MMC</a>
    </span>
    <span class="float-right">
        <!-- Copyright footer link MUST remain intact if you download free version. -->
        <!-- You can delete the links only if you purchased the pro or extended version. -->
        <!-- Purchase the pro or extended version with PHP version of this template: https://bootstrap24.com/template/nura-admin-4-free-bootstrap-admin-template -->
        Powered by <a target="_blank" href="#" title="Download free Bootstrap templates"><b>Ömer Uzer</b></a>
    </span>
</footer>

<script src="/assets/js/modernizr.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/moment.min.js"></script>

<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<script src="/assets/js/detect.js"></script>
<script src="/assets/js/fastclick.js"></script>
<script src="/assets/js/jquery.blockUI.js"></script>
<script src="/assets/js/jquery.nicescroll.js"></script>

<script src="\assets\plugins\sweetalert\sweetalert.min.js"></script>

<!-- App js -->
<script src="/assets/js/admin.js"></script>

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->

<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<script src="/assets/plugins/datatables/datatables.min.js"></script>

<!-- Counter-Up-->
<script src="/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="/assets/plugins/counterup/jquery.counterup.min.js"></script>

<!-- dataTabled data -->
<script src="/assets/data/data_datatables.js"></script>

<!-- Charts data -->
<script src="/assets/data/data_charts_dashboard.js"></script>
<script>
$(document).on('ready', function() {
    // data-tables
    $('#dataTable').DataTable({
        data: dataSet,
        columns: [{
            title: "Name"
        }, {
            title: "Position"
        }, {
            title: "Office"
        }, {
            title: "Extn."
        }, {
            title: "Date"
        }, {
            title: "Salary"
        }]
    });

    // counter-up
    $('.counter').counterUp({
        delay: 10,
        time: 600
    });
});
</script>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>

<!-- END Java Script for this page -->

</body>

</html>