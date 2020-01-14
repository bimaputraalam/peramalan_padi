

</div> <!-- End wrapper -->


<!-- jQuery  -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/waves.js"></script>
<script src="../assets/js/jquery.nicescroll.js"></script>
<script src="../plugins/switchery/switchery.min.js"></script>


<!-- tabel database -->
 <!-- Required datatable js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/jszip.min.js"></script>
    <script src="../plugins/datatables/pdfmake.min.js"></script>
    <script src="../plugins/datatables/vfs_fonts.js"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"></script>
    <script src="../plugins/datatables/buttons.print.min.js"></script>

    <!-- Key Tables -->
    <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>

    <!-- Responsive examples -->
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Selection table -->
    <script src="../plugins/datatables/dataTables.select.min.js"></script>

<!-- end tabel database -->








<!--Morris Chart-->
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>

<!-- Counter Up  -->
<script src="../plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="../plugins/counterup/jquery.counterup.js"></script>

<!-- Page specific js -->
<script src="../assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="../assets/js/jquery.core.js"></script>
<script src="../assets/js/jquery.app.js"></script>




<script>
    $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();
                $('#datatable1').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>


        <script>
            


        </script>


    </body>
    </html>