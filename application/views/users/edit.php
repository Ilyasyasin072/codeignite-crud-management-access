<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('user/edit');?>

                <div class="card text-center">
                    <div class="card-header">
                        <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email User" value="<?= $tb_user['email'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= $tb_user['name'];?>">
                                <?= form_error('name','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">Picture</div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/') . $tb_user['image']?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
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

 <script type="text/javascript">
          $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
          });
        </script>