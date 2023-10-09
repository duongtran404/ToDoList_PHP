<?php
    include("connect.php");
    try{
        if(isset($_GET['find'])){
            $values = $_GET['value'];
            $date = $_GET['date'];
            $stmt = $conn->prepare("SELECT * FROM to_do_list WHERE description LIKE '%$values%' AND begin_date LIKE '%$date%'");
            $stmt->execute();
            
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            foreach($result as $row){
            ?>
            <label for="">Description: <?php echo $row['description'] ?></label><br>
            <label for="">Begin date: <?php echo $row['begin_date'] ?></label><br>
            <label for="">End date: <?php echo $row['end_date'] ?></label><br>
            <label for="">Status: <?php echo $row['status'] ?></label><br>
            <button><a href="update.php?this_id=<?php echo $row['id'] ?>">edit</a></button>
            <button><a href="delete.php?this_id=<?php echo $row['id'] ?>">delete</a></button>
            <br>    
        <?php 
            }       
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>