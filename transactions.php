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
</head>
<body align='center'>
    <h1 align='center'>Transaction History</h1>
    <table align='center' bgcolor='cyan' border=5 cellapdding=3 cellspacing=3>
        <thead>
            <tr>
                <th>SNO</th>
                <th>SENDER</th>
                <th>RECIVER</th>
                <th>AMOUNT</th>
                <th>DATE & TIME</th>
            </tr>
        </thead>
        <tbody>
            <?php while($res = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $res['sno']; ?></td>
                <td><?php echo $res['sender']; ?></td>
                <td><?php echo $res['reciver']; ?></td>
                <td><?php echo $res['amount']; ?></td>
                <td><?php echo $res['date_time']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>