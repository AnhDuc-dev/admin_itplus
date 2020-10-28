<?php 
	// xem thông tin sinh viên
	function getMember(){
		global $conn;
		$sql = "SELECT * FROM  tbl_faculty, tbl_student
				WHERE tbl_faculty.id = tbl_student.facultys_id
				ORDER BY tbl_student.id DESC ";
		$query = mysqli_query($conn, $sql); 
		// query có nhiệm vụ trả cho t 1 object dữ liệu chỉ với phần select thôi
		// Với thêm, sửa hoặc xóa thì query đóng vai trò như kiểu bolun. Câu lệnh Sql đúng thì trả về True, Sai thì False
		$result = array();
		while( $row = mysqli_fetch_assoc($query)){
			$result[] = $row;
			// Viết như này là thay thế hàm array_push 
		}
		return $result;
	}
	//Lấy thông tin khoa
	function getFacultys(){
		global $conn;
		$sql = "SELECT * FROM  tbl_faculty ";
		$query = mysqli_query($conn, $sql);

		$result = array();
		while( $row = mysqli_fetch_assoc($query)){
			$result[] = $row;
			// Viết như này là thay thế hàm array_push 
		}
		return $result;
	}
	// Thêm mới sinh viên
	function insertMember($facultys_id, $name, $phone, $email, $addres, $gender){
		global $conn;

		$sql = "INSERT INTO tbl_student(facultys_id, name, phone, email, addres, gender) 
		VALUES($facultys_id, '$name', '$phone', '$email', '$addres', $gender)";
		return mysqli_query($conn, $sql);
	}

	//Check Email trùng
	function checkEmail($email){
		global $conn;
		
		$sql = "SELECT * FROM tbl_student WHERE email = '$email'";
		$query = mysqli_query($conn, $sql);
		// mysqli_num_rows: đếm số dòng trong bản ghi
		$num = mysqli_num_rows($query);
		return $num;
	}

	//Tìm kiếm thành viên
	function searchMember($key){
		global $conn;
		$sql = "SELECT * FROM  tbl_student, tbl_faculty
				WHERE tbl_student.phone LIKE '%$key%' ORDER BY tbl_student.id DESC ";
		$query = mysqli_query($conn, $sql); 

		$result = array();
		while( $row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
		return $result;
	}
	//Xóa thành viên
	function delMember($id){
		global $conn;
		// DETELE là ko có * FROM ko thì sẽ ko chạy
		$sql = "DELETE FROM tbl_student WHERE id = $id ";
		return mysqli_query($conn, $sql);
	}
	//Lấy thông tin học viên qua id
	function getMember_id($id){
		global $conn;

		$sql = "SELECT * FROM tbl_student WHERE id = $id ";
		$query = mysqli_query($conn, $sql);
		return mysqli_fetch_assoc($query);
	}
	// Sửa thành viên
	function upMember($id, $facultys_id, $name, $phone, $addres, $gender){
		global $conn;

		$sql = "UPDATE tbl_student 	
				SET facultys_id = $facultys_id, name = '$name', phone = '$phone', addres = '$addres', gender = $gender
				WHERE id = $id ";
		return mysqli_query($conn, $sql);

	}

?>