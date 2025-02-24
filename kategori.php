<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center">Daftar Kategori Buku</h1>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Buku</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <?php
                        if (isset($_GET['id'])){
                           try{ 
                            $id = $_GET['id'];
                            $query = "DELETE FROM kategori WHERE id_kategori = '$id'";
                            if (mysqli_query($connect, $query)) {
                                echo '<div class="alert alert-success" role="alert">
                                        Buku berhasil dihapus!
                                      </div>';
                            } 
                        
                                        
                        }
                        catch (mysqli_sql_exception $e) {
                            // Tampilkan pesan error custom
                            echo '<div class="alert alert-danger" role="alert">
                                        Buku gagal dihapus : ada buku yang memiliki kategori yang ingin anda hapus
                                        </div>';
                        }
                        }
                        ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                        

                                <?php
                                
                                $query = "SELECT * FROM kategori";
                                $result = mysqli_query($connect, $query);
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . htmlspecialchars($row['kategori']) . "</td>";
                                    echo "<td>
                                            <a href='?page=kat_ubah&id=" . $row['id_kategori'] . "' class='btn btn-warning btn-sm'>
                                                <i class='fas fa-edit'></i> Ubah
                                            </a>
                                            <a  name='delete' href='?page=kategori&id=" . $row['id_kategori'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus kategori ini?\")'>
                                                <i class='fas fa-trash'></i> Hapus
                                            </a>
                                          </td>";
                                    echo "</tr>";
                                }
                                ?>
                                
                            
                        </table>
                        <div class="form-group d-flex justify-content-between">
                            <a type="submit" name="submit" class="btn btn-primary" href="?page=kat_tambah">
                                <i class="fas fa-plus fa-sm"></i> Tambah Kategori
                            </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>