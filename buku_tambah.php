
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center">Tambah Buku</h1>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Buku</h6>
                </div>
                <div class="card-body">
                    <?php 
                    if(isset($_POST['submit'])) {
                        $id_kategori = mysqli_real_escape_string($connect, $_POST['id_kategori']);
                        $judul = mysqli_real_escape_string($connect, ucfirst($_POST['judul']));
                        $penulis = mysqli_real_escape_string($connect, ucfirst($_POST['penulis']));
                        $penerbit = mysqli_real_escape_string($connect, ucfirst($_POST['penerbit']));
                        $tahun_terbit = mysqli_real_escape_string($connect, $_POST['tahun_terbit']);
                        $isbn = mysqli_real_escape_string($connect, $_POST['isbn']);
                        $jumlah = mysqli_real_escape_string($connect, $_POST['jumlah']);
                        $sinopsis = mysqli_real_escape_string($connect, $_POST['sinopsis']);
                        
                        // Proses Upload Gambar
                        $gambar = $_FILES['gambar'];
                        $upload_dir = "upload/"; // Direktori penyimpanan gambar
                        $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);
                        $filename = time() . "." . $ext; // Rename agar unik
                        $file_path = $upload_dir . $filename;
                    
                        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
                        if (!in_array(strtolower($ext), $allowed_ext)) {
                            echo '<div class="alert alert-danger" role="alert">
                                    Format gambar tidak didukung! Hanya JPG, JPEG, PNG, GIF.
                                  </div>';
                        } else if (move_uploaded_file($gambar['tmp_name'], $file_path)) {
                            // Cek apakah judul sudah ada
                            $cek = mysqli_query($connect, "SELECT * FROM buku WHERE judul='$judul'");
                            $check = mysqli_num_rows($cek);
                    
                            if ($check > 0) {
                                echo '<div class="alert alert-warning" role="alert">
                                        Buku dengan judul tersebut sudah ada!
                                      </div>';
                            } else {
                                // Simpan ke database
                                $query = mysqli_query($connect, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, isbn, jumlah, sinopsis, gambar) 
                                VALUES('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah', '$sinopsis', '$filename')");
                    
                                if($query) {
                                    echo '<div class="alert alert-success" role="alert">
                                            Buku berhasil ditambahkan!
                                          </div>';
                                    echo '<script>setTimeout(function(){ window.location.href = "?page=buku"; }, 1500);</script>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
                                            Gagal menambahkan buku: ' . mysqli_error($connect) . '
                                          </div>';
                                }
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                                    Gagal mengunggah gambar.
                                  </div>';
                        }
                    }
                    ?>
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gambar">Upload Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <?php 
                                    $kat = mysqli_query($connect, "SELECT * FROM kategori");
                                    while ($kategori = mysqli_fetch_array($kat)) :
                                ?>
                                <option value="<?= $kategori['id_kategori']; ?>">
                                    <?= $kategori['kategori']; ?>
                                </option>
                                <?php endwhile; ?>    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" required>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="1900" max="2025" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis</label>
                            <textarea name="sinopsis" id="sinopsis" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fas fa-plus fa-sm"></i>Tambah
                            </button>
                            <button type="reset" class="btn btn-warning">
                                <i class="fas fa-undo fa-sm"></i> Reset
                            </button>
                            <a href="?page=buku" class="btn btn-secondary">
                                <i class="fas fa-arrow-left fa-sm"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







