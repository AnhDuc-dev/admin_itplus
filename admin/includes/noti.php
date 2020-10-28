<?php  
if (isset($_SESSION['noti']) && $_SESSION['noti'] == 1) {
?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Thông báo!</strong> Thêm mới thành công!
    </div>
<?php
}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 2) {
?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Thông báo!</strong> Xóa thành công!
    </div>
<?php
}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 3) {
?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Thông báo!</strong> Sửa thành công!
    </div>
<?php
}
unset($_SESSION['noti']);
?>
<!-- Sau nên tạo cái phần thông báo thành 1 file riêng
Quy định ngầm 1: thêm , 2: xóa, 3: sửa -->