<?php require APPROOT . '/views/components/header.php';?>

<div class="wrapper d-flex align-items-stretch">

<?php require APPROOT . '/views/components/sidebar.php';?>

<div id="content" class="p-4 p-md-5">

<?php require APPROOT . '/views/components/menu.php';?>
<h1><?php echo $data['title']?></h1>
<?php require(APPROOT.'/views/components/message.php');?>
<table class="table table-active border border-dark" id="mytable">
	<thead>
			<tr>
				<th>id</th>
				<th>category_id</th>
				<th>amount</th>
				<th>user_id</th>
				<th>date</th>
				<th></th>
				<th></th>
			</tr>
	</thead>
	<tbody>
		<?php
				foreach($data['incomes'] as $income) {
		?>
			<tr class="table table-info">
				<td><?php echo $income['id']?></td>
				<td><?php echo $income['category_id']?></td>
				<td><?php echo $income['amount']?></td>
				<td><?php echo $income['user_id']?></td>
				<td><?php echo $income['date']?></td>
				<td>
						<a href="<?php echo URLROOT;?>/income/edit/<?php echo base64_encode($income['id'])?>" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<a href="<?php echo URLROOT;?>/income/destory/<?php echo base64_encode($income['id'])?>" class="btn btn-danger">Delete</a>
					</td>
			</tr>
		<?php
				}
		?>
	</tbody>
</table>
<a href="<?php echo URLROOT;?>/income/create/"><button value="Add" class="btn btn-primary btn-lg float-right mt-4">Add New Income</button>
</div>
</div>
<?php require APPROOT . '/views/components/footer.php';?>