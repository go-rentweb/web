<?php

include "koneksi.php";

                $nama_kendaraan = $_POST['nama'];
                $jenis_kendaraan = $_POST['jeniskendaraan'];
                $jumlah_roda = $_POST['jumlahroda'];
                $harga_sewa = $_POST['hargasewa'];



// Cek apakah user ingin mengubah fotonya atau tidak

if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :

    // Ambil data foto yang dipilih dari form

    $sumber = $_FILES['gambar']['name'];

    $nama_gambar = $_FILES['gambar']['tmp_name'];

	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$sumber;

    // Set path folder tempat menyimpan fotonya

    $path = "assets/img/".$fotobaru;



    if(move_uploaded_file($nama_gambar, $path)){ // Cek apakah gambar berhasil diupload atau tidak

        // Query untuk menampilkan data user berdasarkan id_user yang dikirim 

        $sql = mysqli_query("SELECT * FROM data_unit WHERE nama='".$nama_kendaraan."'"); // Eksekusi/Jalankan query dari variabel $query

        $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql



        // Cek apakah file gambar sebelumnya ada di folder foto

        if(is_file("assets/img/".$data['gambar'])) // Jika gambar ada

            unlink("assets/img/".$data['gambar']); // Hapus file gambar sebelumnya yang ada di folder images

        

        // Proses ubah data ke Database

        
        $sql =  mysqli_query($koneksi, "UPDATE data_unit SET  nama='$nama_kendaraan', gambar='$fotobaru',
        jeniskendaraan='$jenis_kendaraan' ,  jumlahroda='$jumlah_roda', hargasewa='$harga_sewa' WHERE nama='$nama_kendaraan'");; // Eksekusi/ Jalankan query dari variabel $query



        if($sql){ // Cek jika proses simpan ke database sukses atau tidak

            // Jika Sukses, Lakukan :

            header("location: datakendaraan.php"); // Redirect ke halaman datakendaraan.php

        }else{

            // Jika Gagal, Lakukan :

            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";

            echo "<br><a href='updatekendaraan.php'>Kembali Ke Form</a>";

        }

    }else{

        // Jika gambar gagal diupload, Lakukan :

        echo   "<script> alert('Maaf, Gambar gagal untuk diupload'); 

                location = 'updatekendaraan.php'; 

                </script>";

    }

}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :

    // Proses ubah data ke Database

    $query = mysqli_query($koneksi, "UPDATE data_unit SET  nama='$nama_kendaraan', 
    jeniskendaraan='$jenis_kendaraan' ,  jumlahroda='$jumlah_roda', hargasewa='$harga_sewa' WHERE nama='$nama_kendaraan'");

    $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query



    if($sql){ // Cek jika proses simpan ke database sukses atau tidak

        // Jika Sukses, Lakukan :

        header("location: datakendaraan.php"); // Redirect ke halaman datakendaraan.php

    }else{

        // Jika Gagal, Lakukan :

        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";

        echo "<br><a href='updatekendaraan.php'>Kembali Ke Form</a>";

    }

}



?>
