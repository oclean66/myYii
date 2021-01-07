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

<div class="form">

    <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>false,
	 'htmlOptions' => array('class' => 'form-horizontal',),)); ?>\n"; ?>

    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

    <?php echo "

    <?php
    echo \$form->errorSummary(\$model,null,null,array('class'=>'alert alert-error'));

    ?>\n"; ?>


    <div class="widget-box">
        <div class="widget-header">
            <h4>Informacion de <?php echo $this->getModelClass(); ?></h4>
            <span class="widget-toolbar">
                <a href="#" data-action="collapse">
                    <i class="icon-chevron-up"></i>
                </a>                        
            </span>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                </br>

                <?php
                foreach ($this->tableSchema->columns as $column) {
                    if ($column->autoIncrement)
                        continue;
                    ?>
<div class="control-group">
                    <?php echo "\t<?php echo " . $this->generateActiveLabel($this->modelClass, $column,'control-label') . "; ?>\n"; ?>
                        <div class='controls'><?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n";
                    echo "\t\t\t<?php echo \$form->error(\$model,'{$column->name}',array('class'=>'label label-important arrowed')); ?>\n"; ?>
                        </div>
                    </div>

                    <?php
                }
                ?>

                <div  class="form-actions" style="margin-bottom: 0">

                    <button class="btn btn-info" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        <?php echo "<?php echo \$model->isNewRecord ? 'Crear' : 'Guardar' ?>"; ?>
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        Regresar
                    </button>
                </div>

                <?php echo "<?php \$this->endWidget(); ?>\n"; ?>

            </div><!-- form -->