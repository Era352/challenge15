<?php
require_once("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"]=="ADD"){
    $username = $_ADD['Title'];
    $username = $_ADD['Description'];
    $username = $_ADD['Quantity'];
    $username = $_ADD['Price'];
    $password = md5($_ADD['password']);//Hash the password

    //Query to chec admin credentials
    $sql = "SELECT * FROM admin WHERE title = '$Title', Description = '$Description', Qunatity = '$Qunatity', Price = '$Price' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows==1){
        $_SESSION['admin_added']= true;
        header("Location: admin.php");
        exit();
    }else{
        $error = "Invalid Product";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Background gradient for the entire page */
        body {
            background: linear-gradient(135deg, #66785F, white);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Center card with smooth edges and gradient border */
        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px #C08261;
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        .card:hover {
            border-image: linear-gradient(to right, #66785F, #B2C9AD) 1;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Stylish buttons */
        .btn-primary {
            background: linear-gradient(to right, #E1C78F, #B0926A);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #E1C78F, #B0926A);
            transform: scale(1.05);
        }

        /* Links with hover effect */
        a {
            color: #FAE7C9;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #4B5945;
        }

        /* Inputs styling */
        input.form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input.form-control:focus {
            border-color: #C08261;
            box-shadow: 0 0 8px #E2C799;
        }

        /* Title */
        h2 {
            color: #4B5945;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Add</h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="add.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="product" name="product" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">ADD</button>
        </form>
    </div>
</body>
</html>
