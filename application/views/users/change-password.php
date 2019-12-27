        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?= $this->session->flashdata('massage');?>
            <div class="row">
             <div class="col-lg-6">
          <form action="<?= base_url('user/changepassword')?>" method="post">

                <div class="card text-center">
                    <div class="card-header">
                        <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password">
                                <?= form_error('current_password','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New Passowrd">
                                <?= form_error('new_password1','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="_new_password2" name="new_password2" placeholder="Repeat Password">
                                <?= form_error('new_password2','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group row justify-content-end">
                                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Changes Password User
                    </div>
                </div>
        </div>
    </div>
        </div>
        </div>
