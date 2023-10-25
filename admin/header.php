<?php
include("config.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:{$hostname}/admin/");
}
$current_page = basename($_SERVER['PHP_SELF']);
$prefix_word = "ADMIN Panel";
switch ($current_page) {
    // case 'add-category.php':
    //     $page_title = "{$prefix_word} - Category Add";
    //     break;
    // case 'add-post.php':
    //     $page_title = "{$prefix_word} - Post Add";
    //     break;
    case 'add-user.php':
        $page_title = "{$prefix_word} - User Add";
        break;
    // case 'category.php':
    //     $page_title = "{$prefix_word} - Category";
    //     break;
    // case 'post.php':
    //     $page_title = "{$prefix_word} - Post";
    //     break;
    // case 'settings.php':
    //     $page_title = "{$prefix_word} - Settings";
    //     break;
    // case 'update-category.php':
    //     $page_title = "{$prefix_word} - Category Update";
    //     break;
    // case 'update-post.php':
    //     $page_title = "{$prefix_word} - Post Update";
    //     break;
    case 'update-user.php':
        $page_title = "{$prefix_word} - User Update";
        break;
    case 'users.php':
        $page_title = "{$prefix_word} - Users";
        break;
    case 'member.php':
        $page_title = "{$prefix_word} - Members";
        break;
    case 'update-member.php':
        $page_title = "{$prefix_word} - Member Update";
        break;
    default:
        $page_title = $website_display_default_name;
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?php echo ($page_title); ?>
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min_.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" /> -->
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/adminstyle_.css">
    <link rel="shortcut icon" type="x-con" href="../images/VSlogo.png">
</head>

<body>
    <!-- HEADER -->
    <div id="header-admin">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row logo_cover">
                <!-- LOGO -->
                <div class="col-md-3 logo_cover">
                    <a href="index.php" id="logo"><img src="../images/admin_logo.png" alt="Valmiki Sangam"></a>
                </div>
                <!-- /LOGO -->
                <!-- LOGO-Out -->
                <div class="col-md-offset-6  col-md-3">
                    <a href="<?php echo $hostname; ?>" class="admin-logout">Hello <?php echo $_SESSION['username']; ?>,
                        back</a>
                </div>
                <!-- /LOGO-Out -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="admin-menu">
                        <?php
                        if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 0) {
                            ?>
                            <li>
                                <a href="member.php">Member</a>
                            </li>
                            <li>
                                <a href="post.php">post</a>
                            </li>
                        <?php } ?>

                        <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                            <li>
                                <a href="want_to_talk.php">Response</a>
                            </li>
                        <?php } ?>
                        <?php
                        if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 5) {
                            ?>

                            <li>
                                <a href="astro_admin.php">Astro</a>
                            </li>
                            <?php
                        } ?>
                        <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>

                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <?php
                        }
                        ?>

                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->