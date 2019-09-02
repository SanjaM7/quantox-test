<div class="row">

    <div class="col-lg-5">
        <div class="jumbotron center">
            <h3>REGISTER</h3>
            <p>It’s quick and easy.</p>
            <form action="/controllers/accounts/register.php" method="POST">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name...">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email...">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password...">
                </div>
                <div class="form-group">
                    <input type="password" name="passwordRepeat" class="form-control" placeholder="Repeat password...">
                </div>
                <button type="submit" name="register" class="btn btn-primary">Register</button><br>
            </form>
        </div>
    </div>

    <div class="col-lg-7">
        <?php
        if (isset($params["errors"])) :
            $errors = $params["errors"];
            $errorMessages = array(
                AccountError::InvalidName => "Invalid name!",
                AccountError::InvalidEmail => "Invalid e-mail!",
                AccountError::InvalidPassword => "Invalid password!",
                AccountError::InvalidPasswordRepeat => "Your passwords do not match!",
                AccountError::EmailTaken => "You already have account, log in"
            );

            foreach ($errors as $errorCode) : ?>
        <h4 class="alert alert-dismissible alert-danger">
            <?php echo $errorMessages[$errorCode] . "<br>"; ?>
        </h4>
        <?php
            endforeach;
        endif;
        ?>
    </div>

</div>