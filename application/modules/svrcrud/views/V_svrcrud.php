<body>
<button id="btn_tambah"><i class="fa fa-plus"> tambah</i></button>
<div id="data_tampil">
  <table class="table table-striped" id="tb_svr">
    <thead>
      <th class="text-center">no</th>
      <th class="text-center">id Bku</th>
      <th class="text-center">nama Buku</th>  
      <th class="text-center">pengarang</th>
      <th class="text-center">tahun terbit</th>
      <th class="text-center">kota terbit</th>
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
                "url": "<?php echo site_url('Svrcrud/get_data_user')?>",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
 
    });

</script>
</body>