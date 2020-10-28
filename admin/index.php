<?php 
    include_once '../config/myconfig.php';
    include_once 'Function/myFunction.php';
    session_start();
    ob_start();
    if(!isset($_SESSION['id'])){
        header("Location: ../index.php");
    }

    // if (isset($_COOKIE['id_users']) && $_COOKIE['check'] == 1){
    //     setcookie('check', 1, time() +5, '/');
    // }else{
    //     setcookie('check', 1, time() -5, '/');
    //     header("Location: ../index.php");
    // }

    
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'includes/head.php'; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once 'includes/nav.php';  ?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <?php
                    if (isset($_GET['page'])){
                        // page ở đấy có nghĩa của page mình chọn ở nav.php
                        // do mình chọn nav.php
                        $page = $_GET['page'];
                    }else{
                        $page = 'home';
                    }
                    if (file_exists('pages/'.$page.'.php')){  //file_exist() : kiểm tra file có tồn tại hay không
                        include_once "pages/".$page.".php";
                    }else{
                        echo 'Trang không tồn tại';
                    }
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php include_once 'includes/scripts.php'; ?>


</body>

</html>
