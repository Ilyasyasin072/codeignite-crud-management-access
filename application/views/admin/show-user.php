        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <?= form_error(
            'menu',
            '<div class="alert alert-danger" role="alert"> wronge password',
            '</div>'
          ); ?>

          <?= $this->session->flashdata('massage') ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Status Active</th>
                          <th>Nama User</th>
                          <th>Role</th>
                          <th>Email</th>
                          <th>Actione</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $m) : ?>
                          <tr id="<?= $m['id']; ?>">
                            <td><?= $i; ?></td>
                            <?php if ($m['is_active'] == 1) : ?>
                              <td><a class="badge badge-info">
                                  <font color="white">Active</font>
                                </a></td>
                            <?php elseif ($m['is_active'] == 0) : ?>
                              <td><a class="badge badge-warning">
                                  <font color="white">Permission</font>
                                </a></td>
                            <?php else : ?>
                              <td><a class="badge badge-danger">
                                  <font color="white">Blocked</font>
                                </a></td>
                            <?php endif ?>
                            <td id="user"><?= $m['name']; ?></td>
                            <td><?= $m['role']; ?></td>
                            <td><?= $m['email']; ?></td>
                            <td>
                              <a href="#" class="badge badge-success"><i class="fas fa-edit"></i></a>
                              <a href="#" class="badge badge-danger remove-user"><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /.container-fluid -->
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

        <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

        <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />


        <script type="text/javascript">
          $(".remove-user").click(function() {

            var id = $(this).parents("tr").attr("id");
            var name = "<?= $m['name']; ?>";

            console.log(id);

            swal({

                title: "Are you sure?",

                text: "Are You Sure delete account " + name + " ?",

                type: "warning",

                showCancelButton: true,

                confirmButtonClass: "btn-danger",

                confirmButtonText: "Yes, delete it!",

                cancelButtonText: "No, cancel",

                closeOnConfirm: false,

                closeOnCancel: false

              },

              function(isConfirm) {
                if (isConfirm) {
                  $.ajax({
                    url: "<?= base_url('admin/delete/'); ?>" + id,
                    type: 'DELETE',
                    error: function() {
                      alert('Something is wrong');
                    },
                    success: function(data) {
                      $("#" + id).remove();
                      swal("Deleted!", "Your " + nama + " file has been deleted.", "success");
                    }
                  });
                } else {
                  swal("Cancelled", "Your Account is safe :)", "error");
                }
              });
          });
        </script>