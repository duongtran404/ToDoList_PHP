<?php

    include('connect.php');
    $id = $_GET['this_id'];
    $stmt = $conn->prepare("SELECT * FROM to_do_list WHERE id = '$id'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();
    
    if(isset($_POST['btn_edit'])){
        $id = $_GET['this_id'];
        $description = $_POST['description'];
        $begin_date = $_POST['begin_date'];
        $end_date = $_POST['end_date'];
        $status = $_POST['status'];
        
        try{
            if(!empty($begin_date) && !empty($end_date) && !empty($description) && strtotime($begin_date)<strtotime($end_date)){
                $stmt = $conn->prepare("UPDATE to_do_list 
                SET description='$description', begin_date='$begin_date', end_date='$end_date', status='$status'
                WHERE id=$id");
                $stmt->execute();
                header('location:index.php');
            }elseif(strtotime($begin_date)>strtotime($end_date)){
                echo"ngay ket thuc khong the dung truoc ngay bat dau";
            }else{
                echo "khong duoc bo trong!";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
<form method="post">
    <label>description: </label>
    <input type="text" name="description" value="<?php echo $row['description'] ?>">
    <br>
    <label for="">begin date: </label>
    <input type="date" name="begin_date" value="<?php echo $row['begin_date'] ?>">
    <br>
    <label for="">end date: </label>
    <input type="date" name="end_date" value="<?php echo $row['end_date'] ?>">
    <br>
    <label for="">status: </label>
    <select name="status">
        <option value="<?php echo $row['status']?>"><?php echo $row['status']?></option>
        <option value="not started">not started</option>
        <option value="doing">doing</option>
        <option value="completed">completed</option>
    </select>
    <br>
    <input type="submit" name="btn_edit" value="submit">
</form>