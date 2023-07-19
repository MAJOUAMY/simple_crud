<?php
try {
    require_once "connect.php";
    $v = $_GET["v"];
    
    switch ($v) {
        case 1:
            //join with the reaction table
            echo "hello";
            $text="top";
            break;
        case 2:
            $sql="SELECT title FROM posts ORDER BY datetimee DESC limit 7";
            $stmt=$conn->prepare($sql);
            $text="new";
           
            break;
        case 3:
            echo "hello";
            $text="random";
            break;



        
    }
    $stmt->execute();
    $resault=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "randPost-{$text} articles"?></title>
    <?php include "./components/links.php"?>
</head>
<body>
    <?php include "./components/header.php"?>
    <h1><?= $text ?></h1>
    
    <table class="table">
    <?php foreach($resault as $row):?>
        <tr>
            <td><?php echo $row['title'] ?> <a href="post.php?post_title=<?=$row['title']?>">see more</a></td>
        </tr>
    <?php endforeach?>
    </table>




    
</body>
</html>

