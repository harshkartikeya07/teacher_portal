<?php
function getStudentRecords(){
    require './config/config.php';
    $query = $pdo->query("SELECT * FROM students");
    return $query->fetchAll();
}
?>