<?php include('header.php'); ?>
<div class="container">
    <!-- Card Section -->
    <section>
        <div class="row">
            <div class="col-12">
                <p class="heading_program">सामाजिक गतिविधियाॅ</p>
            </div>
      
            
                        <!-- PHP CODE -->
                        <?php
                        include("config.php");
                        if (isset($_GET['page_index'])) {
                            $page_index_by_addbar = $_GET['page_index'];
                        } else {
                            $page_index_by_addbar = 1;
                        }
                        $record_limi = 10;
                        $offset = ($page_index_by_addbar - 1) * $record_limi;
                        $sql_show_category = "SELECT * FROM post ORDER BY post_id DESC LIMIT {$offset},{$record_limi}";
                        $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                        if (mysqli_num_rows($result_sql_show_category) > 0) {
                            $serial_num = 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                                ?>
                                <!-- card block start -->
                                <div class="col-md-3 mb-3">
                                    <div class="card cardbg" style="border: 2px solid transparent; border-radius: 12px;">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <a href="single_post.php?post_id=<?php echo ($row['post_id']) ?>">
                                                <img src="admin/upload/<?php echo ($row['post_img']) ?>" class="img-fluid"
                                                    style="border: 1px solid transparent; border-radius: 12px;" /></a>
                                            <a href="single_post.php?post_id=<?php echo ($row['post_id']) ?>">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <!-- <h5 class="card-title">Post Title</h5>  -->
                                            <p class="card-text"><?php echo substr($row['title'],0,180).'...'; ?></p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="piconcart" style="margin: 4px 4px;"><i
                                                            class="fa-solid fa-calendar-days" style="padding-right: 5px;"></i>
                                                        <?php echo $row['post_date'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <a href="single_post.php?post_id=<?php echo ($row['post_id']) ?>" class="btn btn-primary"
                                                style="border: 1px solid transparent; border-radius: 18px; margin-top: 5px; background-color: #F27E00;">देखिए</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card block end -->
                                <?php $serial_num++;
                            }
                        }
                        ?>
                  
          
            <?php
            // pagenation block start
            $sql_total_post_record = "SELECT * from post" or die("Query Failed !! --> sql_total_post_record");
            $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
            if (mysqli_num_rows($result_sql_total_post_record) > 0) {
                $total_post_record = mysqli_num_rows($result_sql_total_post_record);
                $total_page = ceil($total_post_record / $record_limi);
                echo ("<ul class='pagination admin-pagination'>");
                if ($page_index_by_addbar > 1) {
                    echo ("<li><a href='$hostname/post.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page_index_by_addbar == $i) {
                        $active_page = "active";
                    } else {
                        $active_page = "";
                    }
                    echo ("<li class=$active_page><a href='$hostname/post.php?page_index=$i'>$i</a></li>");
                }
                if ($page_index_by_addbar < $total_page) {
                    echo ("<li><a href='$hostname/post.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
                }
                echo ("</ul>");
            }
            // pagenation block end
            ?>
        </div>
    </section>
    <!-- Card Section -->
</div>
<?php include('footer.php'); ?>