 <div class="container-fluid">
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

                 <div class="col-md-8">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="card shadow mb-4">
                                 <div class="card-body">
                                     <div class="row no-gutters">
                                         <div class="col-md-4">
                                             <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="card-img" alt="...">
                                         </div>
                                         <div class="col-md-8">
                                             <div class="card-body">
                                                 <div class="card-body text-success">
                                                     <h5 class="card-title">
                                                         <h1><?= $tb_user['email']; ?></h1>
                                                     </h5>
                                                     <p class="card-text"><?= $tb_user['name']; ?></p>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card-deck">
                         <div class="card">
                             <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="card-img" alt="...">
                             <div class="card-body">
                                 <h5 class="card-title">Card title</h5>
                                 <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                 <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                             </div>
                         </div>
                         <div class="card">
                             <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="card-img" alt="...">
                             <div class="card-body">
                                 <h5 class="card-title">Card title</h5>
                                 <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                 <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                             </div>
                         </div>
                         <div class="card">
                             <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="card-img" alt="...">
                             <div class="card-body">
                                 <h5 class="card-title">Card title</h5>
                                 <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                 <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card border-success mb-3" style="max-width: 20rem;">
                     <div class="card-header bg-transparent border-success">Header</div>
                     <div class="card-body text-success">
                         <h5 class="card-title">Success card title</h5>
                         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     </div>
                     <div class="card-footer bg-transparent border-success">Footer</div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 </div>