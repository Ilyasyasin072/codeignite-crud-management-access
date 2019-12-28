        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= $this->session->flashdata('massage');?>

            <div class="card mb-3" style="max-width: 540px;">
            <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register Account Admin
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
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->