<?php  
require '../config/config.php';
$id = $_POST['id'];

// echo $id;
if (empty($id)) {
    echo "no id";
}
try {
    
    $stmt = $pdo->prepare('SELECT * FROM students WHERE id=?');
    $stmt->execute(array($id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode( $result);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }