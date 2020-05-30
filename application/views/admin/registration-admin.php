

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <?= $this->session->flashdata('massage'); ?>
                  <h1 class="h4 text-gray-900 mb-4">
                  Register Account Admin
                </div>
                <form class="user" method="post" action="<?= base_url('admin/registrationAdmin'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                    <?= form_error(
                      'name',
                      '<small class="text-danger pl-3">',
                      '</small>'
                      ) ?>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                      <?= form_error(
                        'password1',
                        '<small class="text-danger pl-3">',
                        '</small>'
                        
                        ) ?>
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
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
                          </a>
                        </td>
                        <?php elseif ($m['is_active'] == 0) : ?>
                        <td><a class="badge badge-warning">
                          <font color="white">Permission</font>
                          </a>
                        </td>
                        <?php else : ?>
                        <td><a class="badge badge-danger">
                          <font color="white">Blocked</font>
                          </a>
                        </td>
                        <?php endif ?>
                        <td><?= $m['name']; ?></td>
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
    </div>
  </div>
</div>
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
  
      console.log(id);
  
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
  
                      url: "<?= base_url('admin/delete/'); ?>" + id,
  
                      type: 'DELETE',
  
                      error: function() {
  
                          alert('Something is wrong');
  
                      },
  
                      success: function(data) {
  
                          $("#" + id).remove();
  
                          swal("Success!", "Your imaginary file has been deleted.", "success");
  
                      }
  
                  });
  
              } else {
  
                  swal("Cancelled", "Your imaginary file is safe :)", "error");
  
              }
  
          });
  
  
  
  });
</script>

