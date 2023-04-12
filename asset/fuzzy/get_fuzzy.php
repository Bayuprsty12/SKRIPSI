<?php
include("logic_fuzzy.php");
include '../data_email/send_email.php';

$daya = $_POST['daya'];
$waktu = $_POST['waktu'];

function getResultFuzzy($daya, $waktu){
    $fuzzy_value = fuzzyinfobox($daya, $waktu);
    $result_fuzzy = finalStatus($fuzzy_value);
    if($result_fuzzy == "Boros"){
        send_email();
    }
    echo $result_fuzzy;
}

getResultFuzzy($daya, $waktu);

?>