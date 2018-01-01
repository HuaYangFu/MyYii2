<?php

use yii\helpers\Html;

?>
<form action="/index.php?r=users/create" method="post" class="form-control">
    <h2>Create User</h2>
    <div class="form-group">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <?= Html::input('text', 'username', $user->username, [
        'class' => 'username',
        'name' => 'username',
        'placeholder' => "username"
        ])
    ?></br>
    <?= Html::input('text', 'username', $user->address, [
        'class' => 'username',
        'name' => 'address',
        'placeholder' => "address"
        ])
    ?></br>
    <?= Html::input('text', 'username', $user->username, [
        'class' => 'username',
        'name' => 'email',
        'placeholder' => "email"
        ])
    ?></br>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>