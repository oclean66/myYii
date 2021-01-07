<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Update <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Delete <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<div class="page-header">
    <h1>Registro <small><?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></small></h1>
</div>


	<div class="profile-user-info profile-user-info-striped"  style="width: 500px;">
		
		<?php foreach($this->tableSchema->columns as $column){
			echo "\n\t\t\t\t".'<div class="profile-info-row">
			<div class="profile-info-name"><?php echo CHtml::encode($model->getAttributeLabel("'.$column->name.'")); ?>'."</div>\n";
			echo "\t\t\t\t".'<div class="profile-info-value">
					<span class="editable" id="text"><?php echo CHtml::encode($model->'.$column->name.'); ?></span>
				</div>
				</div>'."\n";
		}?>
		
	</div>