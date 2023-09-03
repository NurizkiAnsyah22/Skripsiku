




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Stok Gudang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Jumlah Barang</th>
        <th>Satuan</th>
        <th>Pengaturan</th>
    </tr>
</thead>
										
               
                 <tbody>
    <?php 
    $no = 1;
    $sql = $koneksi->query("select * from gudang");
    while ($data = $sql->fetch_assoc()) {
    ?>
    
    <tr>
        <td><?php echo $no++; ?></td>
        <td>
            <img src="img/<?php echo $data['gambar']; ?>" alt="Gambar Barang" width="70" height="70" class="image-popup">



        </td>
        <td><?php echo $data['kode_barang'] ?></td>
        <td><?php echo $data['nama_barang'] ?></td>
        <td><?php echo $data['jenis_barang'] ?></td>
        <td><?php echo $data['jumlah'] ?></td>
        <td><?php echo $data['satuan'] ?></td>

        <td>
            <a href="?page=gudang&aksi=ubahgudang&kode_barang=<?php echo $data['kode_barang'] ?>" class="btn btn-success">Ubah</a>
            <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=gudang&aksi=hapusgudang&kode_barang=<?php echo $data['kode_barang'] ?>" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    <?php }?>
</tbody>
                                </table>
								<a href="?page=gudang&aksi=tambahgudang" class="btn btn-primary" >Tambah</a>
                  
                </table>
              </div>
            </div>
          </div>

        </div>
        
        
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
/* Style for the modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
}

/* Style for the modal content */
.modal-content {
  max-width: 400px;
  margin: auto;
  margin-top: 50px;
  display: block;
}

/* Style for the close button */
.close {
  color: white;
  font-size: 30px;
  position: absolute;
  top: 15px;
  right: 20px;
  cursor: pointer;
}

/* Style for the close button on hover */
.close:hover {
  color: #ccc;
}
</style>

<!-- Modal HTML -->
<div id="imageModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="modalImage">
</div>

<script>
$(document).ready(function() {
  // Get the modal
  var modal = document.getElementById("imageModal");

  // Get the image and insert it inside the modal
  $(".image-popup").on("click", function() {
    var imgSrc = $(this).attr("src");
    var modalImage = document.getElementById("modalImage");
    modal.style.display = "block";
    modalImage.src = imgSrc;
  });

  // When the user clicks on <span> (x), close the modal
  $(".close").on("click", function() {
    modal.style.display = "none";
  });

  // When the user clicks anywhere outside of the modal, close it
  $(window).on("click", function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
});
</script>











