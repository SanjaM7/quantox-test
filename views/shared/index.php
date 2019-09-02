<?php if (!($context->isLoggedIn)) : ?>
    <div class="jumbotron center">
        <h4>Please register or log in </h4>
    </div>
<?php endif; ?>

<?php
if (isset($_GET['register'])) :
    if ($_GET['register'] == "success") : ?>
        <h4 class="alert alert-dismissible alert-success">Your account has been created and you can now log in.</h4>
    <?php
        endif;
    endif;
    if (isset($_GET['logIn'])) :
        if ($_GET['logIn'] == "success") : ?>
        <h4 class="alert alert-dismissible alert-success">You are now signed in.</h4>
    <?php
        endif;
    endif;
    if (isset($_GET['logOut'])) :
        if ($_GET['logOut'] == "success") : ?>
        <h4 class="alert alert-dismissible alert-success">You successfully logged out.</h4>
<?php
    endif;
endif;
?>

<?php if ($context->isLoggedIn) : ?>
    <div class="jumbotron center">
        Welcome,
        <?php
            echo $context->name;
            ?>
    </div>
<?php endif; ?>