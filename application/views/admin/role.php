        <!-- Begin Page Content -->
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
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </br>
                            <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#newRoleMenu">Add New Menu</a></br>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Actione</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tb_user_role as $r) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $r['role']; ?></td>
                                                <td>

                                                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-info">Access</a>
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

        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="newRoleMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Management</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/role'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Add New Menu</label>
                                <input type="text" class="form-control" id="role" name="role" placeholder="Name Menu">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->