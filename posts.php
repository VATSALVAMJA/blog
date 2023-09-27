<?php
include('connect.php');
include('header.php');
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$sql = "SELECT posts.*,categories.cat_name FROM posts left join categories on posts.cat_id = categories.id where posts.id = " . $id;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// getting post's comments
$comment_sql = "SELECT * from comments where post_id = " . $id;
$result_comment = $conn->query($comment_sql);
// insert comment code start here.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    if ($name == '') {
        header('Location:posts.php?err_msg=Name is required.!');
    } 
    else if ($email == '') {
        if (isset($_REQUEST['edit_id'])) {
            header('Location:posts.php?err_msg=Email Id is required.!');
        } 
        else {
            header('Location:posts.php?err_msg=Email Id is required.!');
        }
    } 
    else if ($message == '') {
        header('Location:posts.php?err_msg=Comment is required.!');
    } 
    else {
        $sql = "INSERT INTO comments (comment,name,email,post_id) VALUES ('$message', '$name','$email','$id')";
        if ($conn->query($sql) === TRUE) {
            header('Location:posts.php?id=' . $id . '&msg=Comment Added Successfully.!');
        } 
        else {
            header('Location:posts.php?id=' . $id . '&msg=Error in comment adding.!');
        }
    }
}
// insert comment code end here.
?>
<div class="row tm-row">
    <div class="col-12">
        <hr class="tm-hr-primary tm-mb-55">
        <!-- Video player 1422x800 -->
        <img src="<?php echo $row['image']; ?>" width="954" height="535">
    </div>
</div>
<div class="row tm-row">
    <div class="col-lg-8 tm-post-col">
        <div class="tm-post-full">
            <div class="mb-4">
                <h2 class="pt-2 tm-color-primary tm-post-title">
                    <?php echo $row['title']; ?>
                </h2>
                <p class="tm-mb-40">
                    <?php echo date('M d,Y', strtotime($row['created_at'])); ?> posted by Admin Nat
                </p>
                <?php echo "<p>" . $row['caption'] . "</p>"; ?>
                <span class="d-block text-right tm-color-primary">
                    <?php echo $row['cat_name']; ?>
                </span>
            </div>
            <!-- Comments -->
            <div>
                <h2 class="tm-color-primary tm-post-title">Comments</h2>
                <hr class="tm-hr-primary tm-mb-45">
                <?php
                while ($row_comment = $result_comment->fetch_assoc()) {
                    ?>
                    <div class="tm-comment tm-mb-45">
                        <figure class="tm-comment-figure">
                            <img src="img/user.jpg" alt="Image" class="mb-2 rounded-circle img-thumbnail"
                                style="height:100px;margin-top: -50px;">
                            <figcaption class="tm-color-primary text-center">
                                <?php echo $row_comment['name']; ?>
                            </figcaption>
                        </figure>
                        <div>
                            <p>
                                <?php echo $row_comment['comment']; ?>
                            </p>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="tm-color-primary">REPLY</a>
                                <span class="tm-color-primary">
                                    <?php echo date('M d,Y', strtotime($row_comment['created_at'])); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php }
                if (isset($_GET['Success_msg'])) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        <?php echo $_GET['success_msg']; ?>
                    </div>
                <?php } 
                else if (isset($_GET['err_msg'])) { ?>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h5><i class="icon fas fa-check"></i> Error!</h5>
                        <?php echo $_GET['err_msg']; ?>
                        </div>
                    <?php } ?>
                <form action="" class="mb-5 tm-comment-form" method="POST">
                    <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                    <div class="mb-4">
                        <input class="form-control" name="name" type="text" placeholder="Full Name">
                    </div>
                    <div class="mb-4">
                        <input class="form-control" name="email" type="text" placeholder="Email">
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control" name="message" rows="6" placeholder="Comment"></textarea>
                    </div>
                    <div class="text-right">
                        <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <aside class="col-lg-4 tm-aside-col">
        <div class="tm-post-sidebar">
            <hr class="mb-3 tm-hr-primary">
            <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
            <ul class="tm-mb-75 pl-5 tm-category-list">
                <?php
                $catSql = "SELECT * from categories";
                $catresult = $conn->query($catSql);
                while ($row = $catresult->fetch_assoc()) {
                    echo '<li><a href="#" class="tm-color-primary">' . $row['cat_name'] . '</a></li>';
                }
                ?>
            </ul>
            <hr class="mb-3 tm-hr-primary">
            <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>

            <?php
            $postssql = "SELECT * from posts LIMIT 3";
            $postsresult = $conn->query($postssql);
            if ($postsresult->num_rows > 0) {
                // output data of each row
                while ($postsrow = $postsresult->fetch_assoc()) { ?>
                <a href="posts.php?id=<?php echo $postsrow['id']; ?>" class="effect-lily d-block  tm-mb-40">
                        <figure>
                            <img src="<?php echo $postsrow['image']; ?>" alt="Image" class="mb-3 img-fluid">
                            <?php echo $postsrow['caption']; ?>
                        </figure>
                    </a>
                <?php }
            }
            ?>
        </div>
    </aside>
</div>
<?php
include('footer.php');
?>