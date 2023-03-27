<?php
require "connection.php";

if(function_exists($_GET['function'])) {
    $_GET['function']();
}

ini_set('date.timezone', 'Asia/Kuala_Lumpur');
$now = new DateTime();
$datenow = $now->format("Y-m-d H:i:s");

function insert_data_sensor(){
    global $konek_db;   
    ini_set('date.timezone', 'Asia/Kuala_Lumpur');
    $now = new DateTime();
    $datenow = $now->format("Y-m-d H:i:s");
    
    $check = array('id' => '', 'tegangan' => '', 'arus' => '', 'daya' => '', 'energi' => '', 'waktu' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    if($check_match == count($check)){
        $waktu_penggunaan = number_format($_POST['waktu']/60, 2); // convert detik ke menit.  
    
          $result = mysqli_query($konek_db, "INSERT INTO data_sensor SET
          id = '$_POST[id]',
          tegangan = '$_POST[tegangan]',
          arus = '$_POST[arus]',
          daya = '$_POST[daya]',
          energi = '$_POST[energi]',
          waktu = '$waktu_penggunaan',
          timestamp = '$datenow'");
          
          if($result)
          {
             $response=array(
                'status' => 1,
                'message' =>'Insert Success'
             );
          }
          else
          {
             $response=array(
                'status' => 0,
                'message' =>'Insert Failed.'
             );
          }
    }else{
       $response=array(
                'status' => 0,
                'message' =>'Wrong Parameter In Insert Data Sensor'
             );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>