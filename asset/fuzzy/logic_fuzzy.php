<?php

if(isset($_POST['submit'])){
    $submit = $_POST['submit'];
}
 
function derajat_keanggotaan_daya($linguistik_variable, $value){
    if($linguistik_variable == "Rendah"){
        //count for miu rendah
        if($value >= 80){
            $derajat_keanggotaan = 0;
        }else if($value >= 20 and $value <=80){
            $derajat_keanggotaan = (80 - $value) / (80 - 20);
        }else if($value <= 20){
            $derajat_keanggotaan = 1;
        }
    }else if($linguistik_variable == "Sedang"){
        //count for miu sedang
        if($value <=20 or $value >= 130 ){
            $derajat_keanggotaan = 0;
        }else if($value >= 20 and $value <= 80){
            $derajat_keanggotaan = ($value - 20) / (80 - 20);
        }else if($value >= 80 and $value <= 130){
            $derajat_keanggotaan = (130 - $value) / (130 - 80);
        }
    }else if($linguistik_variable == "Tinggi"){
        //count for miu tinggi
        if($value <= 80){
            $derajat_keanggotaan = 0;
        }else if($value >= 80 and $value <= 130){
            $derajat_keanggotaan = ($value - 80) / (130 - 80);
        }else if($value >= 130){
            $derajat_keanggotaan = 1;
        }
    }
    return $derajat_keanggotaan;
}


function derajat_keanggotaan_waktu($linguistik_variable, $value){
    if($linguistik_variable == "Sebentar"){
        //count for miu sebentar
        if($value >= 60){
            $derajat_keanggotaan = 0;
        }else if($value >= 0 and $value <=60){
            $derajat_keanggotaan = (60 - $value) / (60 - 0);
        }else if($value <= 0){
            $derajat_keanggotaan = 1;
        }        
    }else if($linguistik_variable == "Sedang"){
        //count for miu sedang
        if($value <= 0 or $value >= 120 ){
            $derajat_keanggotaan = 0;
        }else if($value >= 0 and $value <= 60){
            $derajat_keanggotaan = ($value - 0) / (60 - 0);
        }else if($value >= 60 and $value <= 120){
            $derajat_keanggotaan = (120 - $value) / (120 - 60);
        }      
    }else if($linguistik_variable == "Lama"){
        //count for miu lama
        if($value <= 60){
            $derajat_keanggotaan = 0;
        }else if($value >= 60 and $value <= 120){
            $derajat_keanggotaan = ($value - 60) / (120 - 60);
        }else if($value >= 120){
            $derajat_keanggotaan = 1;
        }
        return $derajat_keanggotaan;
    }
    return $derajat_keanggotaan;
}

function inferensi_nilai_z($linguistik_variable, $value){
    if($linguistik_variable == "Hemat"){
        $result_inferensi = 1 - $value;
    }else if($linguistik_variable == "Boros"){
        $result_inferensi = $value;
    }

    return $result_inferensi;
}

function count_average($array_inferensi, $array_index){
    $sigma_alpha_inferensi = 0;
    $sigma_alpha = 0;
    for($i=0; $i<$array_index; $i++){
        $sigma_alpha_inferensi = $sigma_alpha_inferensi + ($array_inferensi[$i][0] * $array_inferensi[$i][1]);
        $sigma_alpha = $sigma_alpha + $array_inferensi[$i][0];
    }

    $count_average_weight = $sigma_alpha_inferensi/$sigma_alpha;
    return $count_average_weight;
}

function finalStatus($value){
    //derajat Hemat
    if($value >= 1.00){
        $derajat_hemat = 0;
    }else if($value >= 0.00 and $value <= 1.00){
        $derajat_hemat = (1.00-$value) / (1.00 - 0.00);
    }else if($value <= 0){
        $derajat_hemat = 1;
    }

    //derajat Boros
    if($value <= 0.00){
        $derajat_boros = 0;
    }else if($value >= 0.00 and $value <= 1.00){
        $derajat_boros = ($value - 0.00) / (1.00 - 0.00);
    }else if($value >= 1.00){
        $derajat_boros = 1;
    }

    $result_final = max($derajat_hemat,$derajat_boros);
    if($result_final == $derajat_hemat){
        return "Hemat";  
    }else if($result_final == $derajat_boros){
        return "Boros";     
    }

   
}

