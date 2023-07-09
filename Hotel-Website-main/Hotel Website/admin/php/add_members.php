<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
    <link rel="stylesheet" type="text/css" href="../css/Members.css">
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
                <h2>Add New Members</h2>

                <form class="addmembers" name="addmembers" method="post" action="view_members.php">
                    <p>
                        <label for="members_name">Members Name: </label>
                        <input type="text" name="members_name" size="80"></p>
                    <p>
                        <label for="members_id">Members id:</label>
                        <input type="text" name="members_id" size="10"></p>
                    <p>
					<p>
                        <label for="members_company">Members Company: </label>
                        <input type="text" name="members_company" size="80"></p>
                    <p>
					<p>
                        <label for="members_age">Members Age: </label>
                        <input type="text" name="members_age" size="10"></p>
                    <p>
					<p>
                        <label for="members_shvalue">Shares Value: </label>
                        <input type="text" name="members_shvalue" size="10"></p>
                    
                    
                        <input type="submit" name="addbtn" value="Add">

                        <a class="membersbtn" href="view_members.php">View Members</a>

                        <a class="membersbtn" href="delete_members.php">Delete Members</a>
            
                        <a class="membersbtn" href="update_members.php">Update Members</a>
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

    $membersName = $_POST["members_name"];
    $membersId = $_POST["members_id"];
    $membersCompany = $_POST["members_company"];
    $membersAge = $_POST["members_age"];
	$membersShvalue = $_POST["members_shvalue"];


    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }else{
        $sql = $connection->prepare("INSERT INTO members(members_name, members_id, members_company, members_age, members_shvalue)
                VALUES(?, ?, ?, ?, ?)");
        $sql->bind_param("sisii", $membersName, $membersId, $membersCompany, $membersAge, $membersShvalue);
        $sql->execute();
        //echo "Registration successul";
        $sql->close();
        $connection->close();
    }

    

    
?>
