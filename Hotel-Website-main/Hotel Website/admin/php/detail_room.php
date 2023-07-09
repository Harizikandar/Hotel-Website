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

    <style>
        #admindash p{
            margin: 10px 10px;
        }
        #view_list {
            margin: 5px;
            padding: 5px;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            color: #312f2f;
            background-color: whitesmoke;
        }

        #view_list:hover{
            padding: 0 5px;
            color: whitesmoke;
            background-color: #818181;
            text-align: center;
            border-radius: 5px;
            transition-duration: 0.5s;
        }
    </style>
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
            <h2>Room Details</h2>

                <?php
                include("dataconnection.php");

                if(isset($_GET["roomid"])){
                    $roomid = $_GET["roomid"];
                    $query = "SELECT * FROM room WHERE 
                                room_id = $roomid";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);

                    echo "<p>";
                    echo "<br>ID: ";
                    echo $row["room_id"];
                    echo "<br><p>Room Name: ";
                    echo $row["room_name"];
                    echo "<br><p>Room Price: ";
                    echo "RM".number_format($row["room_price"], 2);
                    echo "<br><p>Room Category: ";
                    echo $row["room_category"];
                    echo "<br><p>Room Sumary: <br>";
                    echo $row["room_summary"];
                    echo "</p><br>";
                }
                ?>
                <a id="view_list" class="button_feature" href="view_room.php">View Lists</a>
        </div>
    </div>
</body>
</html>