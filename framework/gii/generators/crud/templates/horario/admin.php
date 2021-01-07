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
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Administrar',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);


?>
<div class="page-header">
    <h1>Directorio <small><?php echo $this->pluralize($this->class2name($this->modelClass)); ?></small></h1>
</div>

<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
    <thead>
        <tr role="row">      
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
		$count++;
       	echo  "\t\t\t".'<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 162px;">'.$column->name.'</th>'."\n";
}?>
			<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 164px;"></th>
        </tr>
    </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
     <?php echo "\n"."<?php foreach (\$model as \$data) { ?>\n"?>
     	<tr class="odd">          
<?php   
$id="";
foreach($this->tableSchema->columns as $column)
{
	if($id=="") $id =$column->name; 
            echo "\t\t".'<td class=" "><?php echo $data->'.$column->name.' ?></td>'."\n";
} ?>
		<td class="td-actions ">
		    <div class="hidden-phone visible-desktop action-buttons">
		        <a class="blue" href="<?php echo "<?php echo Yii::app()->createUrl('".$this->getModelClass()."/view', array('id' => \$data->".$id."))?>";?>">
		            <i class="icon-zoom-in bigger-130"></i>
		        </a>

		        <a class="green" href="<?php echo "<?php echo Yii::app()->createUrl('".$this->getModelClass()."/update', array('id' => \$data->".$id."))?>";?>">
		            <i class="icon-pencil bigger-130"></i>
		        </a>

		        <a class="red" href="<?php echo "<?php echo Yii::app()->createUrl('".$this->getModelClass()."/delete', array('id' => \$data->".$id."))?>";?>">
		            <i class="icon-trash bigger-130"></i>
		        </a>
		    </div>
		</td>
        </tr>
        <?php echo "<?php } ?>\n";?>
    </tbody>
</table>

<script type="text/javascript">
    $(function() {
        var oTable1 = $('#sample-table-2').dataTable( {
            "aoColumns": [
              <?php for ($i = 0; $i < $count; $i++) {
              	echo 'null,';           
              };?>  
                { "bSortable": false }
            ] } );
				
				
        $('table th input:checkbox').on('click' , function(){
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
            .each(function(){
                this.checked = that.checked;
                $(this).closest('tr').toggleClass('selected');
            });
						
        });
    })
</script>
