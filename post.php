<?php
try{
    require_once "connect.php";
    $post_title=$_GET["post_title"];
    if(isset($post_title)){
        $sql="SELECT * FROM posts WHERE title=:post_title";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(":post_title",$post_title);
        $stmt->execute();
        $resault=$stmt->fetch(PDO::FETCH_ASSOC);
        
    }

}catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $resault["title"]?></title>
    <?php include "./components/links.php"?>
</head>
<body>
    <div class="container">
        <h1 class="h1"><?php echo $resault["title"]?></h1>
      <p class="text-secondary"><?php echo date("Y/m/d", strtotime($resault["datetimee"])) ?></p>

        <div class="text-secondary">
            <?php echo $resault["body"]?>
        </div>
    </div>
    
    
</body>
</html>




