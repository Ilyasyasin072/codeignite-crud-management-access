  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
           <div class="col-md-8">
            <div id="notif"></div>
            </div>
          <form method="post" action="<?= base_url('user/postuser');?>"  id="simpanData" >
            <table class="table table-bordered" id="tableloop">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Last</th>
                  <th scope="col">
                    <button class="btn btn-primary" id="_button">
                      <li class="fa fa-plus"></li>
                    </button>
                  </th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
            <div class="col-md-11">
              <div class="box-footer text-right">
                <div class="form-group">
                  <button class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>editable/js/bootstrap-editable.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
  <script type="text/javascript">
  $(document).ready(function(){
      for (var B=1; B<=1; B++) {
          newLine();
                          $('select').select2({ width: '100%' });
      }
      $('#_button').click(function(e){
          e.preventDefault();
          newLine();
          });
      $('#tableloop tbody').find('input[type=text]').filter(':visible:first').focus();
  });
  function newLine()
  {
  $(document).ready(function(){
      // $("data-toggle='tooltips'").tooltips();
  });
      var no = $("#tableloop tbody tr").length +1;
      var baris = '<tr>';
      baris += '<td class="text-center">'+no+'</td>';
      baris += '<td>';
      baris += '<input type="textarea" class="form-control post" name="post[]" placeholder="POST" required/>';
      baris += '</td>';
      baris += '<td>';
      baris += '<input type="text" class="form-control desc" name="desc[]" placeholder="DESC" required/>';
      baris += '</td>';
  
      baris += '<td>';
      baris += '<div class="selector desc2"><select name="desc2[]" required><option>Name</option><option>Father Name</option><option>Mother Name</option>    </select><div class="another"></div></div>';                
      baris += '</td>'; 
      baris += '<td>';
      baris += '<button class="btn btn-danger" id="_delete">remove</button>';
      baris += '</td>';               
      baris += '</tr>';
  
      $("#tableloop tbody").append(baris);
      $("#tableloop tbody").each(function() {
          $(this).find('td:nth-child(2) input').focus();
      });
  
      $('select').select2({ width: '100%' });
  
  
      $('#copy').click(function(){
          $('select').select2('destroy');
          var selectorParant = $('.selector').html();
          $('.another').append(selectorParant);
          $('select').select2({ width: '100%' });
      });
  
      $(document).on('click', '#_delete', function(e){
          e.preventDefault();
          var no = 1;
          $(this).parent().parent().remove();
          $('tableloop tbody').each(function(){
              $(this).find('td:nth-child(1)').html(no);
              no++;
          });
      });
  }
  
  $(document).ready(function(){
      $('#simpanData').submit(function(e){
          e.preventDefault();
          biodata();
      });
  });
  
  function biodata()
  {
      $.ajax({
          url: $('#simpanData').attr('action'),
          type: 'post',
          cache: false,
          dataType: 'json',
          data : $('#simpanData').serialize(),
          success: function(data)
          {
              if(data.success == true)
              {
                  $('.post').val('');
                  $('.desc').val('');
                  $('#notif').fadeIn(800, function(){
                      //$('#notif').html(data.notif).fadeOut(5000).delay(800);
                      swal("Success!", "Your data file has been safe.", "success");
                  });
              } else {
                  $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan !!</div>');
              }
          },
          error: function(error)
          {
             swal("Cancelled", "Data Cannot be safe", "error");
          }
      })
  }
</script>