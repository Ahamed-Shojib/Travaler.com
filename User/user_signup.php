<?php
require('../conn.php');

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $uniq_id = mt_rand(100, 1000);

    $sql = " INSERT INTO users(id,first_name,last_name,email,password,mobile) VALUES ('$uniq_id','$firstName','$lastName','$email','$new_password','$phone')";
    if (($new_password == $confirm_password)) {
        $conn->query($sql);
        $Insert_msg = " Data Inserted Successfully!";
    } else {
        $Insert_msg_error = "Sorry! Data Not Inserted.(Password Not Matched!)";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveler Sign Up</title>
    <?php
    include('../re_use/links.php');
    ?>

</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container" id="nav_bar">
            <a class="navbar-brand" href="../index.php" id="logo"><span>T</span>ravaler</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="alert">
        <center>
            <div class="text-center h4 text-success mt-4" id="inserted_uccess">
                <strong><?php if (isset($_POST['submit']) && ($new_password == $confirm_password)) {
                            echo $Insert_msg;
                        } ?></strong>
            </div>
            <div class="text-center h4 text-danger mt-4" id="inserted_error">
                <strong><?php if (isset($_POST['submit']) && ($new_password != $confirm_password)) {
                            echo $Insert_msg_error;
                        } ?></strong>
            </div>
        </center>
    </div>

    <div class="container" id="sign">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center my-2"><a href="../index.php">Sign Up</a></h4>
                    </div>
                    <form action="#" method="post">
                        <label class="my-2" for="first-name">First
                            Name:</label>
                        <input class="form-control" type="text" name="firstname" id="first-name"
                            placeholder="First Name" required>

                        <label class="my-2" for="last-name">Last
                            Name:</label>
                        <input class="form-control" type="text" name="lastname" id="last-name" placeholder="Last Name"
                            required>

                        <label class="my-2" for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="example@mail.com"
                            required>

                        <label class="my-2" for="phone">Phone:</label>
                        <input class="form-control" type="tel" name="phone" id="phone" placeholder="123-456-7890"
                            required>

                        <label class="my-2" for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password"
                            placeholder="* * * * * * * * *" required>

                        <label class="my-2" for="confirm-password">Confirm
                            Password:</label>
                        <input class="form-control" type="password" name="confirm_password" id="confirm-password"
                            placeholder="* * * * * * * * *" required>

                        <input class="btn btn-outline-primary my-3" type="submit" name="submit" onclick="success_msg()"
                            value="Sign Up">

                        <label class="my-4 mx-2 text-primary" for="login">Already have an account?<a class="text-danger"
                                style="margin-left:5px; color:rgb(13, 129, 197);" href="user_login.php"> Log
                                In</a></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <?php
    include('../re_use/footer.php');
    ?>
    <!-- Footer End -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>