<table class="table table-striped" id="tb_test">
    <thead>
      <th>no</th>
      <th>id Bku</th>
      <th>nama Buku</th>  
      <th>pengarang</th>
      <th>tahun terbit</th>
      <th>kota terbit</th>
      <th class="text-center">action</th>
    </thead>
    <tbody>
       <?php 
        $no = 1;
        foreach ($buku as $buku) {   ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $buku->id_buku ?></td>
            <td><?php echo $buku->nm_buku ?></td>
            <td><?php echo $buku->pengarang ?></td>
            <td><?php echo $buku->kota ?></td>
            <td><?php echo $buku->tahun ?></td>
            <td class="text-center">
              <span class="fa fa-pencil text-success mr-4">edit</span>
              <span class="fa fa-trash text-danger">hapus</span>
            </td>
          </tr>
      <?php } ?>
    </tbody>
  </table>