<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center">Daftar Judul Buku</h1>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar buku</h6>
                    <a href="?page=buku_tambah" class="btn btn-primary btn-sm"><i class="fas fa-plus fa-sm"></i>Tambah buku Baru</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        if (isset($_GET['id'])){
                           try{ 
                            $id = $_GET['id'];
                            $query = "DELETE FROM buku WHERE id_buku = '$id'";
                            if (mysqli_query($connect, $query)) {
                                echo '
                                        Buku berhasil dihapus!
                                      <';
                            } 
                        
                                        
                        }
                        catch (mysqli_sql_exception $e) {
                            // Tampilkan pesan error custom
                            echo ' Buku gagal dihapus : ada yang meminjam buku
                                ';
                        }
                        }
                        ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                <th>No.</th>
                                    <th>Judul</th>
                                    <th>Nama Kategori</th>
                                    <th>Gambar</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>ISBN</th>
                                    <th>Jumlah</th>
                                    <th>Sinopsis</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                $i = 1;
                                $query = "SELECT buku.*, kategori.kategori FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE 1=1";
                                $result = mysqli_query($connect, $query);
                                while ($data = mysqli_fetch_array($result)) :
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><?= $data['kategori']; ?></td>
                                <td><img src="upload/<?= $data['gambar']; ?>" width="80px" alt=""></td>
                                <td><?= $data['penulis']; ?></td>
                                <td><?= $data['penerbit']; ?></td>
                                <td><?= $data['tahun_terbit']; ?></td>
                                <td><?= $data['isbn']; ?></td>
                                <td><?= $data['jumlah']; ?></td>
                                <td><?= $data['sinopsis']; ?></td>
                                <td>
                                    <div class="d-flex flex-column flex-md-row">
                
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=buku&&id=<?= $data['id_buku'] ?>" class="btn btn-danger"> <i class='fas fa-trash'></i>Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
