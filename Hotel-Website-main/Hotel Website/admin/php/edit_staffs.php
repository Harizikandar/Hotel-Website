<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/admin.css" >
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
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
            <h2>Edit Staffs</h2>

                <?php
                if (isset($_GET["edit"])) {
                    include("dataconnection.php");
                    $staffsid = $_GET["staffsid"];
                    $query = "SELECT * FROM staffs WHERE 
                                staffs_id = $staffsid";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>

                <form name= "editform" method="post" action>
                    <p>Staffs Name :<input type="text" name="staffs_name" size="80" 
                                        value="<?php echo $row["staffs_name"]; ?>"></p> 
                    <p>Staffs id:<input type="text" name="staffs_id" size="10" 
                                        value="<?php echo $row["staffs_id"]; ?>"></p> 
                    <p>Staffs Role:<input type="text" name="staffs_role" size="80" 
                                        value="<?php echo $row["staffs_role"]; ?>"></p> 
					<p>Staffs Age :<input type="text" name="staffs_age" size="10" 
                                        value="<?php echo $row["staffs_age"]; ?>"></p>
					<p>Salary :<input type="text" name="staffs_salary" size="10" 
                                        value="<?php echo $row["staffs_salary"]; ?>"></p>
                                           
                    <p><input type="submit" name="updatebtn" value="Update staffs">               
                </form>
                <?php

                }
                ?>
        </div>
    </div>
</body>
</html>

<?php 
if(isset($_POST["updatebtn"]))

    $staffsName = $_POST["staffs_name"];
    $staffsId = $_POST["staffs_id"];
    $staffsRole = $_POST["staffs_role"];
	$staffsAge = $_POST["staffs_age"];
	$staffsSalary = $_POST["staffs_salary"];

    $query = "UPDATE staffs SET 
                staffs_name = '$staffsName', 
                staffs_id = '$staffsId', 
                staffs_role = '$staffsRole',
				staffs_age = '$staffsAge',
				staffs_salary = '$staffsSalary',
                WHERE staffs_id = $staffsId";
                
    $result = mysqli_query($connection, $query);
?>
<script>
    alert("Staffs Successfully Updated");
</script>

<?php
    header("Location: ../php/view_staffs.php");
            

?>