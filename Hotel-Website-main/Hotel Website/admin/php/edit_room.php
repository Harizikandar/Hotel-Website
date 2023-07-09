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
            <h2>Edit Room</h2>

                <?php
                if (isset($_GET["edit"])) {
                    include("dataconnection.php");
                    $roomid = $_GET["roomid"];
                    $query = "SELECT * FROM room WHERE 
                                room_id = $roomid";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>

                <form name= "editform" method="post" action>
                    <p>Room Name :<input type="text" name="room_name" size="80" 
                                        value="<?php echo $row["room_name"]; ?>"></p> 
                    <p>Room Price:<input type="text" name="room_price" size="80" 
                                        value="<?php echo $row["room_price"]; ?>"></p> 
                    <p>Room Summary:<textarea row="5" col="60" name="room_summary"
                                        value="<?php echo $row["room_summary"]; ?>"></textarea></p>
                    <p>Room Category:
                        <select  name="room_category" style="width: 130px">
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                          </select></p>                       
                    <p><input type="submit" name="updatebtn" value="Update room">               
                </form>
                <?php

                }
                ?>
        </div>
    </div>
</body>
</html>

<?php 
if(isset($_POST["updatebtn"])){

    $roomName = $_POST["room_name"];
    $roomPrice = $_POST["room_price"];
    $roomSummary = $_POST["room_summary"];

    $query = "UPDATE room SET 
                room_name = '$roomName', 
                room_price = '$roomPrice', 
                room_summary = '$roomSummary'
                WHERE room_id = $roomid";

    $result = mysqli_query($connection, $query);
?>
<script>
    alert("Room Successfully Updated");
</script>

<?php
    header("Location: ../php/view_room.php");
}

?>