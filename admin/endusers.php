<?php include "header.php";


if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 9) {
    header("Location:{$hostname}/admin/");
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <div class="col-md-3">
                </div>
                <div class="col-md-2">
                    <a class="add-new" href="users.php" style="border-radius: 16px; color:white; margin-bottom: 5px;">Admin Users</a>
                </div>
                <div class="col-md-2">
                <a class="add-new" href="astro_users.php" style="border-radius: 16px; color:white; margin-bottom: 5px;">Jyotishi</a>
                </div>
                <div class="col-md-2">
                <a class="add-new" href="endusers.php" style="background:#E1412E; border-radius: 16px; color:white; margin-bottom: 5px;">End Users</a>
                </div>
            </div>
            <div class="col-md-10">
                <h5 class="admin-heading">All End Users</h5>
            </div>
            <div class="col-md-12"  style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Profile</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <!-- PHP CODE -->
                        <?php
                        include("config.php");
                        if (isset($_GET['page_num_index'])) {
                            $page_num_index_by_addbar = $_GET['page_num_index'];
                        } else {
                            $page_num_index_by_addbar = 1;
                        }

                        $record_limit = 5;
                        $offset = ($page_num_index_by_addbar - 1) * $record_limit;
                        $sql_show_user = "SELECT * FROM user WHERE role = '9' ORDER BY user_id DESC LIMIT {$offset},{$record_limit}";
                        $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                        if (mysqli_num_rows($result_sql_show_user) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_user)) {

                                ?>
                                <tr>
                                    <td class='id'>
                                        <?php echo ($serial_num); ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <img src="upload/member/<?php echo ($row['img']) ?>" alt="Error"
                                            style="height: 65px; border-radius:50%;">

                                    </td>
                                    <td>
                                        <?php echo ($row['first_name'] . " " . $row['last_name']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['username']) ?>
                                    </td>
                                    <td>
                                        <?php if ($row['role'] == 1) {
                                            echo ("Admin");
                                        } elseif ($row['role'] == 0) {
                                            echo ("Local");
                                        } elseif ($row['role'] == 5) {
                                            echo ("Astrologiest");
                                        } else {
                                            echo ("End User");
                                        } ?>
                                    </td>
                                    <td class='edit'><a href='update-user.php?id=<?php echo ($row["username"]) ?>'><i
                                                class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-user.php?id=<?php echo ($row["username"]) ?>'><i
                                                class='fa fa-trash'></i></a></td>
                                </tr>

                                <?php $serial_num++;
                            }
                        } ?>
                        <!-- PHP CODE -->

                    </tbody>
                </table>
                <!-- Pagination PHHP CODE -->
                <?php
                $sql_user_show_by_page = "SELECT * FROM user WHERE role = '9'";
                $result_sql_user_show_by_page = mysqli_query($conn, $sql_user_show_by_page) or die("Query Die --> sql_user_show_by_page");
                if (mysqli_num_rows($result_sql_user_show_by_page) > 0) {
                    $total_user_record = mysqli_num_rows($result_sql_user_show_by_page);

                    $total_page = ceil($total_user_record / $record_limit);
                    echo ("<ul class='pagination admin-pagination'>");

                    if ($page_num_index_by_addbar > 1) {
                        echo ("<li><a href='endusers.php?page_num_index=" . ($page_num_index_by_addbar - 1) . "'>Prev</a></li>");
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($page_num_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }

                        echo ("<li class=$active_page><a href='endusers.php?page_num_index=$i'>$i</a></li>");
                    }

                    if ($page_num_index_by_addbar < $total_page) {
                        echo ("<li><a href='endusers.php?page_num_index=" . ($page_num_index_by_addbar + 1) . "'>Next</a></li>");
                    }
                    echo ("</ul>");
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>