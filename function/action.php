<?php
session_start();
require '../config/config.php';
$action = $_REQUEST['action'];


switch ($action) {
  case "SUBMIT":
    $name = trim($_REQUEST['name']);
    $subject = trim($_REQUEST['subject']);
    $marks = trim($_REQUEST['marks']);

    $stmt = $pdo->prepare("SELECT * FROM students WHERE name=? AND subject=? ");
    $stmt->execute([ $name, $subject]); 

    if ($stmt->rowCount()>0) {
        $sql = "UPDATE students SET marks=? WHERE name=? AND subject=?";
        $pdo->prepare($sql)->execute([$marks, $name, $subject]);
        $_SESSION['error_msg'] = json_encode(["status" =>1,"error"=> "Successfully Marks Updated"]);
       header('Location: ../home.php');
       exit();
    }
    else{

        $sql = "INSERT INTO students (name,subject,marks) VALUES (?,?,?)";
        $result = $pdo->prepare($sql)->execute([$name, $subject, $marks]);
        if ($result) {
            $_SESSION['error_msg'] = json_encode(["status" =>1,"error"=> "Successfully Inserted"]);
            header('Location: ../home.php');
            exit();
        }
    }

    break;
  case "UPDATE":
    $id = trim($_REQUEST['uid']);
    $name = trim($_REQUEST['name']);
    $subject = trim($_REQUEST['subject']);
    $marks = trim($_REQUEST['marks']);
    $sql = "UPDATE students SET marks=? , name=? , subject=? WHERE id=?";
        $pdo->prepare($sql)->execute([$marks, $name, $subject,$id]);
        $_SESSION['error_msg'] = json_encode(["status" =>1,"error"=> "Successfully Updated Data"]);
       header('Location: ../home.php');
       exit();
    break;
  case "DELETE":

    $id = intval($_REQUEST['sid']);  
     
    $stmt = $pdo->prepare( "DELETE FROM students WHERE id =:id" );
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        $_SESSION['error_msg'] = json_encode(["status" =>1,"error"=> "Successfully Deleted"]);
        header('Location: ../home.php');
        exit();
    } 


    break;
  default:
    echo "There is no action for DashBoard";
}
?>