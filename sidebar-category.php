<div class="sidebar_title">
    <h5>Danh mục</h5>
</div>
<ul class="sidebar_categories">
<?php
    $i=0;
    $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $i++;
        ?>
        <li class="<?php if(isset($_GET['id']) && isset($_GET['type']) && $row['tcat_id'] == $_GET['id']) { echo 'active';} ?>">
            <a class="" href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category">
            <?php if(isset($_GET['id']) && isset($_GET['type']) && $row['tcat_id'] == $_GET['id']) { echo '<i class="fa fa-angle-double-right" aria-hidden="true"></i></span>';} ?>
                <span class="lbl"><?php echo $row['tcat_name']; ?></span>                      
            </a>
        </li>
        <?php
    }
?>
</ul>