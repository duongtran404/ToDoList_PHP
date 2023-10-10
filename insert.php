<?php
    include('connect.php');
    if(isset($_GET['btn_add'])){
        $description = $_GET['description'];
        $begin_date = $_GET['begin_date'];
        $end_date = $_GET['end_date'];
        if(!empty($begin_date) && !empty($end_date) && !empty($description) && strtotime($begin_date)<strtotime($end_date)){
            $sql = "INSERT INTO to_do_list(description,begin_date,end_date)
            VALUES('$description','$begin_date','$end_date')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header('location:index.php');
        }elseif(strtotime($begin_date)>strtotime($end_date)){
            echo"ngay ket thuc khong the dung truoc ngay bat dau";
        }else{
            echo "khong duoc bo trong";
        }

    }
?>
<form action="insert.php" method="get">
    <label>description: </label>
    <input type="text" name="description" value="<?php echo $row['description'] ?>">
    <br>
    <label for="">begin date: </label>
    <input type="date" name="begin_date" value="<?php echo $row['begin_date'] ?>">
    <br>
    <label for="">end date: </label>
    <input type="date" name="end_date" value="<?php echo $row['end_date'] ?>">
    <br>
    <input type="submit" name="btn_add" value="submit">
</form>
