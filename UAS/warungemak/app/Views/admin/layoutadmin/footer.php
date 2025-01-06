 <!-- FOOTER ADMIN -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->

 <!-- Main Footer -->
 <footer class="main-footer">
     <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
     Edited By RickyFardianto.
     <div class="float-right d-none d-sm-inline-block">
         <b>Admin Warung Emak v1.0</b>
     </div>
 </footer>
 </div>
 <!-- ./wrapper -->



 <!-- REQUIRED SCRIPTS -->
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>



 <!-- Bootstrap -->
 <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
 <!-- overlayScrollbars -->
 <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('dist/js/adminlte.js'); ?>"></script>

 <!-- PAGE PLUGINS -->
 <!-- jQuery Mapael -->
 <script src="<?= base_url('plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
 <script src="<?= base_url('plugins/raphael/raphael.min.js'); ?>"></script>
 <script src="<?= base_url('plugins/jquery-mapael/jquery.mapael.min.js'); ?>"></script>
 <script src="<?= base_url('plugins/jquery-mapael/maps/usa_states.min.js'); ?>"></script>
 <!-- ChartJS -->
 <script src="<?= base_url('plugins/chart.js/Chart.min.js'); ?>"></script>


 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url('dist/js/demo.js'); ?>"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?= base_url('dist/js/pages/dashboard2.js'); ?>"></script>

 <!-- Inisialisasi Data Tabel -->
 <script>
     $(document).ready(function() {
         $('#menu-table').DataTable();
     });

     $(document).ready(function() {
         // Menghapus pesan setelah 3 detik
         setTimeout(function() {
             $('#flash-success').fadeOut('slow');
             $('#flash-error').fadeOut('slow');
         }, 3000); // 3000ms = 3 detik
     });
 </script>
 <!-- Inisialisasi Data Tabel END -->

 </body>

 </html>

 <!-- FOOTER ADMIN END -->