<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
    <link rel="stylesheet" type="text/css" href="../css/Staffs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        input[type=submit]{
            margin: 15px;
            padding: 5px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            color: #312f2f;
            background-color: whitesmoke;
            cursor: pointer;
            font-size: large;
            font-style: normal;
        }

        input[type=submit]:hover{
            font-size: large;
            margin: 10px;
            padding: 5px 5px;
            color: whitesmoke;
            background-color: #818181;
            text-align: center;
            border-radius: 5px;
            transition-duration: 0.5s;
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <script src="js/index.js"></script>
</head>

<body>
    <header>
        <h2>Ohio Hotel</h2>
    </header>

    <div class="sidebar">
        <a href="../admin.html"><i class="fa fa-fw fa-home"></i> Admin</a>
        <a href="../service.html"><i class="fa-solid fa-bed"></i> Services</a>
        <a href="../staffs.html"><i class="fa fa-fw fa-user"></i> Staffs</a>
        <a href="../members.html"><i class="fa-solid fa-user-tie"></i> Member</a>
        <a href="../order.html"><i class="fa-solid fa-cart-shopping"></i> Order</a>
    </div>

    <div class="main">
        <div id="admindash">
            <h1><i class="fa-solid fa-user"></i>Admin Dashboard</h1>
            <h2>Staffs</h2>
            <div class="service">
                <h2>Add New Staffs</h2>

                <form class="addstaffs" name="addstaffs" method="post" action="php/add_staffs.php">
                    <p>
                        <label for="staffs_name">Staffs Name: </label>
                        <input type="text" name="staffs_name" size="80"></p>
                    <p>
                        <label for="staffs_id">Staffs id:</label>
                        <input type="text" name="staffs_id" size="10"></p>
                    <p>
					<p>
                        <label for="staffs_role">Staffs Role: </label>
                        <input type="text" name="staffs_role" size="80"></p>
                    <p>
					<p>
                        <label for="staffs_age">Staffs Age: </label>
                        <input type="text" name="staffs_age" size="10"></p>
                    <p>
					<p>
                        <label for="staffs_salary">Salary: </label>
                        <input type="text" name="staffs_salary" size="10"></p>
                    
                    
                        <input type="submit" name="addbtn" value="Add">

                        <a class="staffsbtn" href="view_staffs.php">View Staffs</a>

                        <a class="staffsbtn" href="delete_staffs.php">Delete Staffs</a>
            
                        <a class="staffsbtn" href="update_staffs.php">Update Staffs</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    $connection = new mysqli("localhost", "root", "", "hotel");
    //echo "Connection successful";

    $staffsName = $_POST["staffs_name"];
    $staffsId = $_POST["staffs_id"];
    $staffsRole = $_POST["staffs_role"];
    $staffsAge = $_POST["staffs_age"];
	$staffsSalary = $_POST["staffs_salary"];


    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }else{
        $sql = $connection->prepare("INSERT INTO staffs(staffs_name, staffs_id, staffs_role, staffs_age, staffs_salary)
                VALUES(?, ?, ?, ?, ?)");
        $sql->bind_param("sisii", $staffsName, $staffsId, $staffsRole, $staffsAge, $staffsSalary);
        $sql->execute();
        //echo "Registration successul";
        $sql->close();
        $connection->close();
    }

    

    
?>
