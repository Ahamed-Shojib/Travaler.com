<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container" id="nav_bar">
        <a class="navbar-brand" href="../index.php" id="logo"><span>T</span>ravaler</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto"></ul>
            <!-- Display User First Name in Navbar -->
            <span class="navbar-text mx-2">Hello, <?php echo $user['first_name']; ?>!</span>
            <a class="btn btn-outline-danger mx-2 my-2" href="user_logout.php">Logout</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->