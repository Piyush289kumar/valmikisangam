<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row mt-4">
        <!-- Left section -->
        <div class="col-md-8">
            <div class="row">
                <?php
                $program_by_addbar = $_GET['post_id'];
                $sql_show_category = "SELECT * FROM post
                                              LEFT JOIN user ON post.author = user.user_id where post_id = '{$program_by_addbar}'";
                $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                if (mysqli_num_rows($result_sql_show_category) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                        ?>
                        <div class="col-12">
                            <h2 class="singlePostTitle">
                                <?php echo $row['title'] ?>
                            </h2>
                        </div>
                        <div class="col-12 my-3">
                            <img src="admin/upload/<?php echo $row['post_img'] ?>" alt="unlink" srcset=""
                                style="border-radius: 12px;">
                        </div>
                        <!-- postDetails -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12 flexuser">
                                        <img src="admin/upload/member/<?php echo $row['img'] ?>" alt="Error" srcset="" id="userimg">
                                        <div class="userinfo">
                                            <p id="usericon"> <i class="fa-solid fa-user"></i>
                                                <?php echo ' ' . $row['username'] ?>
                                            </p>
                                            <p id="usericon"> <i class="fa-solid fa-calendar-days"> </i>
                                                <?php echo ' ' . $row['post_date'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- postDetails -->
                        <!-- PostDescription -->
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <p id="PostDescription">
                                    <?php echo $row['description'] ?>
                                </p>
                            </div>
                        </div>
                        <!-- PostDescription -->
                    <?php }
                } ?>
            </div>
        </div>
        <!-- Left section -->
        <!-- Right section -->
        <div class="col-md-4">
            <!-- Video section -->
            <div class="row">
                <div class="col-md-12 my-3">
                    <h5>चलचित्र</h5>

                    <?php
                $sql_show_user = "SELECT * FROM post where post_id = '{$program_by_addbar}'";
                $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                if (mysqli_num_rows($result_sql_show_user) > 0) {

                    while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                ?>
                            <iframe
                        width="100%" height="250"                    
                        src="https://www.youtube.com/embed/<?php echo $row['vlink']?>" 
                        title="YouTube video player" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                        picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                <?php
                    }
                }

                ?>

                   
                </div>
            </div>
            <div class="row cardcover">
                <div class="col-12 my-3">
                    <h5>सामाजिक गतिविधियाॅ</h5>
                </div>
                <?php
                $sql_show_category = "SELECT * FROM post ORDER BY post_id DESC LIMIT 10";
                $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                if (mysqli_num_rows($result_sql_show_category) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                        ?>
                        <!-- horizontal Card Start -->
                        <div class="col-4 my-1"><a href="single_post.php?post_id=<?php echo $row['post_id']?>"><img src="admin/upload/<?php echo $row['post_img'];?>" alt="Unlink"
                                    srcset=""></a>
                        </div>
                        <div class="col-8">
                            <a href="single_post.php?post_id=<?php echo $row['post_id']?>">
                                <p class="m-0 mb-1" style="overflow:hidden"><?php echo ' '. $row['title']; ?></p>
                            </a>
                            <p style="font-size: 12px; margin: 0; padding: 0;"><i class="fa-solid fa-calendar-days"></i><?php echo ' ' .  $row['post_date'] ?></p>
                        </div>
                        <!-- horizontal Card End -->
                    <?php }
                }
                ?>
            </div>
            <!-- Video section -->
            <!-- Card -->
            <!-- Card -->
        </div>
        <!-- Right section -->
    </div>
    <!-- media section start -->
    <section>
        <div class="row mb-4">
            <div class="col-12">
                <p class="heading_program" style="font-size:1.4rem">• मीडिया गैलरी •</p>
            </div>
            <?php
            $program_by_addbar = $_GET['post_id'];
            $sql_show_category = "SELECT * FROM post
                                              LEFT JOIN user ON post.author = user.user_id where post_id = '{$program_by_addbar}'";
            $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
            if (mysqli_num_rows($result_sql_show_category) > 0) {
                while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                    ?>
                    <div class="col-md-3 my-1">
                        <img src="admin/upload/<?php echo $row['post_img_2'] ?>" alt="Unlink" srcset=""
                            style="border-radius: 8px;">
                    </div>
                    <div class="col-md-3 my-1">
                        <img src="admin/upload/<?php echo $row['post_img_3'] ?>" alt="Unlink" srcset=""
                            style="border-radius: 8px;">
                    </div>
                    <div class="col-md-3 my-1">
                        <img src="admin/upload/<?php echo $row['post_img_4'] ?>" alt="Unlink" srcset=""
                            style="border-radius: 8px;">
                    </div>
                    <div class="col-md-3 my-1">
                        <img src="admin/upload/<?php echo $row['post_img_5'] ?>" alt="Unlink" srcset=""
                            style="border-radius: 8px;">
                    </div>
                <?php }
            }
            ?>
        </div>
    </section>
    <!-- media section end -->
</div>
<?php include('footer.php'); ?>