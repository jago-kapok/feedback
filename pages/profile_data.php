<?php require_once('config/main.php'); 
	$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = ".$_SESSION['id']);
	$data = mysqli_fetch_array($query);
?>

<section>
	<div class="row">
		<div class="col-md-12">
      <div class="box box-info">
        <div class="box-header bg-primary">
          <h3 class="box-title" style="color: white; font-weight: bold">Edit Profile</h3>
        </div>
        <div class="box-body">
          <form role="form" method="post" action="save.php">
          	<input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
          	<input type="hidden" name="type" value="register">
           	<input type="hidden" name="cmd" value="edit">
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" name="fullname" placeholder="Hotel Name" value="<?php echo $data['user_fullname']; ?>"/>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" placeholder="Hotel Location" value="<?php echo $data['user_name']; ?>" readonly/>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="" value="<?php echo $data['user_password']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control" name="password" placeholder="New Password">
              <div class="text-danger">
              	Leave this field blank if you don't want to change the password
              </div>
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