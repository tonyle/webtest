<?php require_once('header.php'); ?>
<div class="col-md-12" style="clear: both; margin-top: 30px;"></div>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_product_category = $row['banner_product_category'];
}
?>

<?php
if( !isset($_REQUEST['id']) || !isset($_REQUEST['type']) ) {
    header('location: index.php');
    exit;
} else {

    if( ($_REQUEST['type'] != 'top-category') && ($_REQUEST['type'] != 'mid-category') && ($_REQUEST['type'] != 'end-category') ) {
        header('location: index.php');
        exit;
    } else {

        $statement = $pdo->prepare("SELECT * FROM tbl_top_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $top[] = $row['tcat_id'];
            $top1[] = $row['tcat_name'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $mid[] = $row['mcat_id'];
            $mid1[] = $row['mcat_name'];
            $mid2[] = $row['tcat_id'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_end_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $end[] = $row['ecat_id'];
            $end1[] = $row['ecat_name'];
            $end2[] = $row['mcat_id'];
        }

        if($_REQUEST['type'] == 'top-category') {
            if(!in_array($_REQUEST['id'],$top)) {
                header('location: index.php');
                exit;
            } 
        }
        
    }   
}
?>
<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Sidebar -->

				<div class="col-md-3 sidebar">
					<div class="sidebar_section">
                    <?php require_once('sidebar-category.php'); ?>
					</div>

				</div>

				<!-- Main Content -->

				<div class="col-md-9 main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">M???c ?????nh</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>M???c ?????nh</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>G??a s???n ph???m</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>T??n s???n ph???m</span></li>
											</ul>
										</li>
										<li>
											<span>Hi???n th???</span>
											<span class="num_sorting_text">6</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
                                                <li class="num_sorting_btn"><span>48</span></li>
                                                <li class="num_sorting_btn"><span>96</span></li>
											</ul>
										</li>
									</ul>
								</div>

								<!-- Product Grid -->

								<div class="product-grid">

                                <?php
                                    if (isset($_GET['id']) && isset($_GET['type'])){
                                        $catid = $_GET['id'];
                                    }
                                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE ecat_id=? AND p_is_active=?");
                                    $statement->execute(array($catid,1));
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                        ?>
                                        <div class="col-md-3 product-item">
                                            <div class="product discount product_filter">
                                                <div class="product_image">
                                                    <img src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="">
                                                </div>
                                                <div class="favorite favorite_left"></div>
                                                <?php 
                                                $percent = ($row['p_old_price'] != '') ? number_format(1 - ($row['p_current_price']/$row['p_old_price']),0): 0;
                                                if ($percent > 0) {
                                                ?>
                                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-<?php echo $percent ?>%</span></div>
                                                <?php } ?>
                                                <div class="product_info">
                                                    <h6 class="product_name"><a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></a></h6>
                                                    <div class="product_price"><?php if($row['p_old_price'] != ''): ?>
                                                            <?php echo $row['p_old_price']; ?>
                                                        <?php endif; ?><span><?php echo $row['p_current_price']; ?> VND</span></div>
                                                </div>
                                            </div>
                                            <div class="red_button add_to_cart_button"><a href="product.php?id=<?php echo $row['p_id']; ?>">Xem chi ti???t</a></div>
                                        </div>
                                        <?php
                                    }
                                    ?>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require_once('footer.php'); ?>
<script src="js/categories_custom.js"></script>