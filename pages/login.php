<?php
    // $acount = array(
    //     1 => array(
    //         'id'    => 1,
    //         'user'  => 'anhduc@gmail.com',
    //         'passw' => '1234',
    //         'name'  => 'admin'
    //     ),
    //     2 => array(
    //         'id'    => 2,
    //         'user'  => 'duc@gmail.com',
    //         'passw' => '12345',
    //         'name'  => 'Van Anh'
    //     )
    // );


    // if (isset($_POST['sm_login'])){
    //     $user  = $_POST['user'];
    //     $passw = $_POST['passw'];
    //     // echo $user ."". $passw;
        
    //     foreach( $acount as $value){
    //         if($user == $value['user'] && $passw == $value['passw']){
    //             $_SESSION['id'] = $value['id'];
    //             $_SESSION['names'] = $value['name'];

    //             setcookie('id_users', $value['id'], time() +5, '/');
    //             setcookie('check', 1, time() +5, '');

    //             header("location: admin/index.php");
    //         }else{
    //             $error = 'Username or password fail';
    //         }
    //     }
    // }

    $token = sha1(mt_rand(1, 90000) . 'SALT');
    $fix = 'abc@123';
    // echo $token;

    if(isset($_POST['sm_login'])){

        $userss  = mysqli_real_escape_string($conn, $_POST['user']);
		$passwFix = mysqli_real_escape_string($conn, $_POST['passw']);
		$passw = md5($passwFix);

        // $userss  = $_POST['user'];
        // $userss  = mysqli_real_escape_string($conn,$_POST['user']) ;
        // echo $userss ."". $passw;
        // die();

        // $passw = md5($_POST['passw']); 
        // $passw = md5($token.$_POST['passw'].$fix);
        // Đang không ra hổi lại thầy

        // echo $user ."". $passw;
        // die();

        // Ngoài việc mã hóa MD5 thì nên sử dụng thêm token để bảo mật
        // tạo 1 cột bên trong CSDL cạnh mật khẩu (search: generating a random token);

        $regexEmail = "";  // là biểu thức regex trong js các bạn có
        // if (!preg_match( $regexEmail, $userss))

        // mysqli_real_escape_string(); hàm cho thêm dấu \ ở đầu

        $sql = "SELECT * FROM tbl_users WHERE email = '$userss' AND passw = '$passw'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query); // lấy thông tin bản ghu

        $count = mysqli_num_rows($query); // đếm số bản ghi trả ra

        echo $count;
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

        if ($count == 1){
            $_SESSION['id'] = $row['id'];
            $_SESSION['names'] = $row['name'];
            header("Location: admin/index.php");
        }else{
            $error = 'Username or password fail';
        }
    } 

?>

<form action="" method="POST">
    <legend>Đăng nhập hệ thống</legend>

    <div class="form-group">
        <label for="">Username</label>
        <input type="email" required name="user" class="form-control" value="<?php if(isset($userss)){echo $userss;} ;?>" placeholder="Nhập email của bạn">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" required name="passw" class="form-control" value="" placeholder="Nhập pass">
    </div>

    <button type="submit" name="sm_login" class="btn btn-primary">Đăng nhập</button>
    <span>Nếu bạn chưa có tài khoản? <a href="index.php?page=register" style="color: red;">Đăng ký</a></span>

    <!-- isset là nó tồn tại -->
    <!-- còn !emty là nó có giá trị (tồn tại nhưng phải khác rỗng) nếu nó tồn tại nhg ko có gtri thì mình ko lấy nó ra -->
    <?php
        if(isset($error) && !empty($error)){
    ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Warning!</strong><?php echo $error; ?>
            </div>
            
    <?php
        }
    ?>
</form>