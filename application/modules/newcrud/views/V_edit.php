<form id="form_edit">
            <div class="modal-body">
                <table>
                  <?php foreach ($tes as $tes) { ?>
                  <tbody>
                    <tr>
                      <td><input type="text" name="id" hidden="true" value=""></td> 
                    </tr>
                    <tr>
                      <td><input type="text" name="nama" placeholder="nama" value="<?php echo $tes->nm_buku ?>"></td> 
                    </tr>
                    <tr>
                      <td><input type="text" name="pengarang" placeholder="pengarang" value="<?php echo $tes->pengarang ?>"></td>  
                    </tr>
                    <tr>
                      <td><input type="text" name="kota" placeholder="kota" value="<?php echo $tes->kota ?>"></td>
                    </tr> 
                    <tr>
                      <td><input type="text" name="tahun" placeholder="tahun" value="<?php echo $tes->tahun ?>"></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button id="bt_simpan" type="button" class="btn btn-success">Update</button>
            </div>
      </form>