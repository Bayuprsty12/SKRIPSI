<?php
    include("../config/connection.php");
    $sql = mysqli_query( $konek_db, "SELECT * FROM data_sensor ORDER BY timestamp DESC LIMIT 1;");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>