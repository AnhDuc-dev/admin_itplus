<?php
    // Lấy id sinh viên cần sửa
    if (isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $row = getMember_id($id);

        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

        if (isset($_POST['submit'])) {
            $facultys_id = $_POST['facultys'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];  
            $addres = $_POST['addres']; 
            $gender = $_POST['gender'];
    
            $update = upMember($id, $facultys_id, $name, $phone, $addres, $gender);
            if($update){
                $_SESSION['noti'] = 3;
                header("location: index.php?page=list-students");
            }else{
                echo "<script>alert('Update fail!');</script>";
            }
        }
    }else{
	    header("Location: index.php?page=list-students");
    }
   
?>
    
 <!-- Page Heading -->
 <div class="row">
     <div class="col-lg-12">
         <br>
         <ol class="breadcrumb">
             <li>
                 <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
             </li>
             <li class="active">
                 <i class="fa fa-edit"></i> Update Menber
             </li>
         </ol>
     </div>
 </div>
 <!-- /.row -->

 <div class="row">
     <div class="col-lg-12">

         <form action="" method="POST">

             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" id="name" required="" name="name" value="<?php echo $row['name'] ;?>" class="form-control"  placeholder="Input name ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label>Faculty</label>
                 <select class="form-control" name="facultys">
                     <?php
                        $fac = getFacultys();
                        foreach ($fac as $valFac) {
                     ?>
                         <option 
                            <?php if($valFac['id'] == $row['facultys_id']) {echo "selected";}?> 
                                value="<?php echo $valFac['id']; ?>" >
                            <?php echo $valFac['title']; ?>
                         </option>
                     <?php
                        }
                    ?>
                 </select>
             </div>

             <div class="form-group">
                 <label for="phone">Phone</label>
                 <input type="number" id="phone" required="" name="phone" value="<?php echo $row['phone'] ;?>" class="form-control" placeholder="Input phone ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label for="email">Email</label>
                 <!-- Trong Input disabled để ngay cho sửa trường email vừa nó còn lquan đến tài khoản -->
                 <input disabled="" type="email" id="email" required="" name="email" value="<?php echo $row['email'] ;?>" class="form-control" placeholder="Input email ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label for="addres">Addres</label>
                 <input type="text" id="addres" required="" name="addres" value="<?php echo $row['addres'] ;?>" class="form-control" placeholder="Input addres ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label>Gender</label>
                 <label class="radio-inline">
                 
                     <input type="radio" name="gender" id="optionsRadiosInline1" value="0" <?php if($row['gender'] == 0){echo "checked";} ?> >Men
                 </label>
                 <label class="radio-inline">
                     <input type="radio" name="gender" id="optionsRadiosInline2" value="1" <?php if($row['gender'] == 1){echo "checked";} ?>  >Girl
                 </label>
                 <label class="radio-inline">
                     <input type="radio" name="gender" id="optionsRadiosInline3" value="2" <?php if($row['gender'] == 2){echo "checked";} ?> >3D
                 </label>
             </div>

             <button type="submit" name="submit" class="btn btn-primary">Update member</button>
             <button type="reset" class="btn btn-default">Reset </button>
             <br>
             <br>
         </form>
     </div>
 </div>