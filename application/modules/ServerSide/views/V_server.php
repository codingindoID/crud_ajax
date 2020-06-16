<div id="accordion">
  <div class="card" style="margin-bottom: 15px;">
    <!-- header -->
    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">
      <h5 class="mb-0">
        Pilih SKPD
      </h5>
    </div>
    <!-- end header -->
    <!-- Body -->
     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <!-- Content Here -->
        <select class="custom-select" id="selectOPD" onchange="selectOPD()">
          <option selected>Open this select menu</option>
            <?php foreach ($OPD as $data) { ?>
              <option value="<?php echo $data->id_opd ?>"><?php echo $data->singkatan_opd ?></option>
            <?php } ?>
        </select>
      </div>
    </div>
    <!-- end body -->
  </div>
</div>


<div id="data_tampil">
  <table class="table table-striped" id="tb_svr">
    <thead>
      <th class="text-center">no</th>
      <th class="text-center">tgl input</th>
      <th class="text-center">JT</th>  
      <th class="text-center">no Pol</th>
      <th class="text-center">Jenis kendaraan</th>
      <th class="text-center">tipe</th>
      <th class="text-center">OPD</th>
      <th class="text-center">Action</th>
    </thead>
    
    <tbody>
    </tbody>
  </table>
</div>


<script type="text/javascript">
	


  var table;
    $(document).ready(function() {
 
        //datatables
        table = $('#tb_svr').DataTable({ 
 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('ServerSide/get_data_user')?>",
                "type": "POST"
            },
 
             
             //properti untuk kolom tertentu 
            "columnDefs": [
            {"className": "dt-center", "targets": "_all"},
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            { 
                "targets": [ 7 ], 
                "orderable": false, 
            }
            ],
 
        });
    });//end datatable

    function selectOPD()
    {
      var a = $("#selectOPD option:selected").attr("value");
      alert(a);

      
    }

    function edit(id)
    {
      alert("ini adalah function edit dengan id : "+id);
    }

    function view(id)
    {
      alert("ini adalah function view dengan id : "+id);
    }

    function hapus(id){

      alert("ini adalah function hapus dengan id : "+id);
    }
</script>
