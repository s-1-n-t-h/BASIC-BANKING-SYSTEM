<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body align='center' style="background-image: url('rupee.png');  background-repeat: no-repeat; background-size: auto; ">
    <?php

        $con = mysqli_connect('localhost','','','');
        $rid = $_GET['reciverID'];
        $sid = $_GET['senderID'];
        $amount = $_GET['amount'];

        $sql1 = "SELECT * FROM customers where id = $sid";
        $sql2 = "SELECT * FROM customers where id = $rid";

        $res1 = $con->query($sql1);
        $res2 = $con->query($sql2);

        $row1 = mysqli_fetch_assoc($res1);
        $row2 = mysqli_fetch_assoc($res2);

        $senderBalance = $row1['balance'];

    ?>
    <h1 align='center' class='display-5' style='padding-top:250px; color:white;'>
    <?php 

        if (($senderBalance < $amount) or ($amount <= 0)) {
            echo "Insufficient Balance or Invalid Amount ! Try Again.";
        }
        else{
            
            $newBal1 = $row1['balance'] - $amount;
            $newBal2 = $row2['balance'] + $amount;

            $sql1 = "UPDATE customers SET balance=$newBal1 where id=$sid";
            $sql2 = "UPDATE customers SET balance=$newBal2 where id=$rid";

            $res1 = $con->query($sql1);
            $res2 = $con->query($sql2);

           
            $sname = $row1['name'];
            $rname = $row2['name'];
            $sql = "INSERT INTO transactions (`sender`, `reciver`, `amount`) VALUES ('$sname', '$rname', '$amount')";
            $res = $con->query($sql);

            echo "Money Transferred Successfully !!";
        }

    ?>
    </h1>

    <div style='padding-top:15px; padding-bottom:15px;'>
        <form action="retrive.php" method="get" class='text-center'style='padding-top:15px; padding-bottom:15px;' >
            <input align='center' class='btn btn-warning my-1 mt-3' value="View Coustomers" type="submit">
        </form>
         <form action="transactions.php" method="get" class='text-center' style='padding-top:15px; padding-bottom:15px;'>
            <input align='center' class='btn btn-warning my-1 mt-3' type="submit" value="View Transactions">
        </form>
    </div>
</body>
</html>