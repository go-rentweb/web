<?php 
    require ('koneksi.php');
    session_start();


    $id = "SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1";
        $query = mysqli_query($koneksi, $id);
        $row = mysqli_fetch_assoc($query);
        if ($id == null) {
            $id = 1;
        } else {
            $id = $row['id_transaksi'] + 1;
        }
    
        if (isset($_POST['submit'])) {
        

            $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
            $id_unit = $_POST['id_unit'];
            $banyakdisewa = $_POST['banyakdisewa'];
            $status = $_POST['status'];
            $id_user = $_POST['id_user'];
            $id_bank = $_POST['id_bank'];
            $lama_sewa = $_POST['lama_sewa'];
            $total_pembayaran = $_POST['total_pembayaran'];
            $status_pembayaran = $_POST['status_pembayaran'];
            

           
            $query = "INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_unit`, `tanggal`, `banyakdisewa`, `lama_sewa`, `status`, `id_bank`, `bukti_pembayaran`, `total_pembayaran`, `status_pembayaran`)
            VALUES ('$id', '$id_user', '$id_unit', '$tanggal', '$banyakdisewa', '$lama_sewa', '$status', '$id_bank', '', '$total_pembayaran', '$status_pembayaran')";
            $result = mysqli_query($koneksi, $query);

             if($result)
                {
                    $_SESSION['status'] = "Transaksi ditambahkan";
                    header("Location: datatransaksi.php");
                }
                else
                {
                    $_SESSION['status'] = "Transkasi gagal ditambahkan";
                    header("Location: tambahtransaksi.php");
                }
        }

?>