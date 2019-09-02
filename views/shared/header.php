<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <a class="navbar-brand title">Quantox</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarColor03" style="">
        <ul class="navbar-nav mr-auto">
            <?php if ($context->isLoggedIn) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="/controllers/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <form action="/controllers/accounts/search.php" method="POST" class="form-inline my-2 my-lg-0">
                <input type="text" name="search" placeholder="Enter name to search for..." class="form-control mr-sm-2">
                <button type="submit" class="btn btn-secondary my-2 my-sm-0">Search</button>
            </form>
            <?php endif; ?>
        </ul>

        <?php if ($context->isLoggedIn) : ?>
        <form action="/controllers/accounts/log_out.php" method="POST" class="form-inline my-2 my-lg-0">
            <button type="submit" name="logOut" class="btn btn-danger my-2 my-sm-0">Log out</button>
        </form>
        <?php else : ?>
        <div><a href="/controllers/accounts/register.php" class="mr-sm-2">Register</a></div>
        <div><a href="/controllers/accounts/log_in.php" class="mr-sm-2">Log in</a></div>
        <?php endif; ?>
    </div>

</nav>