<?php require_once('header.php'); ?>
<div class="col-md-12" style="clear: both; margin-top: 180px;"></div>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $faq_title = $row['faq_title'];
    $faq_banner = $row['faq_banner'];
}
?>
<div class="page">
    <div class="container">
        <div class="row">      
            <div class="col-md-12">
                <h3><?php echo $faq_title; ?></h3>
            </div>      
            <div class="col-md-12">
                
                <div class="panel-group" id="faqAccordion">                    

                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_faq");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question<?php echo $row['faq_id']; ?>">
                                <h4 class="panel-title">
                                    Hỏi: <?php echo $row['faq_title']; ?>
                                </h4>
                            </div>
                            <div id="question<?php echo $row['faq_id']; ?>" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <h5><span class="label label-primary">Trả lời</span></h5>
                                    <p>
                                        <?php echo $row['faq_content']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    
                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>