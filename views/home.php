<?php

use app\core\Application;
?>
<h1>Home</h1>
<?php if (Application::isLoggedIn() != null) : ?>
    <h1> Welcome <?php echo Application::$app->user->getUserName() ?> Logout</h1>
<?php endif ?>