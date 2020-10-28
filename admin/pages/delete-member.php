<?php  
	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];

		$del = delMember($id);
		if ($del) {
			$_SESSION['noti'] = 2;
		}
	}
	header("Location: index.php?page=list-students");
?>