<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
/*
echo "<pre>";
var_dump($model);
echo "</pre>";

*/
?>

<div class="user-form col-lg-6 col-md-offset-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true, value=>"112"] ) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <? /*= $form->field($model, 'gender')->textInput(['maxlength' => true])*/ ?>

    <?= $form->field($model, 'gender')->radioList([ 'male' => 'Male', 'female' => 'Female']) ?>

    <?= $form->field($model, 'age')->textInput() ?>
    <?//$model->languages = ['uk','en'];?>

    <?= $form->field($model, 'languages')->checkBoxList([ 'uk' => 'Uk', 'ru' => 'Ru', 'en' => 'En', ], ['prompt' => '']);
     ?>

    <?
       /* $form->field($model, 'languages')->checkboxList(
            ArrayHelper::map(
                $model,'languages','value'));
*/

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
