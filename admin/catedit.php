<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/category.php';  ?>
<?php
    $cat = new category(); 
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script> window.location = 'catlist.php' </script>";
        // ham nay để quay lại catlist.php
        
    }else {
        $id = $_GET['catid']; // Lấy catid trên host
    }
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $catName = $_POST['catName'];
        $updateCat = $cat -> update_category($catName,$id); // hàm check catName khi submit lên
    }
    
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($updateCat)){
                        echo $updateCat;
                    }
                 ?>
                 <?php 
                    $get_cat_name = $cat->getcatbyId($id);
                    if($get_cat_name){
                        while ($result = $get_cat_name->fetch_assoc()) {
                            
                        
                  ?>
                 <form action="" method="post">
                 <!-- ko the action ="catedit.php" vi khi do no se tai lai catedit ma ko bao gom id  $id = $_GET['catid'];-->
                 <!-- neu action="" thi no se tai lai nguyen duong dan ma ko mat di id -->
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName']; ?>" name="catName" placeholder="Sửa danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php 
                        }
                    }

                     ?>

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>