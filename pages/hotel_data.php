<?php require_once('config/main.php');
	$query=mysqli_query($conn, "SELECT * FROM hotel");
?>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Hotel List ( <?php echo mysqli_num_rows($query); ?> Hotel )</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
  	  <a href="admin.php?page=hotel_add" style="margin-bottom: 10px;" class="btn btn-md btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;</i>Add New Hotel</a>
		<?php endif; ?>
		<table class="table table-bordered" id="tabel">
			<thead>
				<tr>
				<th>NO</th>
				<th>HOTEL NAME</th>
				<th>HOTEL LOCATION</th>
				<th>HOTEL DESCRIPTION</th>
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
						<td><?php echo $q['hotel_name']?></td>
						<td><?php echo $q['hotel_location']?></td>
						<td><?php echo $q['hotel_desc']?></td>
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