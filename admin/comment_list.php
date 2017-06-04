<?php session_start();
	include 'includes/db.php';
	if (isset($_GET['del_id'])) {
		$del_sql = " DELETE FROM comments WHERE comment_id = '$_GET[del_id]'";
		$run_sql = mysqli_query($con,$del_sql);
	}

	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn, $sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				if(mysqli_num_rows($run_sql) == 1 ){
					if($rows['role'] == 'admin'){
					} else {
						header('Location:../index.php');
					}
				} else{
					header('Location:../index.php');
				}
			}
		}
	} else {
		header('Location:../index.php');
	}




	//pagination
	$per_page = 5;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
		<script src="../../js/jquery.js"></script>
		<script src="../../bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include 'includes/header.php';?>
		<div style="width:50px;height:50px;"></div>
		<?php include 'includes/sidebar.php';?>
		<div class="col-lg-10">
		<div style="width:50px;height:50px;"></div>
		
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Latest Comments</h3></div>
				<div class="panel-body">
					<table class="table table-striped">
					

						<thead>
							<tr>
								<th>S.No</th>
								<th>Date</th>
								<th>Author</th>
								<th>Email</th>
								<th>Comments</th>
								<th>Delete</th>
							</tr>
							
						</thead>



						<?php
							
								$sql = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT $start_from,$per_page ";
								$run = mysqli_query($conn,$sql);
								if (isset($_GET['num'])) {
									$number = $_GET['num'];
								}if (!isset($_GET['num']) || $_GET['page'] == 1) {
									$number = 1;
								}
								while($rows = mysqli_fetch_assoc($run)){
									echo '
									<tr>
										<td>'.$number.'</td>
										<td>'.$rows['date'].'</td>
										<td>'.$rows['name'].'</td>
										<td>'.$rows['email'].'</td>
										<td>'.$rows['comment'].'</td>
										<td><a href="post_list.php?del_id='.$rows['comment_id'].'" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
									</tr>
									';
									$number ++ ;
								}
								
							?>
							
							
						</tbody>	

					</table>
				</div>
			</div>
		</div>
		<div class="text-center">
				<ul class="pagination">
					<?php
						$pagination_sql = "SELECT * FROM posts ";
						$run_pagination = mysqli_query($conn, $pagination_sql);

						$count = mysqli_num_rows($run_pagination);
						
						$total_pages = ceil($count/$per_page);
						
						if(isset($_GET['page'])){
							$condition = $_GET['page'];
						}else{
							$condition = 1;
						}
						for($i=1;$i<=$total_pages;$i++){
							if ($condition == $i) {
								echo '<li class="active"><a href="comment_list.php?page='.$i.'&num='.$number.'">'.$i.'</a></li>';
							}else{
								echo '<li><a href="comment_list.php?page='.$i.'&num='.$number.'">'.$i.'</a></li>';
							}
							
						}
						
					?>
			
				</ul>
			</div>
		
		<footer></footer>
	</body>
</html>