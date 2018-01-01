<?php

use yii\helpers\Html;

?>
<form action="/index.php?r=users/update" method="post" class="form-control">
    <h2>Create User</h2>
    <div class="form-group">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <?= Html::input('hidden', 'id', $user->id, [
        'class' => 'username',
        'placeholder' => "username"
        ])
    ?></br>
    <?= Html::input('text', 'username', $user->username, [
        'class' => 'username',
        'placeholder' => "username"
        ])
    ?></br>
    <?= Html::input('text', 'address', $user->address, [
        'class' => 'username',
        'placeholder' => "address"
        ])
    ?></br>
    <?= Html::input('text', 'email', $user->username, [
        'class' => 'username',
        'placeholder' => "email"
        ])
    ?></br>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>