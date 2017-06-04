<?php session_start();
	include 'includes/db.php';
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
	$result = '';
	if(isset($_GET['new_status'])){
		$new_status =$_GET['new_status'];
		$sql = "UPDATE posts SET status='$new_status' WHERE id =  $_GET[id] ";
		if($run = mysqli_query($conn,$sql)){
			$result = '<div class="alert alert-success">We Just Updated the Status</div>';
		}
	}
	
	if(isset($_GET['del_id'])){
		$del_id = $_GET['del_id'];
		$sql = "DELETE FROM posts WHERE id = '$del_id'";
		if($run = mysqli_query($conn,$sql)){
			$result = '<div class="alert alert-danger">You Deleted Row no. '.$del_id.' from Database</div>';
		}
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
		<script>
			
		</script>
	</head>
	<body>
		<?php include 'includes/header.php';?>
		<div style="width:50px;height:50px;"></div>
		<?php include 'includes/sidebar.php';?>
		<div class="col-lg-10">
		<div style="width:50px;height:50px;"></div>
		<?php 
			echo $result;
		?>
	
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Posts</h3></div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Date</th>
								<th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Category</th>
								<th>Author</th>
								<th>status</th>
								<th>Action</th>
								<th>Edit Post</th>
								<th>View Post</th>
								<th>Delete Post</th>
							</tr>
							
						</thead>
						<tbody>
							<?php
								//query to select posts 
								$sql = "SELECT * FROM posts p JOIN users u ON p.author = u.user_email ORDER BY id DESC LIMIT $start_from,$per_page";
								$run = mysqli_query($conn,$sql);

								if(!isset($_GET['page']) || $_GET['page'] == 1){
									$number = 1;
								}else{
									$number = ($_GET['page'] - 1) * 5 + 1;
								}
								while($rows = mysqli_fetch_assoc($run)){
									echo '
									<tr>
										<td>'.$number.'</td>
										<td>'.$rows['date'].'</td>
										<td>'.($rows['image'] == '' ? 'No Image' : '<img src="../'.$rows['image'].'" width="50px">').'</td>
										<td>'.$rows['title'].'</td>
										<td>'.substr($rows['description'],0,50).'......</td>
										<td>'.$rows['category'].'</td>
										<td>'.$rows['user_f_name'].' '.$rows['user_l_name'].'</td>
										<td>'.$rows['status'].'</td>
										<td>'.($rows['status'] == 'draft'? '<a href="post_list.php?new_status=published&id='.$rows['id'].'" class="btn btn-primary btn-xs navbar-btn">Publish</a>': '<a href="post_list.php?new_status=draft&id='.$rows['id'].'" class="btn btn-info btn-xs navbar-btn">Draft</a>').'</td>
										<td><a href="edit_post.php?edit_id='.$rows['id'].'" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
										<td><a href="../post.php?post_id='.$rows['id'].'" class="btn btn-success btn-xs navbar-btn">View</a></td>
										<td><a href="post_list.php?del_id='.$rows['id'].'" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
									</tr>
									';
									$number ++ ;
								}
								
							?>
							
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="text-center">
				<ul class="pagination">
			<?php
				$pagination_sql = "SELECT * FROM posts ";
				$run_pagination = mysqli_query($conn, $pagination_sql);

				$count = mysqli_num_rows($run_pagination);
				
				$total_pages = ceil($count/$per_page);
				if (isset($_GET['page'])) {
					$condition = $_GET['page'];
				}else{
					$condition = 1;
				}
				
				
				for($i=1;$i<=$total_pages;$i++){
					if ($condition == $i) {
						echo '<li class="active"><a href="post_list.php?page='.$i.'&num='.$number.'">'.$i.'</a></li>';
					}else{


					echo '<li><a href="post_list.php?page='.$i.'&num='.$number.'">'.$i.'</a></li>';
					}
				}
				
			?>
			
				</ul>
			</div>
			
		</div>
		<footer></footer>
	</body>
</html>