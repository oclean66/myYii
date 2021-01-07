<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>
<div class="box box-bordered box-color">
    <div class="box-title">
        <h3>
            <i class="fa fa-th-list"></i><?php echo "<?php echo \$model->isNewRecord ? 'Crear' : 'Actualizar';?>"; ?> <?php echo $this->modelClass; ?></h3>
    </div>
    <div class="box-content nopadding">
        <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'form-horizontal form-bordered'),
            )); ?>\n"; ?>

        <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

        <?php
        foreach ($this->tableSchema->columns as $column) {
            if ($column->autoIncrement)
                continue;
            ?>
            <div class="form-group">
                <?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column,  'control-label col-sm-2') . "; ?>\n"; ?>
                <div class="col-sm-10">
                    <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column,  "form-control") . "; ?>\n"; ?>
                    <?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
                </div>
            </div>

            <?php
        }
        ?>

        <div class="form-actions col-sm-offset-2 col-sm-10">
            <?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary')); ?>\n"; ?>
            <a href="admin" class="btn">Cancel</a>
        <!--</div>-->
        <?php echo "<?php \$this->endWidget(); ?>\n"; ?>
    </div>
</div>



