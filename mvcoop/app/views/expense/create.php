<?php require APPROOT . '/views/components/header.php';?>



<div class="wrapper d-flex align-items-stretch">

<?php require APPROOT . '/views/components/sidebar.php';?>

<div id="content" class="p-4 p-md-5">

<?php require APPROOT . '/views/components/menu.php';?>
<div class="container">

	<h1>Add Expense</h1>
	<p><?php echo date('Y-m-d');?></p>

	<form class="float-right col-8" action="<?php echo URLROOT;?>/expense/store" method="POST">
		  <div class="form-group">
		    <label for="exampleInputPassword1">Category</label>
		    <select class="form-control" name="category_id">
		     		<?php 
		     		foreach ($data['categories'] as $category) {
		     	?>

		     		
			      	<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
			    <?php
		     		}
		     	?>
			      	
      
    		</select>
		    
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Qty</label>
		    <input type="number" name="qty" class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Amount</label>
		    <input type="text" name="amount" class="form-control">
		  </div>
		  
		  
		  <button type="submit" class="btn btn-warning btn-lg col-5 float-right">Submit</button>
		  <button type="reset" class="btn btn-secondary col-5 btn-lg">Cancel</button>
	</form>
</div>
<?php require APPROOT . '/views/components/footer.php';?>