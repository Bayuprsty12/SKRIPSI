<?php  
//membuat koneksi ke database  
    $host = 'localhost';  
    $user = 'root';        
    $password = '';        
    $database = 'db_monitoring_listrik';    
        
    $konek_db = mysqli_connect($host, $user, $password, $database);

   // Mengecek koneksi
    /*if(!$konek_db){
     echo"Tidak Terhubung";
    }  
    else {
        echo"Koneksi Berhasil";
    }*/
?>