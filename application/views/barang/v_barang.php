<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title"><?= $title?></h3>
            <div class="card-tools">
                <a href="<?=base_url('barang/add')?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-plus"></i></a>
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
                        <th>nama Barang</th>
                        <th>Ketegori Barang</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1 ;
                    foreach($barang as $akukamu => $data ) { ?> 
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?=$data->nama_barang?></td>
                            <td><?=$data->nama_kategori?></td>
                            <td><?=$data->harga?></td>
                            <td>
                                <img src="<?= base_url('assest/images/gambar/'. $data->gambar)?>" alt="" style="width: 80px ;">
                            </tb>
                            <td>
                                <button id="delete<?=$data->id_barang?>" type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                <button type="button" id="edit<?=$data->id_barang?>"class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target=".halo"><i class="fa fa-edit"></i></button>
                                <a type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#exampleModal"
                                    id_barang = "<?=$data->id_barang?>"
                                    item_name = "<?=$data->nama_barang?>"
                                    kategori = "<?=$data->id_kategori?>"
                                    harga  = "<?=$data->harga?>"
                                    stock = "<?=$data->stok_barang?>"
                                    deskripsi = "<?$data->deskripsi?>"
                                ><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
         </div>
    </div>
</div>

<!--buka modal detail produk-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     <div class="modal-header" >
        <h5 class="modal-title" >Detail Rincian Barang </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body table-responsive">
         <table class="table table-bordered no-margin">
            <tbody>
                <tr>
                    <th>Id Product</th>
                    <td><span id="barang"></span></td>
                </tr>
                <tr>
                    <th>Nama Product</th>
                    <td><span id="nama"></span></td>
                </tr>
                <tr>
                    <th>Kegetori Barang</th>
                    <td><span id="kategori"></span></td>
                </tr>
                <tr>
                    <th>Harga barang</th>
                    <td><span id="harga"></span></td>
                </tr>
                <tr>
                    <th>Stock Barang</th>
                    <td><span id="stock"></span></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td><span id="deskripsi"></span></td>
                </tr>

            </tbody>
         </table>
      </div>
    </div>
  </div>
</div>
<!--buka modal detail produk-->

<script>
     $(document).ready(function(){
        $(document).on('click' ,'#detail' , function(){
            var id_barang = $(this).data('barang');
            var nama_barang = $(this).data('nama');
            var kategori = $(this).data('kategori');
            var harga = $(this).data('harga');
            var stock = $(this).data('harga');
            var deskripsi = $(this).data('deskripsi');
                $('#barang').text(id_barang);
                $('#nama').text(nama_barang);
                $('#kategori').text(id_kategori);
                $('#harga').text(harga);
                $('#stock').text(stok_barang);
                $('#deskripsi').text(deskripsi);
                $('#detail').modal(detail);

        })
     })
</script>