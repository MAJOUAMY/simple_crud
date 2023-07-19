<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create a new post</title>
   <?php include "./components/links.php"?>
</head>

<body>
    <div class="container-fluid">
        <?php include "./components/header.php" ?>
    </div>

    <div class="container-fluid">
        <h1>new post</h1>
        <form action="" method="post">

            <input type="text" class="form-control" name="post_title" placeholder="post title">
            <div class="form-floating">
                <textarea class="form-control mt-5" name="post_body" placeholder="write your post" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">post</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

</body>

</html>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

if(isset($_SESSION["user_id"])):
    try {
        $title=$_POST["post_title"];
        $body=$_POST["post_body"];
        require_once "connect.php";
        $d=date("Y-m-d H:m:s");
        $sql="insert into posts(title,body,datetimee) values(:title,:body,:publish_date)";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(":title",$title);
        $stmt->bindValue(":body",$body);
        $stmt->bindValue(":publish_date",$d);
        $stmt->execute();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
endif;
    
}



?>