<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organn";
$link = mysqli_connect($servername, $username, $password, $dbname);
$conn = mysqli_select_db($link, $dbname);
if ($conn) {
    echo ("");
} else {
    die("connection failed" . mysqli_connect_error());
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!-- <link rel="stylesheet" href="./css/login.css">  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/product.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-sm p-3 mt-5 ">
      
        <form id="form" action="" method="POST">
            <div class="container mt-5 border p-5">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="usenname" />
                    <label for="floatingInput">username </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" name="password" placeholder="password" />
                    <label for="floatingInput">password</label>
                </div>
                <button name="login" type="submit" class="btn btn-primary m-3" onclick="clearform()">login</button>

        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
    function clearform() {
        document.getElementById("floatingInput").value = ""; //don't forget to set the textbox ID
    }
</script>

</html>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //echo "$username   $password";
    $sql = "SELECT * FROM users where username='$username' AND password ='$password' ";
    //echo "$sql";
    $res = mysqli_query($link, $sql);

    if (mysqli_num_rows($res) == 1) {
        session_start();
        $_SESSION['organn'] = true;
        echo "<script>document.getElementById('form').reset();</script>";

        header("location:home.php");
    }

    if (mysqli_num_rows($res) == 0) {
        $sql = "INSERT INTO users(username,password) VALUES('$username','$password')";
        echo "$sql";
        mysqli_query($link, $sql);
        echo "<script>document.getElementById('form').reset();</script>";
        $msg = "user added , You can login now";
        echo "<script type='text/javascript'>alert('$msg')</script>";
    }
    echo "<script>document.getElementById('form').reset();</script>";
}
// echo "hi";  
?>
