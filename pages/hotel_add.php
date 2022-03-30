<section>
	<div class="row">
		<div class="col-md-12">
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Add New Hotel</h3>
	        </div>
	        <div class="box-body">
	          <form role="form" method="post" action="save.php">
	          	<input type="hidden" name="type" value="hotel">
	           	<input type="hidden" name="cmd" value="add">
	            <div class="form-group">
	              <label>Hotel Name</label>
	              <input type="text" class="form-control" name="hotel_name" placeholder="Hotel Name" value=""/>
	            </div>
	            <div class="form-group">
	              <label>Hotel Location</label>
	              <input type="text" class="form-control" name="hotel_location" placeholder="Hotel Location" value=""/>
	            </div>
	            <div class="form-group">
	              <label>Hotel Description</label>
	              <textarea class="form-control" rows="3" name="hotel_desc" placeholder="Hotel Description"></textarea>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
	            &nbsp;
	            <a href="admin.php?page=hotel_data" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</a>
	          </form>
	        </div>
	      </div>
	    </div>
	</div>
</section>