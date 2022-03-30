<?php require_once('config/main.php');
  $id = $_SESSION['id'];
  $data = mysqli_query($conn, "SELECT * FROM feedback JOIN hotel ON feedback.hotel_id = hotel.hotel_id WHERE user_id = '$id' ORDER BY feedback_id DESC");
  $data2 = mysqli_query($conn, "SELECT * FROM feedback WHERE user_id = '$id' AND feedback_status = 1 ORDER BY feedback_id DESC");
  $data3 = mysqli_query($conn, "SELECT AVG(feedback_rating) AS average_rating FROM feedback WHERE user_id = '$id'");

  $average = mysqli_fetch_array($data3);
?>
<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo mysqli_num_rows($data2); ?></h3>
        <p>Feedback Approved</p>
      </div>
      <div class="icon">
        <i class="fa fa-trophy"></i>
      </div>
      <a href="admin.php?page=feedback_add" class="small-box-footer">Give Feedback &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo mysqli_num_rows($data); ?></h3>
        <p>Total Feedback Given</p>
      </div>
      <div class="icon">
        <i class="fa fa-thumbs-up"></i>
      </div>
      <a href="admin.php?page=feedback_add" class="small-box-footer">Give Feedback &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo round($average['average_rating'], 2) ?></h3>
        <p>Average Rating Given</p>
      </div>
      <div class="icon">
        <i class="fa fa-star"></i>
      </div>
      <a href="admin.php?page=feedback_add" class="small-box-footer">Give Feedback &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header bg-primary">
        <h3 class="box-title" style="color: white; font-weight: bold">History / Last Feedback Given</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <?php while($row = mysqli_fetch_array($data)) { ?>
            <div class="col-md-3">
              <div class="box" style="border: 1px solid #c5c5c5">
                <div class="box-header">
                  <h3 class="box-title"><b><?php echo $row['hotel_name'] ?></b></h3>
                </div>
                <div class="box-body">
                  <img src="dist/img/hotel.jpg" style="width:100%">
                  <div class="btn btn-warning btn-block" style="margin-top: 10px">Rating Given : <span><?php echo $row['feedback_rating'] ?> <i class="fa fa-star"></i></span></div>
                  <p align="justify" style="margin-top:10px"><?php echo $row['feedback_desc'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>