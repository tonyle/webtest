<?php require_once('header.php'); ?>
<div class="col-md-12" style="clear: both; margin-top: 180px;"></div>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
   $about_title = $row['about_title'];
    $about_content = $row['about_content'];
    $about_banner = $row['about_banner'];
}
?>

<div class="page">
    <div class="container">
        <div class="row">    
            <div class="col-md-12">
                <h3>Giới thiệu</h3>
            </div>        
            <div class="col-md-12">
                <p>
                    <?php echo $about_content; ?>
                </p>

            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>