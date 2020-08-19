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
				<th>qty</th>
				<th>amount</th>
				<th>date</th>
				<th>user_id</th>
				<th></th>
				<th></th>
			</tr>
	</thead>
	<tbody>
			<?php
					foreach($data['expenses'] as $expense) {
			?>
				<tr class="table table-danger">
					<td><?php echo $expense['id']?></td>
					<td><?php echo $expense['category_id']?></td>
					<td><?php echo $expense['qty']?></td>
					<td><?php echo $expense['amount']?></td>
					<td><?php echo $expense['date']?></td>
					<td><?php echo $expense['user_id']?></td>
					<td>
						<a href="<?php echo URLROOT;?>/expense/edit/<?php echo base64_encode($expense['id'])?>" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<a href="<?php echo URLROOT;?>/expense/destory/<?php echo base64_encode($expense['id'])?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php
					}
			?>
	</tbody>
</table>
<a href="<?php echo URLROOT;?>/expense/create/"><button value="Add" class="btn btn-primary btn-lg float-right mt-4">Add New Expense</button>
</div>
</div>
<?php require APPROOT . '/views/components/footer.php';?>