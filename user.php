
<?php

// Proses penambahan user baru
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $no_telp = mysqli_real_escape_string($connect, $_POST['no_telp']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = md5($_POST['password']);
    $level = mysqli_real_escape_string($connect, $_POST['level']);

    $query = "INSERT INTO user 
              VALUES ('','$nama', '$username', '$password', '$email', '$alamat', '$no_telp', '$level')";

    if (mysqli_query($connect, $query)) {
        echo '<script>alert("User berhasil ditambahkan."); window.location.href="?page=li_user";</script>';
    } else {
        echo '<script>alert("Gagal menambahkan user.");</script>';
    }
}
?>


    <div class="container">
        <h2 class="text-center mt-4">Tambah User</h2>
        <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Buku</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No Telepon</label>
                <input type="tel" name="no_telp" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="peminjam">Peminjam</option>
                </select>
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
                            </a>        </form>
                </div>
            </div>
        </div>
    </div>
</div>

        
    
