<?php require_once('config/main.php'); 
	$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = ".$_SESSION['id']);
  $hotel = mysqli_query($conn, "SELECT * FROM hotel");

	$data = mysqli_fetch_array($query);
?>

<section>
	<div class="row">
		<div class="col-md-12">
      <div class="box box-info">
        <div class="box-header bg-primary">
          <h3 class="box-title" style="color: white; font-weight: bold">Give Feedback</h3>
        </div>
        <div class="box-body">
          <form role="form" method="post" action="save.php">
          	<input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
            <input type="hidden" name="type" value="feedback">
           	<input type="hidden" name="cmd" value="add">
            <div class="form-group">
              <label>Hotel Name</label>
              <select name="hotel_id" class="form-control" required>
                <option disabled selected>--- Choose Hotel ---</option>
                <?php while($row = mysqli_fetch_array($hotel)) { ?>
                  <option value="<?php echo $row['hotel_id'] ?>"><?php echo $row['hotel_name']." in ".$row['hotel_location'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Rating</label>
              <div class="row">
                <div class="col-lg-2">
                  <div class="radio">
                    <label>
                    <input type="radio" name="feedback_rating" value="1">
                      <i class="fa fa-star"></i>
                    </label>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="radio">
                    <label>
                    <input type="radio" name="feedback_rating" value="2">
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </label>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="radio">
                    <label>
                    <input type="radio" name="feedback_rating" value="3">
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </label>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="radio">
                    <label>
                    <input type="radio" name="feedback_rating" value="4">
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </label>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="radio">
                    <label>
                    <input type="radio" name="feedback_rating" value="5" checked="true">
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Feedback</label>
              <textarea class="form-control" rows="3" name="feedback_desc" placeholder="Feedback" required></textarea>
            </div>

            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
            &nbsp;
            <a href="admin.php" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</a>
          </form>
        </div>
      </div>
    </div>
	</div>
</section>