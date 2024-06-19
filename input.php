<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<center>Email: ".$_POST['email']."</center><br>";
echo "<center>Nama Lengkap: ".$_POST['nama_lengkap']."</center><br>";
echo "<center>NIM: ".$_POST['nim']."</center><br>";
echo "<center>Jenis Kelamin: ".$_POST['gender']."</center><br>";
echo "<center>Kelas: ".$_POST['class']."</center><br>";
echo "<center>Metode Pembayaran: ".$_POST['pembayaran']."</center><br>";
if(isset($_FILES['bukti_pembayaran'])) {
    $file = $_FILES['bukti_pembayaran'];
    $file_type = mime_content_type($file['tmp_name']);
    $file_name = $file['name'];
    $file_size = $file['size'];
    $max_file_size = 2 * 1024 * 1024; // 2MB

    echo "<center>Uploaded file: " . $file_name . "<center><br>";
    echo "<center>File type: " . $file_type . "<center><br>";
    echo "<center>File size: " . ($file_size / 1024 / 1024) . "<center> MB<br>";

    if ($file_size > $max_file_size) {
        echo "<center> Ukuran file melebihi batas yang diizinkan (2MB).<center>";
    } elseif (strpos($file_type, 'image/') === 0) {
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($file_name);

        if (move_uploaded_file($file['tmp_name'], $upload_file)) {
            echo "<center><img src='" . $upload_file . "' width='300'><center>";
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "File yang diupload bukan gambar.";
    }
}
?>