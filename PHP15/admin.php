<?php
session_start();
if(!isset($_SESSION['admin_added'])){
    header("Location: add.php");
    exit();
};

require_once("config.php");
//Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if(!$result){
    die("Database query failed: ".$conn->error);
}
?>

<?php require_once("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        /* Background gradient for the entire page */
        body {
            background: linear-gradient(135deg, #C08261, white);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Container for table */
        .content-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px #E2C799;
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        .content-container:hover {
            border-image: linear-gradient(to right, #66785F, #B2C9AD) 1;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Stylish table */
        table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #F2ECBE;
            color: white;
        }

        /* Buttons */
        .btn-warning {
            background: #B0926A;
            border: none;
            color: #E1C78F;
            transition: all 0.3s ease;
            color:white;
        }

        .btn-warning:hover {
            background: linear-gradient(to right, #66785F, black);
            transform: scale(1.05);
            color:white;
        }

        .btn-danger {
            background: #66785F;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background: linear-gradient(to right, #66785F, black);
            transform: scale(1.05);
        }

        /* Table hover effect */
        tbody tr:hover {
            background-color: #f2f2f2;
            transition: background-color 0.3s ease;
        }

        /* Title styling */
        h2 {
            color: #E4C59E;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="content-container">
            <h2>Manage Users</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                //Check if there are any users
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>".htmlspecialchars($row['Title'])."</td>
                                <td>".htmlspecialchars($row['Description'])."</td>
                                <td>"htmlspecialchars($row['Qunatity'])."</td>
                                <td>"htmlspecialchars($row['Price'])."</td>
                                <a href = 'edit.php?id={$row['id']}' class = 'btn btn-warning btn-sm'>Edit</a>
                                <a href = 'delete.php?id={$row['id']}' class = 'btn btn-warning btn-sm'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else{
                    echo "<tr><td colspan = '4' class = 'text-center'> No users found </td> </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php require_once("footer.php"); ?>
</html> 