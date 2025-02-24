
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center">Tambah Kategori Buku</h1>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form ubah Kategori</h6>
                </div>
                <div class="card-body">
                    <?php
                    $id = $_GET ['id'];
                    if (isset($_POST['submit'])) {
                        $nama_kategori = $_POST['nama_kategori'];
                        $query = "UPDATE kategori SET kategori = '$nama_kategori' WHERE id_kategori = '$id'" ;
                        $nama_kategori = strtolower($_POST['nama_kategori'] );
                    $cek = mysqli_query($connect, "SELECT * FROM kategori WHERE lower(kategori) = '$nama_kategori'");
                    $check = mysqli_num_rows($cek);
                    if($check > 0){
                        echo '     kategori yang dimasukan sama
                                  ';
                        
                        }else{   
                        if (mysqli_query($connect, $query)) {
                            echo '
                                    Kategori berhasil diubah!
                                  ';
                        } else {
                            echo '< class="alert alert-danger" role="alert">
                                    Kategori gagal diubah: ' . mysqli_error($connect) . '
                                  ';
                        }
                    }
                }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fas fa-plus fa-sm"></i> Ubah
                            </button>
                            <a type="reset" href="?page=kat_tambah" class="btn btn-warning">
                                <i class="fas fa-undo fa-sm"></i> Reset
                            </a>
                            <a href="?page=kategori" class="btn btn-secondary">
                                <i class="fas fa-arrow-left fa-sm"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
```

