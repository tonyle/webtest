<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    $cta_title = $row['cta_title'];
    $cta_content = $row['cta_content'];
    $cta_read_more_text = $row['cta_read_more_text'];
    $cta_read_more_url = $row['cta_read_more_url'];
    $cta_photo = $row['cta_photo'];
    $featured_product_title = $row['featured_product_title'];
    $featured_product_subtitle = $row['featured_product_subtitle'];
    $latest_product_title = $row['latest_product_title'];
    $latest_product_subtitle = $row['latest_product_subtitle'];
    $popular_product_title = $row['popular_product_title'];
    $popular_product_subtitle = $row['popular_product_subtitle'];
    $total_featured_product_home = $row['total_featured_product_home'];
    $total_latest_product_home = $row['total_latest_product_home'];
    $total_popular_product_home = $row['total_popular_product_home'];
    $home_service_on_off = $row['home_service_on_off'];
    $home_welcome_on_off = $row['home_welcome_on_off'];
    $home_featured_product_on_off = $row['home_featured_product_on_off'];
    $home_latest_product_on_off = $row['home_latest_product_on_off'];
    $home_popular_product_on_off = $row['home_popular_product_on_off'];

}
?>
<?php
    $i=0;
    $statement = $pdo->prepare("SELECT * FROM tbl_slider limit 1");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
    foreach ($result as $row) {            
        ?>
        <div class="main_slider" style="background-image:url(<?php echo $row['photo'] ?>)">
            <div class="container fill_height">
                <div class="row align-items-center fill_height">
                    <div class="col">
                        <div class="main_slider_content">
                            <h6><?php echo $row['heading'] ?></h6>
                            <h1><?php echo $row['content'] ?></h1>
                            <div class="red_button shop_now_button"><a href="<?php echo $row['button_url'] ?>"><?php echo $row['button_text'] ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $i++;
    }
?>


<div class="banner">
    <div class="container">
        <div class="row">
        <?php
            $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                ?>
                <div class="col-md-4">
                <div class="banner_item align-items-center thumbnail" style="background-image:url(<?php echo $row['photo'] ?>)">
                    <div class="banner_category">
                        <a href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name'] ?></a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tất cả</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">Nữ</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">Phụ kiện</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">Nam</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? LIMIT ".$total_featured_product_home);
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
                        <div class="product-item men">
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
                                    <div class="product_price"><?php if($row['p_old_price'] != ''){ ?>
                                    <del>
                                        $<?php echo $row['p_old_price']; ?>
                                    </del>
                                    <?php } ?><strong><?php echo $row['p_current_price']; ?> đ</strong></div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="product.php?id=<?php echo $row['p_id']; ?>">Xem chi tiết</a></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Sản phẩm mới</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product_slider_container">
                    <div class="owl-carousel owl-theme product_slider">
                        <?php
                        $i=0;
                        $statement1 = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_id DESC LIMIT ".$total_latest_product_home);
                        $statement1->execute(array(1));
                        $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);                            
                        foreach ($result1 as $row1) {
                        ?>
                        <div class="owl-item product_slider_item">
                            <div class="product-item">
                                <div class="product discount">
                                    <div class="product_image">
                                        <img src="assets/uploads/<?php echo $row1['p_featured_photo']; ?>" alt="">
                                    </div>
                                    <div class="favorite <?php if ($i%5==0){ ?>favorite_left <?php } ?>"></div>
                                   
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Mới</span></div>
                                 
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="product.php?id=<?php echo $row1['p_id']; ?>"><?php echo $row1['p_name']; ?></a></h6>
                                        <div class="product_price"><?php if($row1['p_old_price'] != ''){ ?>
                                            <del>
                                                $<?php echo $row1['p_old_price']; ?>
                                            </del>
                                            <?php } ?><strong><?php echo $row1['p_current_price']; ?> đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                    <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </div>
                    <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Miễn ship</h6>
							<p>Đạt giá trị mua hàng tối thiểu</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Giao hàng nhanh chóng</h6>
							<p>Chỉ từ 1-2 ngày</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Đổi trả hàng trong vòng 7 ngày nhận sản phẩm</h6>
							<p>Chúng tôi luôn tôn trọng bạn</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>mở cửa cả tuần không nghỉ</h6>
							<p>8 giờ sáng đến 10 giờ tối</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require_once('footer.php'); ?>