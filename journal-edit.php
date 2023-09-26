<?php
require_once("connect.php");

$id = $_POST["id"];
$day = $_POST["day"];
$predmet = $_POST["predmet"];
$student = $_POST["student"];
$prepod = $_POST["prepod"];
$present = $_POST["present"];
$mark = $_POST["mark"];

switch($_REQUEST["oper"]) {

 case "add":
    $sql = "insert into journal (day, predmet_id, student_id, prepod_id, pres, mark) values ('"
            .$day."',".$predmet.",".$student.",".$prepod.",".$present.",".$mark.")";
    if(!mysqli_query($db_handler, $sql)) {
        echo "Error adding journal: " .mysqli_error($db_handler);
    }
    break;
 
 case "edit":
    $sql = "update journal
            set 
            day='".$day.
            "',predmet_id=".$predmet.
            ",student_id=".$student.
            ",prepod_id=".$prepod.
            ",pres=".$present.
            ",mark=".$mark.
            " where id=".$id;
    if(!mysqli_query($db_handler, $sql)) {
        echo "Error editing journal: " .mysqli_error($db_handler);
    }
    break;
 
 case "del":
    $sql = "DELETE FROM journal WHERE id=$id";
    if(!mysqli_query($db_handler, $sql)) {
        echo "Error deleting journal: " .mysqli_error($db_handler);
    }
    break;
 }

mysqli_close($db_handler);
?>