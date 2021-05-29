<?php
include 'sessioncheck.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/css/bootstrap.min.css">
	<link rel="stylesheet" href="history.css">
</head>


<body>
	<?php
	include 'nav.php';
	?>
	<div class="container">
		<div class="main">
			<div class="topbar">
				<h1 class="history_header">Shift Allocation History</h1>
			</div>
			<div class="row">
				<div class="col-md-12 mt-1">
					<div class="content">
						<div class="card-body">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<?php // SELECT DATE_FORMAT(column_name, '%H:%i'); 
										?>
										<th>Shift ID</th>
										<th>Day</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Location</th>
										<th>Status</th>
									</tr>
									<?php
									//connect to the db
									$db = mysqli_connect("localhost", "root", "", "work");

									if (isset($_GET['staff_id'])) {
										// make sure the current user is permitted to view this shift history
										if ($_SESSION['role'] == 'manager') {
											$id = $_GET['staff_id'];
										} else {
											// otherwise go to my shift history
											$id = $_SESSION['staff_id'];
										}
									} else {
										// otherwise go to my shift history
										$id = $_SESSION['staff_id'];
									}

									//query
									$q = "SELECT shifts.shift_id, shifts.day, shifts.start, shifts.end, shifts.location, staff_shifts.status
										FROM shifts
										INNER JOIN staff_shifts ON shifts.shift_id = staff_shifts.shift_id
										WHERE staff_id = $id AND status = 'active'";

									$result = mysqli_query($db, $q);

									while ($row = mysqli_fetch_assoc($result)) {
										// Display a formatted row of every shift assigned to this user
										echo ("<tr>");
										echo ("<td>$row[shift_id]</td>");
										$day = ucfirst($row['day']);
										echo ("<td>$day</td>");
										$start = substr($row['start'], 0, -3);
										$end = substr($row['end'], 0, -3);
										echo ("<td>$start</td>");
										echo ("<td>$end</td>");
										$location = ucfirst($row['location']);
										echo ("<td>$location</td>");
										$status = ucfirst($row['status']);
										echo ("<td>$status</td>");
										echo ("</tr>");
									}
									?>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mt-1">
					<div class="content">
						<div class="card-body">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>