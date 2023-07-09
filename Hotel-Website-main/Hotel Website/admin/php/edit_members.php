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
            <h2>Edit Members</h2>

                <?php
                if (isset($_GET["edit"])) {
                    include("dataconnection.php");
                    $membersid = $_GET["membersid"];
                    $query = "SELECT * FROM members WHERE 
                                members_id = $membersid";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>

                <form name= "editform" method="post" action>
                    <p>Members Name :<input type="text" name="members_name" size="80" 
                                        value="<?php echo $row["members_name"]; ?>"></p> 
                    <p>Members id:<input type="text" name="members_id" size="10" 
                                        value="<?php echo $row["members_id"]; ?>"></p> 
                    <p>Members Company:<input type="text" name="members_company" size="80" 
                                        value="<?php echo $row["members_company"]; ?>"></p> 
					<p>Members Age :<input type="text" name="members_age" size="10" 
                                        value="<?php echo $row["members_age"]; ?>"></p>
					<p>Shares Value :<input type="text" name="members_shvalue" size="10" 
                                        value="<?php echo $row["members_shvalue"]; ?>"></p>
                                           
                    <p><input type="submit" name="updatebtn" value="Update members">               
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

    $membersName = $_POST["members_name"];
    $membersId = $_POST["members_id"];
    $membersCompany = $_POST["members_company"];
    $membersAge = $_POST["members_age"];
	$membersShvalue = $_POST["members_shvalue"];

    $query = "UPDATE members SET 
                members_name = '$membersName', 
                members_id = '$membersId', 
                members_company = '$membersCompany',
				members_age = '$membersAge',
				members_shvalue = '$membersShvalue',
                WHERE members_id = $membersId";
                
    $result = mysqli_query($connection, $query);
?>
<script>
    alert("Members Successfully Updated");
</script>

<?php
    header("Location: ../php/view_members.php");
            

?>