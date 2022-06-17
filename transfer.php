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
    <title>Selected User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body align='center' style="background-image: url('rupee.png');  background-repeat: no-repeat; background-size: auto;font-size:20px; ">
    <?php include 'navbar.php'; ?>
    <h2 align='center' class='display-5' style="color:white; padding-top:30px;">Selected User Details:</h2><br><br>
    <form class='form-inline' action='afterTransfer.php' method='get'>
        <input type="hidden" name="senderID" value="<?php echo $row['id'] ?>" >
    <div class="col-auto my-1">
        <table class='table '  align='center' border=1 >
        <thead align='center'>
            
            <tr style="color:white" >
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
            </tr>
        </thead>
        <tbody align='center'>
                <tr style="color:white; font-size:20px;">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                </tr>
        </tbody>
    </table>
    </div>
<br><br><br>
    <label  class="mr-sm-2" ><h6><b style="color:black">Transfer To:</b></h6></label>
    <?php 
        $sql = "SELECT id,name from customers";
        $result = $con->query($sql);
    ?>
    <select class="form-control" style='background-color:#e6e6e6' name="reciverID" required >
        <option value="" disabled selected >Choose</option>
        <?php while($res = $result->fetch_assoc()){ ?>
        <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
        <?php } ?>
    </select>
<br><br><br>
    <label  class="mr-sm-2"><h6><b style="color:black" >Amount:</b></h6></label>
    <input class='form-control' type="number" name="amount" style='background-color:#e6e6e6' required > 
    <br>
    <div class='text-center'>
        <input align='center' class='btn btn-warning my-1 mt-3' type="submit" value="Transfer Money">
    </div>
    
    </form>
</body>
</html>

