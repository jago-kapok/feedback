<?php require_once('config/main.php'); 
	$query = mysqli_query($conn, "SELECT * FROM hotel WHERE hotel_id = ".$_GET['hotel_id']);
	$data = mysqli_fetch_array($query);
?>

<section>
	<div class="row">
		<div class="col-md-12">
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Edit Hotel</h3>
	        </div>
	        <div class="box-body">
	          <form role="form" method="post" action="save.php">
	          	<input type="hidden" name="hotel_id" value="<?php echo $data['hotel_id']; ?>">
	          	<input type="hidden" name="type" value="hotel">
	           	<input type="hidden" name="cmd" value="edit">
	            <div class="form-group">
	              <label>Hotel Name</label>
	              <input type="text" class="form-control" name="hotel_name" placeholder="Hotel Name" value="<?php echo $data['hotel_name']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Hotel Location</label>
	              <input type="text" class="form-control" name="hotel_location" placeholder="Hotel Location" value="<?php echo $data['hotel_location']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Hotel Description</label>
	              <textarea class="form-control" rows="3" name="hotel_desc" placeholder="Hotel Description"><?php echo $data['hotel_desc']; ?></textarea>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="admin.php?page=hotel_data" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</a>
	          </form>
	        </div>
	      </div>
	    </div>
	</div>
</section>