<?php
include "../config/connection.php";

//get time
ini_set('date.timezone', 'Asia/Kuala_Lumpur');
$now = new DateTime();


$tegangan = $_POST['tegangan'];
$arus = $_POST['arus'];
$daya = $_POST['daya'];
$energy = $_POST['energi'];
$time_used = $_POST['waktu_penggunaan'];
$fuzzy_result = $_POST['hasil_fuzzy'];
$date_used = $now->format("Y-m-d");
$timestamp = $now->format("Y-m-d H:i:s");

//send data 
$sql = "INSERT INTO log_penggunaan (tegangan, arus, daya, energi, lama_penggunaan, hasil_fuzzy, tanggal_penggunaan, timestamp) VALUE ('".$tegangan."','".$arus."','".$daya."','".$energy."','".$time_used."','".$fuzzy_result."','".$date_used."','".$timestamp."')";
$query = mysqli_query($konek_db, $sql);
if($query){
    echo "insert log data success";
}else{
    echo "insert log data failed";
}

?>