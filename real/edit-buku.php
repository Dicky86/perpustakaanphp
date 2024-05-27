<?php
    include_once("./connect.php");

   
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $query_get_data = mysqli_query($db, "SELECT * FROM buku WHERE id=$id");

        
        if(mysqli_num_rows($query_get_data) > 0) {
            $buku = mysqli_fetch_assoc($query_get_data);
        } else {
            
            echo "Data buku tidak ditemukan!";
            exit; 
        }
    } else {
        
        echo "Parameter id tidak ditemukan!";
        exit;
    }

    if(isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        
        $query = mysqli_query($db, "UPDATE buku SET nama='$nama',
        isbn='$isbn', unit=$unit WHERE id=$id");
    
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
    <title>Form Edit Buku</title>
</head>
<body>
    <h1>Form Edit Buku</h1>

    <form action="" method="POST">
        <label for="nama">Nama</label>
        
        <input value="<?php echo isset($buku['nama']) ? $buku['nama'] : ''; ?>" type="text" id="nama" name="nama">
        <br>
        <br>
        <label for="isbn">ISBN</label>
        <input value="<?php echo isset($buku['isbn']) ? $buku['isbn'] : ''; ?>" type="text" id="isbn" name="isbn">
        <br>
        <br>
        <label for="unit">Unit</label>
        <input value="<?php echo isset($buku['unit']) ? $buku['unit'] : ''; ?>" type="number" id="unit" name="unit">
        <br>
        <br>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
    <br>
    <a href="./buku.php">Kembali ke halaman buku</a>
</body>
</html>
