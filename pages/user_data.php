<?php require_once('config/main.php');
	$query=mysqli_query($conn, "SELECT * FROM user");
?>

<div class="box">
  <div class="box-header bg-primary">
    <h3 class="box-title" style="color: white; font-weight: bold">User Management ( <?php echo mysqli_num_rows($query); ?> Users )</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
  	  <a href="admin.php?page=user_add" style="margin-bottom: 10px;" class="btn btn-md btn-success"><i class="fa fa-plus">&nbsp;&nbsp;</i>Add New User</a>
		<?php endif; ?>
		<table class="table table-bordered table-striped" id="tabel">
			<thead>
				<tr>
				<th>NO</th>
				<th>USER FULLNAME</th>
				<th>USER NAME</th>
				<th>USER PASSWORD</th>
				<th>USER LEVEL</th>
				<?php if (isset($_SESSION['username'])): ?>
					<th></th>
				<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					while($q = mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>						
						<td><?php echo $q['user_fullname']?></td>
						<td><?php echo $q['user_name']?></td>
						<td><?php echo $q['user_password']?></td>
						<td><?php echo $q['user_level']?></td>
						<?php if (isset($_SESSION['username'])): ?>
							<td>
					    	<a class="btn btn-sm btn-info" href="admin.php?page=hotel_edit&hotel_id=<?php echo $q['hotel_id']; ?>">Edit</a>
					    	<a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this ?')" href="delete.php?delete=<?php echo $_GET['page']; ?>&hotel_id=<?php echo $q['hotel_id']; ?>">Delete</a>
					    </td>
						<?php endif; ?>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
	 $(document).ready(function() {
	 	$('#tabel').dataTable({
	          "bPaginate": true,
	          "bLengthChange": false,
	          "bFilter": true,
	          "bSort": true,
	          "bInfo": false,
	          "bAutoWidth": true
	    });
	 });
</script>