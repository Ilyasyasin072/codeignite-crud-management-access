  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2019</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->
  </div>
  </div> <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script src="<?= base_url('assets/'); ?>editable/js/bootstrap-editable.min.js"></script>
<!-- Page level custom scripts -->
  <script type="text/javascript">
    $('.form-check-input').on('click', function() {

      console.log('a');

      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
        url: "<?= base_url('admin/changeaccess'); ?>",
        type: "post",
        data: {
          menuId: menuId,
          roleId: roleId
        },
        success: function() {
          document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
        }
      })
    });
  </script>

  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
  <script type="text/javascript">
    $(".remove-user").click(function() {

      var id = $(this).parents("tr").attr("id");



      swal({

          title: "Are you sure?",

          text: "You will not be able to recover this imaginary file!",

          type: "warning",

          showCancelButton: true,

          confirmButtonClass: "btn-danger",

          confirmButtonText: "Yes, delete it!",

          cancelButtonText: "No, cancel plx!",

          closeOnConfirm: false,

          closeOnCancel: false

        },

        function(isConfirm) {

          if (isConfirm) {

            $.ajax({

              url: 'admin/delete/' + id,

              type: 'DELETE',

              error: function() {

                alert('Something is wrong');

              },

              success: function(data) {

                $("#" + id).remove();

                swal("Deleted!", "Your imaginary file has been deleted.", "success");

              }

            });

          } else {

            swal("Cancelled", "Your imaginary file is safe :)", "error");

          }

        });
    });
  </script>
  </body>

  </html>