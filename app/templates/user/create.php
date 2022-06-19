<?php
require "./../user/create.php";
// session_start();
// if (!isset($_SESSION['count'])) {
//     $_SESSION['count'] = 0;
// } else {
//     $_SESSION['count']++;
// }
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $insert = new User();
    $insert->addUser($name, $username,$email,$phone,$password);
    $_SESSION["flash"] = ["type" => "success", "message" => "User successfully created"];
    header("Location:" . "./../index.php");
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
    

    <div class="jumbotron">
    <h2>Create an User </h2>

        <form method="post">
            <div class="form-group">
                <label for="name">User name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter Full name">
            </div>
            <div class="form-group">
                <label for="username">username</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="username for your user">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="email address for your user">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" type="number" class="form-control" id="phone" placeholder="phone number for your user">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="password for your user">
            </div>
            <div class="form-group">
                <label for="cpassword">confirm password</label>
                <input name="cpassword" type="password" class="form-control" id="cpassword" placeholder="comfirm password for your user">
            </div>

            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        </form>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <div class="navbar-nav">
                        <a href="index.php">View all users</a><br>
                    </div>
            </nav>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>