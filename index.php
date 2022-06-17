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
<body style="background-image: url('rupee.png');  background-repeat: no-repeat; background-size: auto; ";>

    <?php include 'navbar.php' ?>
    <div style="padding-top:100px">
        <h3 align='center' class="display-3 font-weight-normal text-warning">Welcome To</h3>
        <h1 align='center' class="display-1 font-weight-normal text-warning">Bank Of Yash</h1>

        <section align='center'>
            <div>
                <form action="retrive.php" method='POST' class='text-center'>
                <input type="submit" class='btn btn-warning my-1 mt-3' value='View All Customers'>
                </form>
            </div>
        </section>
    </div>
</body>
</html>