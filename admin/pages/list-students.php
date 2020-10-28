<?php
    if(isset($_POST['submit_search'])){
        $key = $_POST['key'];
        $rs = searchMember($key);

    }else{
        $rs = getMember();
    }

    // echo "<pre>";
    // print_r($rs);
    // echo "</pre>";
?>

<!-- Navigation -->
        
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <br>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Tables
                </li>
            </ol>
        <!-- Cảnh báo -->
        <?php include_once 'includes/noti.php'; ?>
            
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <h2>Danh sách học viên</h2>
            <form action="" method="POST" role="form" style="margin-bottom: 20px;">
                <div class="input-group">
                    <input type="numbere" name="key" class="form-control" required="" placeholder="Input phone search..." value="<?php if(isset($key)) { echo $key; } ?>" aria-describedby="sizing-addon2">
                    <span class="input-group-addon" id="sizing-addon2">
                        <button type="submit" style="background: none;border: none;" name="submit_search">Search</button>
                    </span>
                </div>
            </form>
        
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Addres</th>
						    <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $stt = 0; 
                            foreach ($rs as $value){
                                $stt += 1;
                        ?>
                        <tr>
                            <td><?php echo $stt ;?></td>
                            <td><?php echo $value['name'] ;?></td>
                            <td><?php echo $value['title'] ;?></td>
                            <td><?php echo $value['phone'] ;?></td>
                            <td><?php echo $value['email'] ;?></td>
                            <td><?php echo $value['addres'] ;?></td>
                            <td>
                                <!-- <button class="btn btn-primary">Edit</button> -->
                                <a href="index.php?page=update-member&id=<?php echo $value['id']; ?>" >
									<button class="btn btn-primary">Edit</button>
								</a>
                            </td>
							<td>
								<a href="index.php?page=delete-member&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có thực sự muốn xóa họ viên này không? ');">
									<button class="btn btn-danger">Delete</button>
								</a>
							</td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <!-- /.row -->
