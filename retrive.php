<?php
    $con = mysqli_connect('localhost','root','','bank_of_yash');
    $sql = 'SELECT * FROM customers';

    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
    <?php include "navbar.php"; ?>
    <h3 align='center'>Cutsomer Details:</h3>
    <br>
    <table class='table table-hover table-striped table-light'  align='center' >
        <thead align='center'> 
            
            <tr class='table1'>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody >
           <?php while($res = $result->fetch_assoc()){ ?>
                <tr class ='text-secondary'>
                    <form action="transfer.php" method='get'>
                    <input type='hidden' name='id' value="<?php echo $res['id']; ?>">
                    <td><?php echo $res['id']; ?></td>
                    <td><?php echo $res['name']; ?></td>
                    <td><?php echo $res['email']; ?></td>
                    <td><?php echo $res['balance']; ?></td>
                    <td><input type='submit' value='Transfer' name='choice' class='btn btn-info'></td>
                    </form>
                </tr>
            <?php } ?>
        </tbody>
        
    </table>
    
</html>