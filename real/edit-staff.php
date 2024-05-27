<?php
    include_once("./connect.php");

    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $query_get_data = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");

        if(mysqli_num_rows($query_get_data) > 0) {
            $staff = mysqli_fetch_assoc($query_get_data);
        } else {
            echo "Data staff tidak ditemukan!";
            exit; 
        }
    } else {
        echo "Parameter id tidak ditemukan!";
        exit;
    }

    if(isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];

        $query = mysqli_query($db, "UPDATE staff SET nama='$nama',
        telp='$telp', email='$email' WHERE id=$id");
    
        if ($query) {
            echo "Data berhasil diperbarui!";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Staff</title>
</head>
<body>
    <h1>Form Edit Staff</h1>

    <form action="" method="POST">
        <label for="nama">Nama</label>
        <input value="<?php echo isset($staff['nama']) ? $staff['nama'] : ''; ?>" type="text" id="nama" name="nama">
        <br>
        <br>
        <label for="telp">Telepon</label>
        <input value="<?php echo isset($staff['telp']) ? $staff['telp'] : ''; ?>" type="text" id="telp" name="telp">
        <br>
        <br>
        <label for="email">Email</label>
        <input value="<?php echo isset($staff['email']) ? $staff['email'] : ''; ?>" type="email" id="email" name="email">
        <br>
        <br>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
    <br>
    <a href="./staff.php">Kembali ke halaman staff</a>
</body>
</html>
