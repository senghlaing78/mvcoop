<?php require APPROOT . '/views/components/header.php';?>



<div class="wrapper d-flex align-items-stretch">

<?php require APPROOT . '/views/components/sidebar.php';?>

<div id="content" class="p-4 p-md-5">
<?php require APPROOT . '/views/components/menu.php';?>

<h1>Category Data</h1>
<?php require(APPROOT.'/views/components/message.php');?>


<table class="table table-active  border border-dark" id="mytable">
	<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>description</th>
				<th>type_id</th>
				<th></th>
				<th></th>
			</tr>
	</thead>
  	<tbody>
			<?php
					foreach($data['categories'] as $category) {
			?>
				<tr class="table table-warning">
					<td><?php echo $category['id']?></td>
					<td><?php echo $category['name']?></td>
					<td><?php echo $category['description']?></td>
					<td><?php echo $category['type_id']?></td>
					<td>
						<a href="<?php echo URLROOT;?>/category/edit/<?php echo base64_encode($category['id'])?>" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<a href="<?php echo URLROOT;?>/category/destory/<?php echo base64_encode($category['id'])?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php
					}
			?>
	</tbody>
</table>
<a href="<?php echo URLROOT;?>/category/create/"><button value="Add" class="btn btn-primary btn-lg float-right mt-4">Add New Category</button>
</div>
</div>
	
<?php require APPROOT . '/views/components/footer.php';?>