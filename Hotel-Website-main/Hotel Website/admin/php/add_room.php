<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
    <link rel="stylesheet" type="text/css" href="../css/service.css">
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
            <h2>Services</h2>
            <div class="service">
                <h2>Insert New Room</h2>

                <form class="addroom" name="addfrm" method="post" action="php/add_room.php">
                    <p>
                        <label for="room_name">Room Name: </label>
                        <input type="text" name="room_name" size="80"></p>
                    <p>
                        <label for="room_price">Room Price:</label>
                        <input type="text" name="room_price" size="10"></p>
                    <p>
                    <p>
                        <label for="room_summary">Room Summary:</label>
                        <input type="text" name="room_summary" size="500" rows="6" cols="30" style="width: 200px; height: 50px;"></p>
                    <p>
                        <label class="roomCategory" for="room_category">Room Category:</label></p>
                        <select  name="room_category" style="width: 130px">
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                          </select>
                    
                        <input type="submit" name="savebtn" value="Save Room">

                        <a class="button_feature" href="view_room.php">View Lists</a>

                        <a class="button_feature" href="delete_room.php">Delete Room</a>
            
                        <a class="button_feature" href="update_room.php">Update Room</a>
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

    $roomName = $_POST["room_name"];
    $roomPrice = $_POST["room_price"];
    $roomSummary = $_POST["room_summary"];
    $roomCategory = $_POST["room_category"];

    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }else{
        $sql = $connection->prepare("INSERT INTO room(room_name, room_price, room_summary, room_category)
                VALUES(?, ?, ?, ?)");
        $sql->bind_param("siss", $roomName, $roomPrice, $roomSummary, $roomCategory);
        $sql->execute();
        //echo "Registration successul";
        $sql->close();
        $connection->close();
    }

    

    
?>
