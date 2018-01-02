<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

?>

<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    });
</script>

<form method="post">
<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
<?= Html::tag('p', Html::encode($users[0]->username), [
    'class' => 'username'])
?></br>

<?= Html::tag('a', Html::encode($users[0]->username), [
    'class' => 'username',
    'href' => 'testurl'
    ])
?></br>

<?= Html::input('text', 'username', $users[0]->username, [
    'class' => 'username',
    'name' => 'testname'
    ])
?></br>

<?= Html::dropDownList('selectname', $users[0]->id, ArrayHelper::map($users, 'id', 'username')) ?>

<?= Html::radioList('radioname',22, ArrayHelper::map($users, 'id', 'username')) ?>

<?= Html::activeDropDownList($users[1], 'id', ArrayHelper::map($users, 'id', 'username')) ?>
<button type="submit">sub</button>
</form>
 