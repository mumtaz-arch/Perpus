<?php



// Hapus user jika ada request
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM user WHERE id_user = $id";
    if (mysqli_query($connect, $delete_query)) {
        echo "<script>alert('User berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus user');</script>";
    } 
}

$query = "SELECT id_user, nama, email, no_telepon, alamat, username, level FROM user";
$result = mysqli_query($connect, $query);

if (!$result) {
    echo '<script>alert("Gagal mengambil data user.");</script>';
}
?>

<div class="container">
    <h2 class="text-center mt-4">Daftar User</h2>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">List User</h6>
                    <a href="?page=user" class="btn btn-primary btn-sm"><i class="fas fa-plus fa-sm"></i>Tambah User Baru</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['no_telepon']); ?></td>
                                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                                        <td><?php echo htmlspecialchars($row['level']); ?></td>
                                        <td>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=li_user&id=<?= $row['id_user'] ?>" class="btn btn-danger"> <i class='fas fa-trash'></i>Hapus</a>
                                           
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>