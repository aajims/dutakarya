<?php
    echo form_open('pemda/update');
    echo form_open_multipart('upload/do_upload');
    ?>  

 <section class="content"> 
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Pemerintah Kabupaten Tangsel</h3>
            </div>
            <div class="panel-body">
              <div class="row">
    
                            
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                        <?php  foreach($pemda as $row) ?>
                      <tr>
                          <td><strong>Edit Data Pemerintahan</stong></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Tahun  </td>
                        <input type="hidden" name="id" value="<?php echo $row->id; ?>"> 
                        <td><input type="text" name="tahun" class="form-control" value="<?php echo $row->tahun; ?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Pemerintah Daerah</td>
                        <td><input type="text" name="nama" class="form-control" value="<?php echo $row->nm_pemda; ?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>Ibu Kota</td>
                        <td><input type="text" name="ibukota" class="form-control" value="<?php echo $row->ibukota; ?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="alamat" class="form-control" value="<?php echo $row->alamat;?>" >
                        </td>
                      </tr>
                     <tr>
                        <td>Gambar</td>
                        <td><input type="file" name="gambar" class="form-control" >
                        </td>
                      </tr> 
                    </tbody>
                  </table>
                  
                 <button type="submit" class="btn btn-primary" name="submit">Update</button>
                  <a href="<?php echo site_url('pemda');?>" class="btn btn-primary">Kembali</a>
                </div>
              </div>
            </div>
       </section>
          