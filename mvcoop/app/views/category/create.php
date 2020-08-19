<?php require APPROOT . '/views/components/header.php';?>



<div class="wrapper d-flex align-items-stretch">

<?php require APPROOT . '/views/components/sidebar.php';?>

<div id="content" class="p-4 p-md-5">

<?php require APPROOT . '/views/components/menu.php';?>
<div class="container">

	<h1>Add Category</h1>
	<p><?php echo date('Y-m-d');?></p>

	<form class="float-right col-8" action="<?php echo URLROOT;?>/category/store" method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Name</label>
		    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
		    
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Type</label>
		     <select class="form-control" id="type_id" name="type_id">
		     	<?php 
		     		foreach ($data['name'] as $type) {
		     	?>

		     		
			      	<option value="<?php echo $type['id'];?>"><?php echo $type['name'];?></option>
			    <?php
		     		}
		     	?>
      
    		</select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Description</label>
		    <textarea class="form-control" name="description"></textarea>
		  </div>
		  
		  <button type="submit" class="btn btn-warning btn-lg col-5 float-right">Submit</button>
		  <button type="reset" class="btn btn-secondary btn-lg col-5">Cancel</button>
	</form>
</div>
<?php require APPROOT . '/views/components/footer.php';?>