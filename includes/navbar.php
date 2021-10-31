<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow">
    <button id="sidebarCollapse" type="button" class="btn btn-dark mr-3"><i class="bi bi-list"></i></button>
   
    <a href="?p=home"><img src="https://img.swapcard.com/?u=https%3A%2F%2Fcdn-api.swapcard.com%2Fpublic%2Fimages%2F375084d7f1694c8494cf1683b09374aa.png&q=0.8&w=400&h=200&m=fit" class="nav-logo logo" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        if (empty($user)) {
        ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3">
                    <a href="#" class="nav-link font-weight-bold ">Register</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="?p=login" class="btn btn-dark my-2 my-sm-0">Login</a>
                </li>
            </ul>
        <?php
        } else {
        ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3">
                    <a class="nav-link font-weight-bold text-uppercase">Welcome: <?php echo $user; ?></a>
                </li>
                <li class="nav-item ml-3">
                    <a class="btn btn-dark my-2 my-sm-0" href="logout.php">Log out</a>
                </li>
            </ul>
        <?php
        }
        ?>

    </div>
</nav>