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
            <?= $this->session->flashdata('flash'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </br>
                            <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#tambahMenu">Add New Menu</a></br>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tb_menu as $m) : ?>
                                            <tr id="<?= $m['id']; ?>">
                                                <td><?= $i; ?></td>
                                                <td><?= $m['nama_menu']; ?></td>
                                                <td>
                                                    <input type="hidden" name="id" value="<?= $m['id']; ?>">
                                                    <a href="<?= base_url(); ?>menu/ubahMenu/<?= $m['id']; ?>" class=" badge badge-success"><i class="fas fa-edit"></i></a>
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
        <div class="modal fade" id="tambahMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Management</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Add New Menu</label>
                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Name Menu">
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


        <!-- Button trigger modal -->
        <!-- Modal -->
        <?php foreach ($tb_menu as $i) :
            $id = $i['id'];
            $nama_menu = $i['nama_menu'];
        ?>
            <div class="modal fade" id="editMenu<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Management</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . 'menu/ubahMenu/' . $id ?>" method="get">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Add New Menu</label>
                                    <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="<?= $nama_menu; ?>">
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
        <?php endforeach; ?>
        <!-- End of Main Content -->