//fuzzy get data from page form
if(isset($submit)){
    $daya = $_POST['daya'];
    $waktu = $_POST['waktu'];

    echo "daya = ".$daya."<br>";
    echo "waktu = ".$waktu."<br>";
    echo "<br>";

    include("../../config/connection.php");
    $sql = mysqli_query($konek_db, "SELECT * FROM rules_fuzzy");
    $temp_defuzzyfikasi[][] = NULL;
    $array_index = 0;
    while ($row = mysqli_fetch_assoc($sql)) {
        $result_daya = derajat_keanggotaan_daya($row['keanggotaan_daya'], $daya);
        $result_waktu = derajat_keanggotaan_waktu($row['keanggotaan_waktu'], $waktu);
       
        
        $alpha_predikat = min($result_daya, $result_waktu); // menentukan nilai a-prdikat dengan fungsi Min
        $inferensi_nilaiZ = inferensi_nilai_z($row['result'], $alpha_predikat);
        
        echo "ID = ".$row['id']."<br>";
        echo "linguistik Daya = [".$row['keanggotaan_daya']."]<br>";
        echo "linguistik Waktu = [".$row['keanggotaan_waktu']."]<br>";
        echo "Rule = [".$row['result']."]<br>";
        echo "nilai a-Predikat = ".number_format($alpha_predikat,3)."<br>"; // mencetak nilai a-predikat
        echo "inferensi nilai Z per rule = ".number_format($inferensi_nilaiZ,3)."<br><br>";
        
        $temp_defuzzyfikasi[$array_index][0] = $alpha_predikat;
        $temp_defuzzyfikasi[$array_index][1] = $inferensi_nilaiZ;
        $array_index++;
    }

    $average_weighted = count_average($temp_defuzzyfikasi, $array_index);
    echo "Nilai Z keseluruhan di Average".$average_weighted."<br> <br>";
 

    echo "daya = ".$daya."<br>";
    echo "waktu = ".$waktu."<br>";
    echo "Status Penggunaan = ".finalStatus($average_weighted); 
}

//Fuzzy get data from database
function fuzzydatabase($daya, $waktu){
    include("../config/connection.php");
    $sql = mysqli_query($konek_db, "SELECT * FROM rules_fuzzy");
    $temp_defuzzyfikasi[][] = NULL;
    $array_index = 0;
    while ($row = mysqli_fetch_assoc($sql)) {
        $result_daya = derajat_keanggotaan_daya($row['keanggotaan_daya'], $daya);
        $result_waktu = derajat_keanggotaan_waktu($row['keanggotaan_waktu'], $waktu);
       
        
        $alpha_predikat = min($result_daya, $result_waktu); // menentukan nilai a-prdikat dengan fungsi Min
        $inferensi_nilaiZ = inferensi_nilai_z($row['result'], $alpha_predikat);        
        
        $temp_defuzzyfikasi[$array_index][0] = $alpha_predikat;
        $temp_defuzzyfikasi[$array_index][1] = $inferensi_nilaiZ;
        $array_index++;
    }

    $average_weighted = count_average($temp_defuzzyfikasi, $array_index);
    return ($average_weighted); 
}


//Fuzzy untuk INFO BOX dashboard
function fuzzyinfobox($daya, $waktu){
    include("../../config/connection.php");
    $sql = mysqli_query($konek_db, "SELECT * FROM rules_fuzzy");
    $temp_defuzzyfikasi[][] = NULL;
    $array_index = 0;
    while ($row = mysqli_fetch_assoc($sql)) {
        $result_daya = derajat_keanggotaan_daya($row['keanggotaan_daya'], $daya);
        $result_waktu = derajat_keanggotaan_waktu($row['keanggotaan_waktu'], $waktu);
       
        
        $alpha_predikat = min($result_daya, $result_waktu); // menentukan nilai a-prdikat dengan fungsi Min
        $inferensi_nilaiZ = inferensi_nilai_z($row['result'], $alpha_predikat);
        
        $temp_defuzzyfikasi[$array_index][0] = $alpha_predikat;
        $temp_defuzzyfikasi[$array_index][1] = $inferensi_nilaiZ;
        $array_index++;
    }

    $average_weighted = count_average($temp_defuzzyfikasi, $array_index);
    return ($average_weighted); 
}
?>