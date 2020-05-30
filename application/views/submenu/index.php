        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert"> wronge password',
                '</div>'
            ); ?>

            <?= $this->session->flashdata('massage') ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </br>
                            <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#tambahSubMenu">Add Sub New Menu</a></br>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Menu Id</th>
                                            <th>Url</th>
                                            <th>Icon</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tb_sub_menu as $sm) : ?>
                                            <tr id="<?= $sm['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td><?= $sm['title']; ?></td>
                                                <td><?= $sm['nama_menu']; ?></td>
                                                <td><?= $sm['url']; ?></td>
                                                <td><?= $sm['icon']; ?></td>
                                                <?php if ($sm['is_active'] == 1) : ?>
                                                    <td><a class="badge badge-info">
                                                            <font color="white">Active</font>
                                                        </a></td>
                                                <?php elseif ($sm['is_active'] == 0) : ?>
                                                    <td><a class="badge badge-warning">
                                                            <font color="white">Permission</font>
                                                        </a></td>
                                                <?php else : ?>
                                                    <td><a class="badge badge-danger">
                                                            <font color="white">Blocked</font>
                                                        </a></td>
                                                <?php endif ?>
                                                <td>
                                                    <a href="#" class="badge badge-success"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="badge badge-danger remove-menu"><i class="fas fa-trash"></i></a>
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

        <!-- Button trigger modal -->
        <!-- Modal -->
        <!-- <div class="modal fade" id="tambahSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Management</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
            </div>
        </div> -->

        <div class="modal fade" id="tambahSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('menu/submenu'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Add Name Menu</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Name title">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Add New Menu</label>
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <?php foreach ($tb_menu as $m) : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['nama_menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Add New Menu</label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Name Menu">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Add New Menu</label>
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Name Menu">
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                                        <label class="form-check-label" for="is_active">Active ?</label>
                                    </div>
                                </div>
                            </div>
                            <div class=" modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->


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
            $(".remove-menu").click(function() {

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

                                url: "<?= base_url('menu/delete/'); ?>" + id,

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