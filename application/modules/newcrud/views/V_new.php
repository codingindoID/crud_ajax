<body>
<button id="btn_tambah" onclick="add();" data-toggle="modal" data-target="#modal" type="button" class="btn btn-sm btn-success mb-3"><i class="fa fa-plus"> tambah</i></button>
<div id="data_tampil">
  <table class="table table-striped" id="tb_test">
    <thead>
      <th class="text-center">no</th>
      <th class="text-center">id Bku</th>
      <th class="text-center">nama Buku</th>  
      <th class="text-center">pengarang</th>
      <th class="text-center">tahun terbit</th>
      <th class="text-center">kota terbit</th>
      <th class="text-center">action</th>
    </thead>
    <tbody>
       <?php 
        $no = 1;
        foreach ($buku as $buku) {   ?>
          <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $buku->id_buku ?></td>
            <td class="text-center"><?php echo $buku->nm_buku ?></td>
            <td class="text-center"><?php echo $buku->pengarang ?></td>
            <td class="text-center"><?php echo $buku->kota ?></td>
            <td class="text-center"><?php echo $buku->tahun ?></td>
            <td class="text-center">
              <span data-toggle="modal" data-target="#modal" onclick="edit('<?php echo $buku->id_buku ?>')" id="edit_data" class="fa fa-pencil text-success mr-4" style="cursor: pointer;">edit</span>
              <span onclick="hapus('<?php echo $buku->id_buku ?>')" class="fa fa-trash text-danger" style="cursor: pointer;">hapus</span>
            </td>
          </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- modal edit -->
<div id="modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <div id="titleform" class="modal-title"><H4>tambah data</H4></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="form">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_buku" name="id_buku" hidden="TRUE">
            </div>
          </div>
          <div class="form-group row">
            <label for="nm_buku" class="col-sm-3 col-form-label">Judul Buku</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nm_buku" name="nm_buku" placeholder="Judul Buku" required="">
            </div>
          </div>
          <div class="form-group row">
            <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang" required="">
            </div>
          </div>
          <div class="form-group row">
            <label for="kota" class="col-sm-3 col-form-label">Kota Terbit</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota Terbit" required="">
            </div>
          </div>
          <div class="form-group row">
            <label for="tahun" class="col-sm-3 col-form-label">Tahun Terbit</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun Terbit" required="" >
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button id="bt_cancel" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button id="bt_simpan" onclick="save();" type="button" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal coba -->

</body>


<!-- script -->
<script type="text/javascript">
  var save_method;

  function add(){
    save_method = 'add';
  }

  function save(){
    var url;
    if(save_method=='add'){
      url = "<?php echo base_url()."Newcrud/aksi_tambah" ?>";
    }else{
      url = "<?php echo base_url()."Newcrud/aksi_update" ?>";
    }
      $.ajax({
        type: 'POST',
        url: url,
        data: $('#form').serialize(),
        success: function() {      
          location.reload();
          $('#modal').close();
        }, 
        error : function(jqXHR,textStatus, errorThrown){
          alert('eror');
        }
      });
  }

  function hapus(id) {
      var data = {'id': id};
      if (confirm("Data yang terhapus tidak dapat dikembalikan,\nApakah anda yakin?")) {
       $.ajax({
          type: 'POST',
          url: "<?php echo base_url()."Newcrud/aksi_hapus" ?>",
          data: data,
          success: function() {
            
            location.reload();
          }
        });
      } else {
        //alert('Batal menghapus');
      }
      
  }

  function edit(id){
      save_method = 'update';
      $('#form')[0].reset();
       $.ajax({
        url : "<?php echo base_url()."Newcrud/edit/" ?>"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(tes)
        { 
            $('[name="id_buku"]').val(tes.id_buku);
            $('[name="nm_buku"]').val(tes.nm_buku);
            $('[name="pengarang"]').val(tes.pengarang);
            $('[name="kota"]').val(tes.kota);
            $('[name="tahun"]').val(tes.tahun);

            $(".modal-title").html('<h4>Edit Data Buku</h4>');
            $('#bt_simpan').html('Update Data');
            $('#bt_simpan').attr('class','btn btn-primary');
          },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
  }

  $(document).ready(function() {
    $('#tb_test').DataTable();
} );
</script>