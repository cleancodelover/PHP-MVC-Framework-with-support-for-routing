<?php

/**
 * @var $model \app\model\Login
 */

use \app\core\form\Form;
?>
<h1>Login</h1>
<?php $form = Form::begin('', 'post') ?>
<div class="row">
    <div class="col"><?php echo $form->field($model, 'email') ?></div>
    <div class="col"><?php echo $form->field($model, 'password')->passwordField() ?></div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo $form->end() ?>