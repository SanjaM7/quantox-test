<div class="row">

    <div class="col-lg-5">
        <div class="jumbotron center">
            <h3>LOG IN</h3>
            <p>Enter email and password.</p>
            <form action="/controllers/accounts/log_in.php" method="POST">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email...">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password...">
                </div>
                <button type="submit" name="logIn" class="btn btn-primary">Log in</button><br>
            </form>
        </div>
    </div>

    <div class="col-lg-7">
        <?php
        if (isset($params["error"])) :
            $error = $params["error"];

            if ($error) : ?>
                <h4 class="alert alert-dismissible alert-danger">
                    Error logging you in! <br>
                </h4>
        <?php
            endif;
        endif;
        ?>
    </div>

</div>