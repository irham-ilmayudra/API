<?php

    $conn = mysqli_connect('localhost','root','','myapi');

    if(isset($_GET['nama_buah'])){
        $nama_buah = $_GET['nama_buah'];

        $query = mysqli_query($conn,"SELECT * FROM buah WHERE nama_buah = '$nama_buah'");

        $view = mysqli_fetch_assoc($query);

        if($query -> num_rows > 0){
            $resp['id'] = $view['id'];
            $resp['nama_buah'] = $view['nama_buah'];
            $resp['warna_buah'] = $view['warna_buah'];
            $resp['harga_buah'] = $view['harga_buah'];
            $resp['message'] = "Data berhasil di kembalikan";
        }
        else{
            $resp['message'] = "Maaf data tidak di temukan";
        }            
    }
    else{
        $resp['message'] = "Maaf nama buah tidak ada";
    }
    
    header('conten-type: application/json'); // menampilkan json semua

    $responce['responce'] = $resp;

    echo json_encode($responce); // supaya data yang di kembalikan menjadi json bukan array

    mysqli_close($conn);
?>