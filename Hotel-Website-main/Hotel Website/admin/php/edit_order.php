<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/admin.css" >
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
    <link rel="stylesheet" type="text/css" href="../css/order.css">
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
            <h2>Edit Order</h2>

                <?php
                if (isset($_GET["edit"])) {
                    include("dataconnection.php");
                    $orderid = $_GET["orderid"];
                    $query = "SELECT * FROM room_order WHERE 
                                order_id = $orderid";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>

                <form name= "editform" method="post" action>
                    <p>Room Name :     <input type="text" name="room_name" size="80" 
                                        value="<?php echo $row["room_name"]; ?>"></p> 
                    <p>Check in date:  <input type="date" name="date_in" 
                                        value="<?php echo $row["date_in"]; ?>"></p>
                    <p>Check out date: <input type="date" name="date_out" 
                                        value="<?php echo $row["date_out"]; ?>"></p>
                    <p>Room Price (RM):<input type="text" name="room_price" size="10"
                                        value="<?php echo $row["total_price"]; ?>"></p>
                    
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
    $checkIn = $_POST["date_in"];
    $checkOut = $_POST["date_out"];
    $room_price = $_POST["room_price"];
    $format = "d/m/Y";

    $date_in = new DateTime($checkIn);
    $date_out = new DateTime( $checkOut);

    $day_interval = $date_in->diff($date_out);
    $total_days = $day_interval->days;
    $totalPrice = 0;
    $totalPrice = $room_price * $total_days;

    $query = "UPDATE room_order SET 
                room_name = '$roomName', 
                date_in = '$checkIn', 
                date_out = '$checkOut',
                total_price = '$totalPrice'
                WHERE order_id = $orderid";

    $result = mysqli_query($connection, $query);
?>
<script>
    alert("Room Successfully Updated");
</script>

<?php
    header("Location: ../php/view_order.php");
}

?>