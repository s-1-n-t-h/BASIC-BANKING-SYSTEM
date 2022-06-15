<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <?php include 'navbar.php' ?>
    <h3 align='center'>Welcome to</h3>
    <h1 align='center'>Bank Of Yash</h1>

   <section align='center'>
       <div>
            <form action="retrive.php" method='POST'>
                <input type="submit" value='View All Customers'>
            </form>
       </div>
   </section>
</body>
</html>