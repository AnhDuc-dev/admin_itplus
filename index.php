<?php
	session_start();
	if(isset($_SESSION['id'])){
        header("Location: admin/index.php");
    }
	include_once 'config/myconfig.php';

	// $sql = "SELECT * FROM tbl_student";
	// $query = mysqli_query($conn, $sql);

	// $count = mysqli_num_rows($query);
	// // $rs = mysqli_fetch_assoc($query);

	// $result = array();
	// while ($row = mysqli_fetch_assoc($query)){
	// 	$result[] = $row;
	// }

	// echo $count;
	// echo "<pre>";
	// print_r($result);
	// echo "</pre>";
	
?>
<!DOCTYPE html>
<html lang="">
	<?php
		include_once 'layout/head.php';
	?>
</html>
	<body>	
			<div class="row" style="margin-top: 150px;">
				<div class="col-md-6 col-md-push-3">
					<!-- _token = 'dsadsaasrever'; -->
					<!-- token để bảo mật sau này -->
					<?php 
						if( isset($_GET['page'])){
							$pages	= $_GET['page'];
						}else{
							$pages = 'login';
						}

						switch ($pages){
							case 'register';
								include_once 'pages/register.php';
								break;

							default :
								include_once 'pages/login.php';
								break;
						}
					?>					

				</div>
			</div>

		</div>

		<script src="./PHP/IT_Plus/js/jquery.js"></script>
		<script src="./PHP/IT_Plus/js/bootstrap.min.js"></script>
	</body>
</html>