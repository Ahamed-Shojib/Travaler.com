<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container" id="nav_bar">
        <a class="navbar-brand" href="../index.php" id="logo"><span>T</span>ravaler</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
        </button>
    </div>
    <div style="text-align: right;" class="collapse navbar-collapse" id="mynavbar">
        <?php if (!empty($user_first_name)): ?>
        <a href="../cart/cart.php" class="btn btn-outline-warning mx-2 my-2"><i class="bi p-2 bi-cart"></i></a>
        <span class="navbar-text mx-2">Hi, <?php echo $user_first_name; ?></span>
        <a class="btn btn-outline-danger mx-2 my-2" href="../User/logout.php">Logout</a>
        <?php else: ?>
        <a class="btn btn-outline-primary mx-2 my-2" href="../User/user_login.php">Log In</a>
        <?php endif; ?>
    </div>
</nav>
<!-- Navbar End -->