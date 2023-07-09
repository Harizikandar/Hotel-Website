<?php include("dataconnection.php") ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/admin.css" >
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
    <link rel="stylesheet" type="text/css" href="../css/service.css">
    <link rel="stylesheet" type="text/css" href="../css/sales_report.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <script src="js/index.js"></script>
    <script type="text/javascript">
        function confirmation(){
            let answer;

            answer = confirm("Do you want to delete the selected room? ");
            return answer;
        }
    </script>

    <style>
        table{
            margin: 0 auto;
        }
        th, td{
            margin: 3px 16px;
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
            <h3>Sales Report</h3>

            <table>
                    <tr>
                        <th>Room Name</th>
                        <th>Order Price</th>
                        <th>Total Sales</th>
                     </tr>

                    <?php
                    include("dataconnection.php");

                    $query = "SELECT room_name, total_price FROM room_order";
                    $result = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($result);
                    $grandTotal = 0;

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $grandTotal += $row["total_price"];
                    ?>
                    
                    <tr>
                        <td><?php echo $row["room_name"];?></td>
                        <td><?php echo $row["total_price"];?></td>
                        <td><?php echo "-"?></td>
                    </tr>
                    
                    <?php
                    }
                    ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php echo "RM " .$grandTotal;?></td>
                    </tr>

                </table>    

        </div>
    </div>
</body>
</html>