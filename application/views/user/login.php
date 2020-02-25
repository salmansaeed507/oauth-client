<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="col-md-4 well col-md-offset-4" style="margin-top:10%;">
    <?php
    $error = Auth()->error();
    if (!empty($error)) {
        ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php
    }
    ?>
    <form method="post" action="<?php echo site_url('user/post'); ?>">
        <h3>Login</h3>
        <p><input type="text" name="username" class="form-control" placeholder="Username"></p>
        <p><input type="password" name="password" class="form-control" placeholder="Password"></p>
        <p><input type="submit" class="form-control btn btn-success" value="Login"></p>
    </form>
</div>