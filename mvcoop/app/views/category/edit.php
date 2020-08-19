<?php require APPROOT . '/views/components/header.php';?>



<div class="wrapper d-flex align-items-stretch">

<?php require APPROOT . '/views/components/sidebar.php';?>

<div id="content" class="p-4 p-md-5">

<?php require APPROOT . '/views/components/menu.php';?>
<div class="container">

	<h1>Edit Category</h1>
	<p><?php echo date('Y-m-d');?></p>

	<form class="float-right col-8" action="<?php echo URLROOT;?>/category/update" method="POST">
		  <div class="form-group">
		  	<input type="hidden" name="id" value="<?php echo $data['category']['id'] ?>">
		  	<label for="exampleInputPassword1">Name</label>
		  		<input type="text" name="name" value="<?php echo $data['category']['name'] ?>" class="form-control">
		    <label for="exampleInputPassword1">Type</label>
		    <select class="form-control" id="type_id" name="type_id">
		     		<?php 
		     		foreach ($data['type'] as $type) {
		     	?>

		     		
			      	<option value="<?php echo $type['id'];?>" <?php if($type['id']==$data['category']['type_id']) echo "selected" ?>><?php echo $type['name'];?></option>
			    <?php
		     		}
		     	?>
			      	
      
    		</select>
		    
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Description</label>
		    <input type="text" name="description" value="<?php echo $data['category']['description'] ?>" class="form-control">
		  </div>
		  
		  
		  <button type="submit" class="btn btn-warning btn-lg col-5 float-right">Update</button>
		  <button type="reset" class="btn btn-secondary btn-lg col-5">Cancel</button>
	</form>
</div>
<?php require APPROOT . '/views/components/footer.php';?>