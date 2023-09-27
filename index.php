<?php
include('connect.php');
include('header.php');
$sql = "SELECT posts.*,categories.cat_name FROM posts left join categories on posts.cat_id = categories.id";
$result = $conn->query($sql);
?>
<div class="row tm-row">
    <?php if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) { ?>
            <article class="col-12 col-md-6 tm-post">
                <hr class="tm-hr-primary">
                <a href="posts.php?id=<?php echo $row['id']; ?>" class="effect-lily tm-post-link tm-pt-60">
                    <div class="tm-post-link-inner">
                        <img src="<?php echo $row['image']; ?>" alt="Image" class="img-fluid">
                    </div>
                    <span class="position-absolute tm-new-badge">New</span>
                    <h2 class="tm-pt-30 tm-color-primary tm-post-title">
                        <?php echo $row['title']; ?>
                    </h2>
                </a>
                <p class="tm-pt-30">
                    <?php echo $row['caption']; ?>
                </p>
                <div class="d-flex justify-content-between tm-pt-45">
                    <span class="tm-color-primary">
                        <?php echo $row['cat_name']; ?>
                    </span>
                    <span class="tm-color-primary">
                        <?php echo date('M d,Y', strtotime($row['created_at'])); ?>
                    </span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>36 comments</span>
                    <span>by Admin Nat</span>
                </div>
            </article>
        <?php }
    }
    ?>
</div>
<?php
include('footer.php');
?>