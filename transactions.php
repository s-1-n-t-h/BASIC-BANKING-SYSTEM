<?php 
    $con = mysqli_connect('localhost','root','','bank_of_yash');
    $sql = "SELECT * FROM transactions";
    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body align='center' style="background-image: url('rupee.png');  background-repeat: no-repeat; background-size: auto; ">
    <?php include 'navbar.php' ?>
    <h1 align='center' class='display-6' style='padding-top:25px; padding-bottom:25px; color:white;'>Transaction History</h1>
    <table align='center' class='table '  align='center' border=1 >
        <thead>
            <tr style="color:white">
                <th>SNO</th>
                <th>SENDER</th>
                <th>RECIVER</th>
                <th>AMOUNT</th>
                <th>DATE & TIME</th>
            </tr>
        </thead>
        <tbody>
            <?php while($res = $result->fetch_assoc()) { ?>
            <tr style="color:white">
                <td><?php echo $res['sno']; ?></td>
                <td><?php echo $res['sender']; ?></td>
                <td><?php echo $res['reciver']; ?></td>
                <td><?php echo $res['amount']; ?></td>
                <td><?php echo $res['date_time']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <form action="index.php" method="get" class='text-center' style='padding-top:15px; padding-bottom:15px;'>
        <input align='center' class='btn btn-warning my-1 mt-3' type="submit" value="HOME">
    </form>
</body>
</html>