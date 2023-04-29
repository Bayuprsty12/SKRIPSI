<?php
    include("../config/connection.php");
    $sql = mysqli_query( $konek_db, "SELECT tanggal_penggunaan, SUM(energi) as total_kwh FROM log_penggunaan GROUP BY tanggal_penggunaan LIMIT 10");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>