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
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $sm['title']; ?></td>
                                                <td><?= $sm['nama_menu']; ?></td>
                                                <td><?= $sm['url']; ?></td>
                                                <td><?= $sm['icon']; ?></td>
                                                <td><?= $sm['is_active']; ?></td>
                                                <td>
                                                    <a href="#" class="badge badge-success">Edit</a>
                                                    <a href="#" class="badge badge-danger">Delete</a>
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
        <div class="modal fade" id="tambahSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Management</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
        <!-- End of Main Content -->