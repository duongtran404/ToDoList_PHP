<?php
    include('connect.php');
    $id = $_POST['this_id'];
    $sql = "DELETE FROM to_do_list WHERE id ='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location:index.php');
?>