﻿<?php require_once ('inc/header.php');?>
<?php require_once ('inc/sidebar.php');?>
<?php require_once ('../classes/brand.php');?>
<?php require_once ('../classes/category.php');?>
<?php require_once ('../classes/product.php');?>
<?php require_once ('../helpers/format.php');?>
<?php
	$pd = new product();
	$fm = new Format(); 
	        if(isset($_GET['productid'])){
		$id = $_GET['productid'];
		 $delpro = $pd->del_product($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
        	<?php 
        	if(isset($delpro)){
        		echo $delpro;
        	}
        		?>
        	
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$pdlist = $pd->show_product();
					if($pdlist){
						$i = 0;
						while($result = $pdlist->fetch_assoc()){
							$i++;
				?>
				<tr class="gradeU">
					<td><?php echo $i?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image']?>" width="50"></td>
					<td><?php echo $result['catId']?></td>
					<td><?php echo $result['brandId']?></td>
					<td><?php echo $fm->textShorten( $result['product_desc'], 20)?></td>
					<td><?php 
						if($result['type'] == 1 ){
							echo 'Feathered';
						}else{
							echo 'Non Feathered';
						}
					?>
						
					</td>
					<td><a href="productedit.php?productid= <?php echo  $result['productId'] ?>">Edit</a> || <a href="?productid= <?php echo  $result['productId'] ?>">Delete</td>
					<td class="center">-</td>
				</tr>
				<?php
			}
		}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
