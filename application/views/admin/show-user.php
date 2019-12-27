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
                            <a href="" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#tambahMenu">Add New Menu</a></br>
                        </div>
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
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <?php if($m['is_active'] == 1) : ?>
                                                <td><a class="badge badge-info"> <font color="white">Active</font></a></td>
                                                <?php else : ?>
                                               <td><a class="badge badge-info"> <font color="white">Not Active</font></a></td>
                                                <?php endif ?>
                                                <td><?= $m['name']; ?></td>
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
        <!-- /.container-fluid -->