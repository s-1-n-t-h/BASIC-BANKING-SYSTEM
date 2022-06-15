<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align='center'>
    <?php

        $con = mysqli_connect('localhost','root','','bank_of_yash');
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
    <h1 align='center'>
    <?php 

        if (($senderBalance < $amount) or ($amount <= 0)) {
            echo "Insufficient Balance or Invalid Amount";
        }
        else{
            
            $newBal1 = $row1['balance'] - $amount;
            $newBal2 = $row2['balance'] + $amount;

            $sql1 = "UPDATE customers SET balance=$newBal1 where id=$sid";
            $sql2 = "UPDATE customers SET balance=$newBal2 where id=$rid";

            $res1 = $con->query($sql1);
            $res2 = $con->query($sql2);

            echo "Money Transferred Successfully";
        }

    ?>
    </h1>

    <?php 

        $sname = $row1['name'];
        $rname = $row2['name'];
        $sql = "INSERT INTO transactions (`sender`, `receiver`, `amount`) VALUES ('$sname','$rname','$amount')";
        $res = $con->query($sql);

    ?>

    <form action="retrive.php" method="get">
        <input type="submit" value="Viewl all Coustomers">
    </form>
    <br><br>
    <form action="transactions.php" method="get">
        <input type="submit" value="View Transactions">
    </form>

</body>
</html>