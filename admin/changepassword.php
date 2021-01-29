<?php 
include '../classes/user.php';
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $adid=Session::get("adminId");
    $admin = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $pass_old = $_POST['pass_old'];
        $pass_new = $_POST['pass_new'];
        $update_pass = $admin -> update_pass($pass_old,$pass_new,$adid); // hàm check catName khi submit lên
        //echo $adid;
    }
?>

  
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thay đổi mật khẩu</h2>
        <div class="block">   
        <?php
            if(isset($update_pass))
            {
                echo $update_pass;
            }
        ?>
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Mật khẩu cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu cũ..."  name="pass_old" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu mới..." name="pass_new" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>