 <?php
    if (isset($_POST['submit'])) {
        $facultys_id = $_POST['facultys'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $addres = $_POST['addres'];
        $gender = $_POST['gender'];

        $checkEmail = checkEmail($email);
        // checkEmail khác 1 tức nhiều hơn 1 bản ghi là email đã trùng
        if ($checkEmail != 1){
            $add = insertMember($facultys_id, $name, $phone, $email, $addres, $gender);
            if ($add) {
                // echo "<script>alert('Add success!');";
                // echo "location.href='index.php?pages=list-students';</script>";
                // sau sẽ hướng dẫn khi thêm sẽ ntn chứ ko dùng alert nữa
                $_SESSION['noti'] = 1;
                // quy định ngầm luôn session=1 thì thêm ms, 2 là xóa, 3 là sửa
                header("Location: index.php?page=list-students");
    
            }else{
                echo "<script>alert('Add fail!');</script>";
            }
        }else{
            $errorEmail = "Email đã tồn tại";
        }


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
                 <i class="fa fa-edit"></i> Add Menber
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
                 <input type="text" id="name" required="" name="name" value="<?php if(isset($name)){ echo $name; } ;?>" class="form-control"  placeholder="Input name ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label>Faculty</label>
                 <select class="form-control" name="facultys">
                     <?php
                        $fac = getFacultys();
                        foreach ($fac as $valFac) {
                        ?>
                         <option value="<?php echo $valFac['id']; ?>">
                             <?php echo $valFac['title']; ?>
                         </option>
                     <?php
                        }
                        ?>
                 </select>
             </div>

             <div class="form-group">
                 <label for="phone">Phone</label>
                 <input type="number" id="phone" required="" name="phone" value="<?php if(isset($phone)){ echo $phone; } ;?>"  class="form-control" placeholder="Input phone ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label for="email">Email</label>
                 <span class="txt_errror"><?php if(isset($errorEmail)){ echo $errorEmail;} ;?></span>
                 <input type="email" id="email" required="" name="email" value="<?php if(isset($email)){ echo $email; } ;?>" class="form-control" placeholder="Input email ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label for="addres">Addres</label>
                 <input type="text" id="addres" required="" name="addres" value="<?php if(isset($addres)){ echo $addres; } ;?>" class="form-control" placeholder="Input addres ...">
                 <!-- required : buộc phải nhập ms đc submit -->
             </div>

             <div class="form-group">
                 <label>Gender</label>
                 <label class="radio-inline">
                     <input type="radio" name="gender" id="optionsRadiosInline1" value="0" checked >Men
                 </label>
                 <label class="radio-inline">
                     <input type="radio" name="gender" id="optionsRadiosInline2" value="1">Girl
                 </label>
                 <label class="radio-inline">
                     <input type="radio" name="gender" id="optionsRadiosInline3" value="2">3D
                 </label>
             </div>

             <button type="submit" name="submit" class="btn btn-primary">Add member</button>
             <button type="reset" class="btn btn-default">Reset </button>
             <br>
             <br>

             <!-- <div class="form-group">
                 <label>Static Control</label>
                 <p class="form-control-static">email@example.com</p>
             </div>

             <div class="form-group">
                 <label>File input</label>
                 <input type="file">
             </div>

             <div class="form-group">
                 <label>Text area</label>
                 <textarea class="form-control" rows="3"></textarea>
             </div>

             <div class="form-group">
                 <label>Checkboxes</label>
                 <div class="checkbox">
                     <label>
                         <input type="checkbox" value="">Checkbox 1
                     </label>
                 </div>
                 <div class="checkbox">
                     <label>
                         <input type="checkbox" value="">Checkbox 2
                     </label>
                 </div>
                 <div class="checkbox">
                     <label>
                         <input type="checkbox" value="">Checkbox 3
                     </label>
                 </div>
             </div>

             <div class="form-group">
                 <label>Inline Checkboxes</label>
                 <label class="checkbox-inline">
                     <input type="checkbox">1
                 </label>
                 <label class="checkbox-inline">
                     <input type="checkbox">2
                 </label>
                 <label class="checkbox-inline">
                     <input type="checkbox">3
                 </label>
             </div>

             <div class="form-group">
                 <label>Radio Buttons</label>
                 <div class="radio">
                     <label>
                         <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                     </label>
                 </div>
                 <div class="radio">
                     <label>
                         <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                     </label>
                 </div>
                 <div class="radio">
                     <label>
                         <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                     </label>
                 </div>
             </div>

             <div class="form-group">
                 <label>Inline Radio Buttons</label>
                 <label class="radio-inline">
                     <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                 </label>
                 <label class="radio-inline">
                     <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                 </label>
                 <label class="radio-inline">
                     <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                 </label>
             </div>

             <div class="form-group">
                 <label>Multiple Selects</label>
                 <select multiple class="form-control">
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                     <option>5</option>
                 </select>
             </div> -->
         </form>
     </div>
 </div>