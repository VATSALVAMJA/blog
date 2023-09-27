<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
</head>
<body>
    <header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <!-- <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div> -->
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-blog fa-2x"></i></div>
                <h1 class="text-center">Xtra Blog</h1>
            </div>
            <?php
            $url = $_SERVER['PHP_SELF'];
            $file = basename($url);
            if ($file == 'index.php') {
                $isindexActive = 'active';
                $ispostsActive = '';
                $isaboutActive = '';
                $iscontactActive = '';
            } 
            else if ($file == 'posts.php') {
                $ispostsActive = 'active';
                $isindexActive = '';
                $isaboutActive = '';
                $iscontactActive = '';
            } 
            else if ($file == 'about.php') {
                $isaboutActive = 'active';
                $isindexInActive = '';
                $ispostsActive = '';
                $iscontactActive = '';
            } 
            else if ($file == 'contact.php') {
                $iscontactActive = 'active';
                $isindexInActive = '';
                $ispostsActive = '';
                $isaboutActive = '';
            } 
            else {
                $isindexActive = '';
                $isDashActive = 'active';
            }
            ?>
            <nav class="tm-nav" id="tm-nav">
                <ul>
                    <li class="tm-nav-item <?php echo $isindexActive; ?>">
                        <a href="index.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Blog Home
                        </a>
                    </li>
                    <li class="tm-nav-item <?php echo $ispostsActive; ?>">
                        <a href="posts.php" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                            Single Post
                        </a>
                    </li>
                    <li class="tm-nav-item <?php echo $isaboutActive; ?>">
                        <a href="about.php" class="tm-nav-link">
                            <i class="fas fa-users"></i>
                            About Xtra
                        </a>
                    </li>
                    <li class="tm-nav-item <?php echo $iscontactActive; ?>">
                        <a href="contact.php" class="tm-nav-link">
                            <i class="far fa-comments"></i>
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            <p class="tm-mb-80 pr-5 text-white">
                Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar.
                Right side content will scroll up and down.
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="POST" action="search.php" class="form-inline tm-mb-80 tm-search-form">
                        <input class="form-control tm-search-input" name="search_txt" type="text"
                            placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>