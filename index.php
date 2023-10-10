<?php
try{
    include('connect.php');
    $stmt = $conn->prepare("SELECT * FROM to_do_list");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            counter-reset: tableCount;     
        }
            .counterCell:before {              
            content: counter(tableCount); 
            counter-increment: tableCount; 
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <table>
            <th>STT</th>
            <th>Description</th>
            <th>Begin</th>
            <th>End</th>
            <th>Status</th>
            <th>CUR</th>
        </tr>
        <tr>
            <?php
                foreach($result as $row){

?>
                            <tr>
                                <td class="counterCell"></td>
                                <td><?php echo $row['description']?></td>
                                <td><?php echo $row['begin_date']?></td>
                                <td><?php echo $row['end_date']?></td>
                                <td>
                                <?php echo $row['status']?>
                                </td>
                                <td><a href="update.php?this_id=<?php echo $row['id']?>">edit</a>
                                <a href="delete.php?this_id=<?php echo $row['id'] ?>">delete</a>    
                            </td>
                            </tr>

            <?php                       
                }
}catch(PDOException $e){
    echo $e->getMessage();
}  
            ?>
        </tr>
    </table>
</form>
 
<form action="insert.php" method="get">
    <input type="submit" name="btn_insert" value="ADD task">
    <br>
</form>
<form action="find.php" method="get">
    <input type="text" name="value">
    <input type="date" name="date" id="">
    <input type="submit" name="find" value="search">
</form>
</body>
</html>

