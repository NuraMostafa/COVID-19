<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

require_once("connect.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark primary-color" style="background-color: blue;">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Virtual covid detector</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">

            <?php if (isset($_SESSION['userID'])) {
              if ($_SESSION['userType'] == "Doctor") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-user-circle"></i> Users</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" class="w3-bar-item w3-button"><i
                                class="fa fa-registered"></i> Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fa fa-user"></i> Login</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

