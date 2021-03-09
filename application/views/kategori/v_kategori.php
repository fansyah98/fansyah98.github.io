<div class="col-md-12">
    <div class="card card-green">
        <div class="card-header">
          <h3 class="card-title"><?= $title?></h3>
            <div class="card-tools">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#kategori">
                   <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
            <div class="card-body">
            <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i> ';
                    echo $this->session->flashdata('pesan');
                    echo '</h6></div>';
                }
            ?>

        
                <table class="table table-bordered" id="table2">
                    <thead class="text-center">
                        <tr>
                             <th>No</th>
                             <th>id_kategori</th>
                             <th>Nama Kategori</th>
                             <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php 
                        $no = 1 ;
                         foreach($kategori as $akukamu => $data ) { ?> 
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?=$data->id_kategori?></td>
                                <td><?=$data->nama_kategori?></td>
                                <td>
                                  <button id="delete<?=$data->id_kategori?>" type="button" class="btn btn-primary btn-sm  btn-flat" data-toggle="modal" data-target="#delete">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <button type="button" id="edit<?=$data->id_kategori?>"class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target=".halo<?=$data->id_kategori?>">
                                      <i class="fa fa-edit"></i>
                                  </button>
                                  
                                
                                    <a href=""class="btn btn-warning btn-flat btn-sm"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                         <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>



<!---------------------------------------Modal Tambah Data-------------------------------------------->
<!---modal tambah data -->
<div class="modal fade" id="kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-sm bg-info">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $title?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <?php
            echo 
            form_open('kategori/add');        
        ?>

        <div class="form-group">
            <label>Nama User</label>
            <input type="text" class="form-control" name="nama_kategori" placeholder="Katagori barang" required>
        </div>

    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-sm btn-xns" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm btn-xns">Save changes</button>
    </div>

                
    <?php 
        echo
        form_close();
    ?>

</div>
</div>
</div>

<!-- modal delete kategori barang --->
<?php 
foreach($kategori as $Kamusayang =>$data) { ?>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content modal-sm">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" ><?= $title ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
            echo 
            form_open('kategori/delete');        
        ?>
            <span>Apakah Anda yakin mengghapus data ini ??</span>
    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-sm btn-xns" data-dismiss="modal">Close</button>
        <a href="<?=base_url('kategori/delete/'. $data->id_kategori)?>" class="btn btn-success btn-sm btn-xns">Delete Data</a>
        </div>
    </div>
  </div>
</div>
<?php 
echo
form_close();
?>
<?php } ?>
<!-- modal delete kategori barang --->


<!-- modal edit kategori barang --->
<?php 
foreach($kategori as $Kamusayang =>$data) { ?>
<div class="modal fade halo<?=$data->id_kategori?>"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-info modal-sm">
     <div class="modal-header" >
        <h5 class="modal-title" >Edit <?= $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
     <?php
            echo 
            form_open('kategori/edit/'.$data->id_kategori);        
        ?>
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" class="form-control" value="<?=$data->nama_kategori?>" name="nama_kategori" placeholder="Kategori Barang " required>
        </div>


        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger btn-sm btn-xns" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm btn-xns">Save changes</button>
        </div>

      </div>
    </div>
  </div>
</div>
<?php
echo 
form_close();
?>
<?php } ?>
<!-- modal edit kategori barang --->