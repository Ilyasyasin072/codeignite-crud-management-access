<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('flash'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('menu/ubahMenu/'); ?>

            <div class="card text-center">
                <div class="card-header">
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Email User" value="<?= $menu['nama_menu']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Profile
                </div>
            </div>
        </div>
    </div>
</div>
</div>