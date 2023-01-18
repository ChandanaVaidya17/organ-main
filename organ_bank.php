<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organn";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Organ Bank</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/product.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Organ-Donation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AddDoner.php">Add donor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Donate.php">Donate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="organ_bank.php">Organ Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Order.php">Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <form action="" method="post">
        <div class="container mt-5 border p-5">
            <div class="text-center m-4 text-dark">
                <h1>Organ tested details yet to be completed  </h1>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="Oid" placeholder="product name" />
                <label for="floatingInput">Organ id</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="tdetails" placeholder="product name" />
                <label for="floatingInput">Test details</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="cost" name="Otype" />
                <label for="floatingInput">Organ type</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="cost" name="oissue" />
                <label for="floatingInput">Organ review</label>
            </div>
            <button class="m-3" name="submit">
                Submit
            </button>

        </div>

    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>

<?php

if(isset($_POST["submit"]))
{
    $sql = "INSERT INTO organ_bank VALUES('$_POST[Oid]','$_POST[tdetails]', '$_POST[Otype]', '$_POST[oissue]'";
    mysqli_query($link, $sql);
    $msg = "";
    echo "<script type='text/javascript'>alert('$msg')</script>";

    echo "<div class='container table table-bordered table-responsive-sm '>";
    echo " <table class='table'>";
    echo "<thead>";
    echo "  <tr>";
    echo "    <th>Organ ID</th>";
    echo "    <th>organ Type</th>";
    echo "    <th>Donor ID</th>";
    echo "    <th>Test details</th>";
    echo "    <th>ORDER</th>";
    echo "  </tr>";
    echo " </thead>";
    echo "<tbody>";
    // Fetch data from the database
    $sql = "SELECT * FROM triggerA";
    $result = $link->query($sql);
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Oid"] . "</td>";
        echo "<td>" . $row["Otype"] . "</td>";
        echo "<td>" . $row["Did"] . "</td>";
        echo "<td>" . $row["Test details"] . "</td>";
        echo '<td width:"170"> <form method="POST" action="orderform.php"><input type="submit"  value="Order"/> </form> </td>';
        echo "</tr>";
    }

    echo "</tbody></table>";
}
?>