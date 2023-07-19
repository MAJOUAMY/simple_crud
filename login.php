<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./components/links.php" ?>
</head>

<body>
    <div class="container-fluid">
        <?php include "./components/header.php" ?>
    </div>
    <div class="container mt-3 bg-light">
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

<?php





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once "connect.php";
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT user_id, email, password FROM users WHERE email = :email AND password = :password";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $password);
        $stmt->execute();
        $row=$result = $stmt->fetch(PDO::FETCH_OBJ);
        
       
        if ($result) {
            $_SESSION['user_id'] = $row->user_id;
            $_SESSION['email'] = $row->email;
            $_SESSION["password"] = $row->password;
            header("Location:index.php");
           
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
