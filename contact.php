<?php require_once('header.php'); ?>
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<div class="col-md-12" style="clear: both; margin-top: 180px;"></div>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $contact_title = $row['contact_title'];
    $contact_banner = $row['contact_banner'];
}
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $contact_map_iframe = $row['contact_map_iframe'];
    $contact_email = $row['contact_email'];
    $contact_phone = $row['contact_phone'];
    $contact_address = $row['contact_address'];
}
?>
<div class="page">
	<div class="container">
		<div class="row">
                <div class="col-lg-12 contact_col">
                    <div class="contact_contents">
                        <h1>Liên hệ với chúng tôi</h1>
                        <p>Bạn hãy chọn những cách thức liên hệ dưới đây</p>
                        <div>
                            <p>Qua số điện thoại: </p>
                            <p>0909.999.999</p>
                            <p>Qua email: </p>
                            <p>Do_An_NhomB_UEH@gmail.com</p>
                        </div>
                        <div>
                            <p>mở cửa từ 8 giờ sáng đến 10 giờ tối hàng ngày từ T2-CN</p>
                        </div>
                    </div>

                    <!-- Follow Us -->

                    <div class="follow_us_contents">
                        <h1>Theo dõi chúng tôi qua: </h1>
                        <ul class="social d-flex flex-row">
                            <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
<script src="js/contact_custom.js"></script>