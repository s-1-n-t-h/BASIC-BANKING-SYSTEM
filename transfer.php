<?php
$con = mysqli_connect('localhost','root','','bank_of_yash');
$id = $_GET['id'];
$sql = 'SELECT * FROM customers WHERE id = '.$id;
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);
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
    <h1 align='center'>Selected User Details:</h1><br><br>
    <form action='afterTransfer.php' method='get'>
        <input type="hidden" name="senderID" value="<?php echo $row['id'] ?>" >
    <table border='2px' bgcolor='plum' cellpadding='3px' cellspacing='3px'  align='center' >
        <thead align='center'>
            
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
            </tr>
        </thead>
        <tbody align='center'>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                </tr>
        </tbody>
    </table>
<br><br><br>
    <label><b>Transfer To: </b></label>
        <?php 
            $sql = "SELECT id,name from customers";
            $result = $con->query($sql);
        ?>
        <select name="reciverID" required>
            <option value="" disabled selected >Choose</option>
            <?php while($res = $result->fetch_assoc()){ ?>
            <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
            <?php } ?>
        </select>
        <br><br>
    <label>Amount:</label>
    <input type="number" name="amount">
    <input type="submit" value="Transfer Money">
    </form>
</body>
</html>

