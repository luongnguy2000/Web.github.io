<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php' ?>
<?php  	
	$brand = new brand();
	if(isset($_GET['brandid']) ||  $_GET['brandid'] == NULL){
		$id = $_GET['brandid'];
	}
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $brandName = $_POST['brandName'];


        $updateBrand = $brand->update_brand($brandName,$id);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>

               <div class="block copyblock"> 
                <?php
                if(isset($updateBrand)){
                    echo $updateBrand;
                }
                ?>
                <?php
                	$get_brand_name = $brand->getbrandbyId($id);
                	if($get_brand_name){
                		while ($result= $get_brand_name->fetch_assoc()) {
                		 
					?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Edit Brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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