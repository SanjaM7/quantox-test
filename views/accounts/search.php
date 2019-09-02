
<h3>SEARCH</h3>

<hr class="my-4">

<?php
if (isset($params['search'])) : ?>
<div><b> You have searched for: </b> <?php echo $params['search'] ?> </div>
<?php
endif;

    $accounts = $params['accounts'];

    foreach ($accounts as $account) : ?>
    <?php echo $account->getName() ;?>
    <?php echo $account->getEmail() ;?>
    <br>
<?php endforeach; ?>

