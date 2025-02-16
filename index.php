<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Project</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body class="bg-primary">
    <div class="container text-center mt-4">    
        <div class="row">
            <div class="col-md-12">
            <img src="IMG_8969 (1).jpg" alt="" class="mb-3">
            <h1>EVENT SIGN UP LIST</h1>
            <p class="mb-4">enter participants information below</p>
            <?php
                if(isset($_GET['message'])){
                    if($_GET['message'] == "add_user"){
                        echo "<div class='alert alert-success mb-3' style='border-radius:60px; padding:10px;'>
                        <strong>{$_GET['firstname']} {$_GET['lastname']}</strong> has been signed up!
                        </div>";
                    }
                }
                        
                if(isset($_GET['message'])){
                    if($_GET['message'] == "delete_user"){
                        echo "<div class='alert alert-danger mb-3' style='border-radius:60px; padding:10px;'>
                        <strong>{$_GET['firstname']} {$_GET['lastname']}</strong> has been removed from event.
                        </div>";
                    }
                }
                        
            ?>

            <form action="add_user.php" method="post">
                <input type="text" name="firstname" placeholder="First Name" class="text-center" required>
                <br>
                <input type="text" name="lastname" placeholder="Last Name" class="text-center" required> 
                <br>
                <input type="email" name="email" placeholder="Email Address" class="text-center" required>
                <br>
                <button type="submit" class="submit_btn">SIGN UP</button>
            </form>

          
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "coding_bootcamp";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM php_form_project";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row            <table class="table table-striped">
                ?>
            <table class="table table-striped">
                <tr class="table-dark">
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL</th>
                <th>DELETE</th>
                </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                ?>

            <tr>
                <td><?=$row['firstname']?></td>
                <td><?=$row['lastname']?></td>
                <td><?=$row['email']?></td>
                <td>
                    <form action="delete_user.php" method="post">
                        <input type="hidden" name="firstname" value="<?=$row['firstname']?>">
                        <input type="hidden" name="lastname" value="<?=$row['lastname']?>">
                        <button class="btn btn-sm btn-danger" type="submit" name="delete_btn" value="<?=$row['id']?>">X</button>
                    </form>
                </td>
            </tr>
            
            <?php
                }
                } 
                mysqli_close($conn);
                ?>

            </table>
        </div>
    </div>
</div>

</body>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>