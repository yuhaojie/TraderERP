<?php
use yii\widgets\ActiveForm;
use common\helpers\AddonUrl;
use common\widgets\webuploader\Images;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;

$this->title = $model->isNewRecord ? '创建' : '编辑';
$this->params['breadcrumbs'][] = ['label' => '渠道管理', 'url' => AddonUrl::to(['index'])];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息</h3>
            </div>
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "<div class='col-sm-1 text-right'>{label}</div><div class='col-sm-11'>{input}{hint}{error}</div>",
                ]
            ]); ?>
            <div class="box-body">
                <?= $form->field($model, 'name')->textInput(); ?>
                <?= $form->field($model, 'icon')->widget(Images::class, [
                    'config' => [
                        // 可设置自己的上传地址, 不设置则默认地址icon
                        // 'server' => '',
                        'pick' => [
                            'multiple' => false,
                        ],
                    ]
                ]); ?>
                <?= $form->field($model, 'description')->textarea(); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($model, 'created_at')->widget(DateTimePicker::class, [
                            'language' => 'zh-CN',
                            'options' => [
                                'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s', $model->created_at),
                            ],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd hh:ii',
                                'todayHighlight' => true,//今日高亮
                                'autoclose' => true,//选择后自动关闭
                                'todayBtn' => true,//今日按钮显示
                            ]
                        ]);?>
                    </div>
                </div>
                <?= $form->field($model, 'status')->radioList(['1' => '启用','0' => '禁用']); ?>
            </div>
            <div class="box-footer text-center">
                <button class="btn btn-primary" type="submit">保存</button>
                <span class="btn btn-white" onclick="history.go(-1)">返回</span>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>