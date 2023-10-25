<?php include('header.php');
include("config.php");
// for exiting user only
if (isset($_GET['user_detail'])) {
    $user_detail = $_GET['user_detail'];
} else {
    $user_detail = NULL;
}
if (isset($_POST['submit'])) {
    $for_who = "कुंड़ली मिलान";
    $member_name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $dot = mysqli_real_escape_string($conn, $_POST['dot']);
    $dol = mysqli_real_escape_string($conn, $_POST['dol']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['genderMale']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pradesh = mysqli_real_escape_string($conn, $_POST['pradesh']);
    $jila = mysqli_real_escape_string($conn, $_POST['jila']);
    $bride_member_name = mysqli_real_escape_string($conn, $_POST['bride_name']);
    $bride_dob = mysqli_real_escape_string($conn, $_POST['bride_dob']);
    $bride_dot = mysqli_real_escape_string($conn, $_POST['bride_dot']);
    $bride_dol = mysqli_real_escape_string($conn, $_POST['bride_dol']);
    $bride_phone = mysqli_real_escape_string($conn, $_POST['bride_phone']);
    $bride_gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $bride_address = mysqli_real_escape_string($conn, $_POST['bride_address']);
    $bride_pradesh = mysqli_real_escape_string($conn, $_POST['bride_pradesh']);
    $bride_jila = mysqli_real_escape_string($conn, $_POST['bride_jila']);
    $process = "Pending";
    $output_img = "userProfile.webp";
    $post_date = date("d M, Y");
    $id = ("VS" . strtoupper(substr($phone, 5, 5))) . "UID" . strtoupper(substr($member_name, 0, 2));
    // for exiting user only 
    $sql_user_exit_check = "SELECT * FROM form_data WHERE id = '{$id}'";
    $result_sql_user_exit_check = mysqli_query($conn, $sql_user_exit_check) or die("Query Die!! --> sql_show_category");
    if (mysqli_num_rows($result_sql_user_exit_check) > 0) {
        // For exiting user only 
        $sql_insert_astro_request = "INSERT INTO kundali_milan (main_profile,b_name, b_phone, b_gender, b_dob, b_dot, b_dol, b_add, b_pradesh, b_jila, b_date, process) values('{$id}','{$bride_member_name}','{$bride_phone}','{$bride_gender}','{$bride_dob}','{$bride_dot}','{$bride_dol}','{$bride_address}','{$bride_pradesh}','{$bride_jila}','{$post_date}','{$process}')";
        if (mysqli_query($conn, $sql_insert_astro_request)) {
            ?>
                                                                                                                                                                                                                                                <script>alert('Exiting User आपका पंजीयन सफलतापूर्वक संपन्न हुआ')</script>
                                                                                                                                                                                                                                                <?php
                                                                                                                                                                                                                                                echo "<script>window.location.href='$hostname/astroForm_submitted.php'</script>";

        } else {
            echo "<script>window.location.href='$hostname/astrology.php'</script>";
        }
    } else {
        $sql_insert_post = "INSERT INTO form_data (id,for_who, name, dob, dot, dol, phone, gender, address, pradesh, jila, img, date) VALUES ('{$id}','{$for_who}','{$member_name}','{$dob}','{$dot}','{$dol}','{$phone}','{$gender}','{$address}','{$pradesh}','{$jila}','{$output_img}','{$post_date}')";
        if (mysqli_query($conn, $sql_insert_post)) {
            $end_username = ("VS" . strtoupper(substr($phone, 5, 5))) . "UID" . strtoupper(substr($member_name, 0, 2));
            $sql_user_cheack = "SELECT username FROM user WHERE username = '{$end_username}'";
            $result_user_cheack = mysqli_query($conn, $sql_user_cheack) or die("Query Die ( sql_user_cheack )!!");
            $end_userpassword = mysqli_real_escape_string($conn, md5(strtoupper(substr($member_name, 0, 2)) . "@" . substr($phone, 0, 5) . "&" . substr($phone, 5, 10)));
            // astrotalk
            $sql_insert_astro_request = "INSERT INTO kundali_milan (main_profile,b_name, b_phone, b_gender, b_dob, b_dot, b_dol, b_add, b_pradesh, b_jila, b_date, process)
                  values('{$end_username}','{$bride_member_name}','{$bride_phone}','{$bride_gender}','{$bride_dob}','{$bride_dot}','{$bride_dol}','{$bride_address}','{$bride_pradesh}','{$bride_jila}','{$post_date}','{$process}')";
            if (mysqli_query($conn, $sql_insert_astro_request)) {
                // userinsert
                $sql_insert_user = "INSERT INTO user (first_name, last_name,username,password,role,img)
      values('{$member_name}','{$member_name}','{$end_username}','{$end_userpassword}','9','{$output_img}')";
                if (mysqli_query($conn, $sql_insert_user)) {
                    $end_password = strtoupper(substr($member_name, 0, 2)) . "@" . substr($phone, 0, 5) . "&" . substr($phone, 5, 10);
                    ?>
                                                                                                                                                                                                                                                                                                                                                                                                                <script>alert('आपका Username व Password निम्नानुसार :-\n\n<?php echo "Username : " . $id ?>\n<?php echo "Password : " . $end_password ?>')</script>
                                                                                                                                                                                                                                                                                                                                                                                                                <?php
                                                                                                                                                                                                                                                                                                                                                                                                                echo "<script>window.location.href='$hostname/astroForm_submitted.php'</script>";
                }
            }
        }
    }
}
?>
<div class="container">
    <!-- Home Page Section Start -->
    <section>
        <div class="row">
            <div class="col-12">
                <p class="heading_program">• कुंड़ली मिलान •</p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 p-4"
                style="background: #fff; border: 1px solid gainsboro; border-radius: 24px; height:50%;">
                <!-- For Loging User Form -->
                <div class="col-md-12 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php
                        $sql_gender = "SELECT * FROM form_data WHERE id = '{$user_detail}' LIMIT 1";
                        $result_sql_gender = mysqli_query($conn, $sql_gender) or die("Query Die!! --> sql_gender");
                        $userGenger = NULL;
                        if (mysqli_num_rows($result_sql_gender) > 0) {
                            while ($genderRow = mysqli_fetch_assoc($result_sql_gender)) {
                                $userGenger = $genderRow['gender'];
                            }
                        }
                        if ($userGenger == "पुरूष") { ?>
                                                                                <!-- Male Form -->
                                                                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                                                                    <div class="row register-form">
                                                                                        <?php
                                                                                        if ($user_detail <> NULL) {
                                                                                            $sql_show_category = "SELECT * FROM form_data WHERE id = '{$user_detail}' LIMIT 1";
                                                                                            $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Die!! --> sql_show_category");
                                                                                            if (mysqli_num_rows($result_sql_show_category) > 0) {
                                                                                                while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                                                                                                    ?>
                                                                                                                                                                                                                            <div class="col-md-6 p-4">
                                                                                                                                                                                                                            <h5 style="color: #ff5733; text-align:center;" class="mb-4">वर विवरण पत्रक</h5>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="नाम : *"
                                                                                                                                                                                                                                        name="name" value="<?php echo $row['name'] ?>" autocomplete="off" required />
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <input type="text" minlength="10" maxlength="10" name="phone"
                                                                                                                                                                                                                                        class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *" value="<?php echo $row['phone'] ?>"
                                                                                                                                                                                                                                        autocomplete="off" required />
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <div class="maxl" name="genderMale" autocomplete="off">
                                                                                                                                                                                                                                        <label class="radio inline">
                                                                                                                                                                                                                                            <input type="radio" name="genderMale" value="पुरूष" checked>
                                                                                                                                                                                                                                            <span> पुरूष </span>
                                                                                                                                                                                                                                        </label>
                                                                                                                                                                                                                                        <label class="radio inline">
                                                                                                                                                                                                                                            <input type="radio" name="genderMale" value="महिला" disabled>
                                                                                                                                                                                                                                            <span>महिला </span>
                                                                                                                                                                                                                                        </label>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जन्म तिथि" value="<?php echo $row['dob'] ?>"
                                                                                                                                                                                                                                        name="dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                                                                                                                                                                        required />
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जन्म समय :" value="<?php echo $row['dot'] ?>"
                                                                                                                                                                                                                                        name="dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                                                                                                                                                                        required />
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जन्म स्थान :" value="<?php echo $row['dol'] ?>"
                                                                                                                                                                                                                                        name="dol" autocomplete="off" required />
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <input type="text" class="form-control"
                                                                                                                                                                                                                                        placeholder="निवास स्थान का पूर्ण पता : *" value="<?php echo $row['address'] ?>"
                                                                                                                                                                                                                                        name="address"
                                                                                                                                                                                                                                        autocomplete="off" required />
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                    <select class="form-control" name="pradesh" required>
                                                                                                                                                                                                                                        <option selected value="<?php echo $row['pradesh'] ?>">
                                                                                                                                                                                                                                                                                                    <?php echo $row['pradesh'] ?>
                                                                                                                                                                                                                                                                                                  </option>
                                                                                                                                                                                                                                            <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                                                                                                                                                                            <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                                                                                                                                                                            <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                                                                                                                                                                            <option value='असम'>3. असम</option>
                                                                                                                                                                                                                                            <option value='बिहार'>4. बिहार</option>
                                                                                                                                                                                                                                            <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                                                                                                                                                                            <option value='गोवा'>6. गोवा</option>
                                                                                                                                                                                                                                            <option value='गुजरात'>7. गुजरात</option>
                                                                                                                                                                                                                                            <option value='हरयाणा'>8. हरयाणा</option>
                                                                                                                                                                                                                                            <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                                                                                                                                                                            <option value='झारखंड'>10. झारखंड</option>
                                                                                                                                                                                                                                            <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                                                                                                                                                                            <option value='केरल'>12. केरल</option>
                                                                                                                                                                                                                                            <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                                                                                                                                                                            <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                                                                                                                                                                            <option value='मणिपुर'>15. मणिपुर</option>
                                                                                                                                                                                                                                            <option value='मेघालय'>16. मेघालय</option>
                                                                                                                                                                                                                                            <option value='मिजोरम'>17. मिजोरम</option>
                                                                                                                                                                                                                                            <option value='नगालैंड'>18. नगालैंड</option>
                                                                                                                                                                                                                                            <option value='ओडिशा'>19. ओडिशा</option>
                                                                                                                                                                                                                                            <option value='पंजाब'>20. पंजाब</option>
                                                                                                                                                                                                                                            <option value='राजस्थान'>21. राजस्थान</option>
                                                                                                                                                                                                                                            <option value='सिक्किम'>22. सिक्किम</option>
                                                                                                                                                                                                                                            <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                                                                                                                                                                            <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                                                                                                                                                                            <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                                                                                                                                                                            <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                                                                                                                                                                            <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                                                                                                                                                                            <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जिला :" name="jila" value="<?php echo $row['jila'] ?>"
                                                                                                                                                                                                                                                                                                                                                        autocomplete="off" required />
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                            <?php }
                                                                                            }
                                                                                        } else {
                                                                                            ?>
                                                                                                                                <div class="col-md-6 p-4">
                                                                                                                                                                                    <h5 style="color: #ff5733; text-align:center;" class="mb-4">वर विवरण पत्रक</h5>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <input type="text" class="form-control" placeholder="नाम : *"
                                                                                                                                                                                                name="name" autocomplete="off" required />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <input type="text" minlength="10" maxlength="10" name="phone"
                                                                                                                                                                                                class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *"
                                                                                                                                                                                                autocomplete="off" required />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <div class="maxl" name="genderMale" autocomplete="off">
                                                                                                                                                                                                <label class="radio inline">
                                                                                                                                                                                                    <input type="radio" name="genderMale" value="पुरूष" checked>
                                                                                                                                                                                                    <span> पुरूष </span>
                                                                                                                                                                                                </label>
                                                                                                                                                                                                <label class="radio inline">
                                                                                                                                                                                                    <input type="radio" name="genderMale" value="महिला" disabled>
                                                                                                                                                                                                    <span>महिला </span>
                                                                                                                                                                                                </label>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जन्म तिथि"
                                                                                                                                                                                                name="dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                                                                                                                                required />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जन्म समय :"
                                                                                                                                                                                                name="dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                                                                                                                                required />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जन्म स्थान :"
                                                                                                                                                                                                name="dol" autocomplete="off" required />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <input type="text" class="form-control"
                                                                                                                                                                                                placeholder="निवास स्थान का पूर्ण पता : *" name="address"
                                                                                                                                                                                                autocomplete="off" required />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <select class="form-control" name="pradesh" required>
                                                                                                                                                                                                <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                                                                                                                                <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                                                                                                                                <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                                                                                                                                <option value='असम'>3. असम</option>
                                                                                                                                                                                                <option value='बिहार'>4. बिहार</option>
                                                                                                                                                                                                <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                                                                                                                                <option value='गोवा'>6. गोवा</option>
                                                                                                                                                                                                <option value='गुजरात'>7. गुजरात</option>
                                                                                                                                                                                                <option value='हरयाणा'>8. हरयाणा</option>
                                                                                                                                                                                                <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                                                                                                                                <option value='झारखंड'>10. झारखंड</option>
                                                                                                                                                                                                <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                                                                                                                                <option value='केरल'>12. केरल</option>
                                                                                                                                                                                                <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                                                                                                                                <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                                                                                                                                <option value='मणिपुर'>15. मणिपुर</option>
                                                                                                                                                                                                <option value='मेघालय'>16. मेघालय</option>
                                                                                                                                                                                                <option value='मिजोरम'>17. मिजोरम</option>
                                                                                                                                                                                                <option value='नगालैंड'>18. नगालैंड</option>
                                                                                                                                                                                                <option value='ओडिशा'>19. ओडिशा</option>
                                                                                                                                                                                                <option value='पंजाब'>20. पंजाब</option>
                                                                                                                                                                                                <option value='राजस्थान'>21. राजस्थान</option>
                                                                                                                                                                                                <option value='सिक्किम'>22. सिक्किम</option>
                                                                                                                                                                                                <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                                                                                                                                <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                                                                                                                                <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                                                                                                                                <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                                                                                                                                <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                                                                                                                                <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                                                                                                                            </select>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जिला :" name="jila"
                                                                                                                                                                                                autocomplete="off" required />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                        </div>
                                                                                        <div class="col-md-6 p-4">
                                                                                            <h5 style="color: #ff5733; text-align:center;" class="mb-4">वधु विवरण पत्रक</h5>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <input type="text" class="form-control" placeholder="नाम : *"
                                                                                                        name="bride_name" autocomplete="off" required />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <input type="text" minlength="10" maxlength="10" name="bride_phone"
                                                                                                        class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *"
                                                                                                        autocomplete="off" required />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <div class="maxl" name="gender" autocomplete="off">
                                                                                                        <label class="radio inline">
                                                                                                            <input type="radio" name="gender" value="पुरूष" disabled>
                                                                                                            <span> पुरूष </span>
                                                                                                        </label>
                                                                                                        <label class="radio inline">
                                                                                                            <input type="radio" name="gender" value="महिला" checked>
                                                                                                            <span>महिला </span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <input type="text" class="form-control" placeholder="जन्म तिथि"
                                                                                                        name="bride_dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                                        required />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <input type="text" class="form-control" placeholder="जन्म समय :"
                                                                                                        name="bride_dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                                        required />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <input type="text" class="form-control" placeholder="जन्म स्थान :"
                                                                                                        name="bride_dol" autocomplete="off" required />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <input type="text" class="form-control"
                                                                                                        placeholder="निवास स्थान का पूर्ण पता : *" name="bride_address"
                                                                                                        autocomplete="off" required />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <select class="form-control" name="bride_pradesh" required>
                                                                                                        <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                                        <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                                        <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                                        <option value='असम'>3. असम</option>
                                                                                                        <option value='बिहार'>4. बिहार</option>
                                                                                                        <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                                        <option value='गोवा'>6. गोवा</option>
                                                                                                        <option value='गुजरात'>7. गुजरात</option>
                                                                                                        <option value='हरयाणा'>8. हरयाणा</option>
                                                                                                        <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                                        <option value='झारखंड'>10. झारखंड</option>
                                                                                                        <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                                        <option value='केरल'>12. केरल</option>
                                                                                                        <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                                        <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                                        <option value='मणिपुर'>15. मणिपुर</option>
                                                                                                        <option value='मेघालय'>16. मेघालय</option>
                                                                                                        <option value='मिजोरम'>17. मिजोरम</option>
                                                                                                        <option value='नगालैंड'>18. नगालैंड</option>
                                                                                                        <option value='ओडिशा'>19. ओडिशा</option>
                                                                                                        <option value='पंजाब'>20. पंजाब</option>
                                                                                                        <option value='राजस्थान'>21. राजस्थान</option>
                                                                                                        <option value='सिक्किम'>22. सिक्किम</option>
                                                                                                        <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                                        <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                                        <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                                        <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                                        <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                                        <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 my-2">
                                                                                                <div class="form-group">
                                                                                                    <input type="text" class="form-control" placeholder="जिला :"
                                                                                                        name="bride_jila" autocomplete="off" required />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12" style="display: flex; justify-content: center;">
                                                                                        <input type="submit" name="submit" class="btnRegister"
                                                                                            style="background-color: #ff5733; max-height:60px; border: 1px solid transparent; border-radius: 12px; margin-top: 0px;"
                                                                                            value="पंजीकृत करें" required />
                                                                                    </div>
                                                                                </form>
                                                                                <!-- Male Form -->
                                                                        <?php
                        } else if ($userGenger == "महिला") {
                            ?>
                                                                                                <!-- Female Form -->
                                                                                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                                                                                    <div class="row register-form">
                                                                                                        <div class="col-md-6 p-4">
                                                                                                            <h5 style="color: #ff5733; text-align:center;" class="mb-4">वर विवरण पत्रक</h5>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" class="form-control" placeholder="नाम : *"
                                                                                                                        name="bride_name" autocomplete="off" required />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" minlength="10" maxlength="10" name="bride_phone"
                                                                                                                        class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *"
                                                                                                                        autocomplete="off" required />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <div class="maxl" name="gender" autocomplete="off">
                                                                                                                        <label class="radio inline">
                                                                                                                            <input type="radio" name="gender" value="पुरूष" checked>
                                                                                                                            <span> पुरूष </span>
                                                                                                                        </label>
                                                                                                                        <label class="radio inline">
                                                                                                                            <input type="radio" name="gender" value="महिला" disabled>
                                                                                                                            <span>महिला </span>
                                                                                                                        </label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" class="form-control" placeholder="जन्म तिथि"
                                                                                                                        name="bride_dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                                                        required />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" class="form-control" placeholder="जन्म समय :"
                                                                                                                        name="bride_dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                                                        required />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" class="form-control" placeholder="जन्म स्थान :"
                                                                                                                        name="bride_dol" autocomplete="off" required />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" class="form-control"
                                                                                                                        placeholder="निवास स्थान का पूर्ण पता : *" name="bride_address"
                                                                                                                        autocomplete="off" required />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <select class="form-control" name="bride_pradesh" required>
                                                                                                                        <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                                                        <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                                                        <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                                                        <option value='असम'>3. असम</option>
                                                                                                                        <option value='बिहार'>4. बिहार</option>
                                                                                                                        <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                                                        <option value='गोवा'>6. गोवा</option>
                                                                                                                        <option value='गुजरात'>7. गुजरात</option>
                                                                                                                        <option value='हरयाणा'>8. हरयाणा</option>
                                                                                                                        <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                                                        <option value='झारखंड'>10. झारखंड</option>
                                                                                                                        <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                                                        <option value='केरल'>12. केरल</option>
                                                                                                                        <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                                                        <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                                                        <option value='मणिपुर'>15. मणिपुर</option>
                                                                                                                        <option value='मेघालय'>16. मेघालय</option>
                                                                                                                        <option value='मिजोरम'>17. मिजोरम</option>
                                                                                                                        <option value='नगालैंड'>18. नगालैंड</option>
                                                                                                                        <option value='ओडिशा'>19. ओडिशा</option>
                                                                                                                        <option value='पंजाब'>20. पंजाब</option>
                                                                                                                        <option value='राजस्थान'>21. राजस्थान</option>
                                                                                                                        <option value='सिक्किम'>22. सिक्किम</option>
                                                                                                                        <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                                                        <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                                                        <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                                                        <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                                                        <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                                                        <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 my-2">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" class="form-control" placeholder="जिला :"
                                                                                                                        name="bride_jila" autocomplete="off" required />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php
                                                                                                        if ($user_detail <> NULL) {
                                                                                                            $sql_show_category = "SELECT * FROM form_data WHERE id = '{$user_detail}' LIMIT 1";
                                                                                                            $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Die!! --> sql_show_category");
                                                                                                            if (mysqli_num_rows($result_sql_show_category) > 0) {
                                                                                                                while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                                                                                                                    ?>
                                                                                                                                                                                                                                            <div class="col-md-6 p-4">
                                                                                                                                                                                                                                            <h5 style="color: #ff5733; text-align:center;" class="mb-4">वधु विवरण पत्रक</h5>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="नाम : *"
                                                                                                                                                                                                                                                        name="name" value="<?php echo $row['name'] ?>" autocomplete="off" required />
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <input type="text" minlength="10" maxlength="10" name="phone"
                                                                                                                                                                                                                                                        class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *" value="<?php echo $row['phone'] ?>"
                                                                                                                                                                                                                                                        autocomplete="off" required />
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <div class="maxl" name="genderFemale" autocomplete="off">
                                                                                                                                                                                                                                                        <label class="radio inline">
                                                                                                                                                                                                                                                            <input type="radio" name="genderFemale" value="पुरूष" disabled>
                                                                                                                                                                                                                                                            <span> पुरूष </span>
                                                                                                                                                                                                                                                        </label>
                                                                                                                                                                                                                                                        <label class="radio inline">
                                                                                                                                                                                                                                                            <input type="radio" name="genderMale" value="महिला" checked>
                                                                                                                                                                                                                                                            <span>महिला </span>
                                                                                                                                                                                                                                                        </label>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जन्म तिथि" value="<?php echo $row['dob'] ?>"
                                                                                                                                                                                                                                                        name="dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                                                                                                                                                                                        required />
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जन्म समय :" value="<?php echo $row['dot'] ?>"
                                                                                                                                                                                                                                                        name="dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                                                                                                                                                                                        required />
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जन्म स्थान :" value="<?php echo $row['dol'] ?>"
                                                                                                                                                                                                                                                        name="dol" autocomplete="off" required />
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <input type="text" class="form-control"
                                                                                                                                                                                                                                                        placeholder="निवास स्थान का पूर्ण पता : *" value="<?php echo $row['address'] ?>"
                                                                                                                                                                                                                                                        name="address"
                                                                                                                                                                                                                                                        autocomplete="off" required />
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                    <select class="form-control" name="pradesh" required>
                                                                                                                                                                                                                                                        <option selected value="<?php echo $row['pradesh'] ?>">
                                                                                                                                                                                                                                                                                                    <?php echo $row['pradesh'] ?>
                                                                                                                                                                                                                                                                                                                  </option>
                                                                                                                                                                                                                                                            <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                                                                                                                                                                                            <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                                                                                                                                                                                            <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                                                                                                                                                                                            <option value='असम'>3. असम</option>
                                                                                                                                                                                                                                                            <option value='बिहार'>4. बिहार</option>
                                                                                                                                                                                                                                                            <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                                                                                                                                                                                            <option value='गोवा'>6. गोवा</option>
                                                                                                                                                                                                                                                            <option value='गुजरात'>7. गुजरात</option>
                                                                                                                                                                                                                                                            <option value='हरयाणा'>8. हरयाणा</option>
                                                                                                                                                                                                                                                            <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                                                                                                                                                                                            <option value='झारखंड'>10. झारखंड</option>
                                                                                                                                                                                                                                                            <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                                                                                                                                                                                            <option value='केरल'>12. केरल</option>
                                                                                                                                                                                                                                                            <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                                                                                                                                                                                            <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                                                                                                                                                                                            <option value='मणिपुर'>15. मणिपुर</option>
                                                                                                                                                                                                                                                            <option value='मेघालय'>16. मेघालय</option>
                                                                                                                                                                                                                                                            <option value='मिजोरम'>17. मिजोरम</option>
                                                                                                                                                                                                                                                            <option value='नगालैंड'>18. नगालैंड</option>
                                                                                                                                                                                                                                                            <option value='ओडिशा'>19. ओडिशा</option>
                                                                                                                                                                                                                                                            <option value='पंजाब'>20. पंजाब</option>
                                                                                                                                                                                                                                                            <option value='राजस्थान'>21. राजस्थान</option>
                                                                                                                                                                                                                                                            <option value='सिक्किम'>22. सिक्किम</option>
                                                                                                                                                                                                                                                            <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                                                                                                                                                                                            <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                                                                                                                                                                                            <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                                                                                                                                                                                            <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                                                                                                                                                                                            <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                                                                                                                                                                                            <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                            <div class="col-md-12 my-2">
                                                                                                                                                                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                    <input type="text" class="form-control" placeholder="जिला :" name="jila" value="<?php echo $row['jila'] ?>"
                                                                                                                                                                                                                                                                                                                                                                        autocomplete="off" required />
                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                            <?php }
                                                                                                            }
                                                                                                        } else {
                                                                                                            ?>
                                                                                                                                                <div class="col-md-6 p-4">
                                                                                                                                                                                                    <h5 style="color: #ff5733; text-align:center;" class="mb-4">वधु विवरण पत्रक</h5>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <input type="text" class="form-control" placeholder="नाम : *"
                                                                                                                                                                                                                name="name" autocomplete="off" required />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <input type="text" minlength="10" maxlength="10" name="phone"
                                                                                                                                                                                                                class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *"
                                                                                                                                                                                                                autocomplete="off" required />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <div class="maxl" name="genderMale" autocomplete="off">
                                                                                                                                                                                                                <label class="radio inline">
                                                                                                                                                                                                                    <input type="radio" name="genderMale" value="पुरूष" disabled>
                                                                                                                                                                                                                    <span> पुरूष </span>
                                                                                                                                                                                                                </label>
                                                                                                                                                                                                                <label class="radio inline">
                                                                                                                                                                                                                    <input type="radio" name="genderMale" value="महिला" checked>
                                                                                                                                                                                                                    <span>महिला </span>
                                                                                                                                                                                                                </label>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जन्म तिथि"
                                                                                                                                                                                                                name="dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                                                                                                                                                required />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जन्म समय :"
                                                                                                                                                                                                                name="dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                                                                                                                                                required />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जन्म स्थान :"
                                                                                                                                                                                                                name="dol" autocomplete="off" required />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <input type="text" class="form-control"
                                                                                                                                                                                                                placeholder="निवास स्थान का पूर्ण पता : *" name="address"
                                                                                                                                                                                                                autocomplete="off" required />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <select class="form-control" name="pradesh" required>
                                                                                                                                                                                                                <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                                                                                                                                                <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                                                                                                                                                <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                                                                                                                                                <option value='असम'>3. असम</option>
                                                                                                                                                                                                                <option value='बिहार'>4. बिहार</option>
                                                                                                                                                                                                                <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                                                                                                                                                <option value='गोवा'>6. गोवा</option>
                                                                                                                                                                                                                <option value='गुजरात'>7. गुजरात</option>
                                                                                                                                                                                                                <option value='हरयाणा'>8. हरयाणा</option>
                                                                                                                                                                                                                <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                                                                                                                                                <option value='झारखंड'>10. झारखंड</option>
                                                                                                                                                                                                                <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                                                                                                                                                <option value='केरल'>12. केरल</option>
                                                                                                                                                                                                                <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                                                                                                                                                <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                                                                                                                                                <option value='मणिपुर'>15. मणिपुर</option>
                                                                                                                                                                                                                <option value='मेघालय'>16. मेघालय</option>
                                                                                                                                                                                                                <option value='मिजोरम'>17. मिजोरम</option>
                                                                                                                                                                                                                <option value='नगालैंड'>18. नगालैंड</option>
                                                                                                                                                                                                                <option value='ओडिशा'>19. ओडिशा</option>
                                                                                                                                                                                                                <option value='पंजाब'>20. पंजाब</option>
                                                                                                                                                                                                                <option value='राजस्थान'>21. राजस्थान</option>
                                                                                                                                                                                                                <option value='सिक्किम'>22. सिक्किम</option>
                                                                                                                                                                                                                <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                                                                                                                                                <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                                                                                                                                                <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                                                                                                                                                <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                                                                                                                                                <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                                                                                                                                                <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                                                                                                                                            </select>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-md-12 my-2">
                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                            <input type="text" class="form-control" placeholder="जिला :" name="jila"
                                                                                                                                                                                                                autocomplete="off" required />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12" style="display: flex; justify-content: center;">
                                                                                                        <input type="submit" name="submit" class="btnRegister"
                                                                                                            style="background-color: #ff5733; max-height:60px; border: 1px solid transparent; border-radius: 12px; margin-top: 0px;"
                                                                                                            value="पंजीकृत करें" required />
                                                                                                    </div>
                                                                                                </form>
                                                                                                <!-- Female Form -->
                                                                        <?php
                        } else { ?>
                                                            <!-- Normale Form -->
                                                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="row register-form">
                                                                <div class="col-md-6 p-4">
                                                                            <h5 style="color: #ff5733; text-align:center;" class="mb-4">वर विवरण पत्रक</h5>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="नाम : *"
                                                                                        name="name" autocomplete="off" required />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <input type="text" minlength="10" maxlength="10" name="phone"
                                                                                        class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *"
                                                                                        autocomplete="off" required />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <div class="maxl" name="genderMale" autocomplete="off">
                                                                                        <label class="radio inline">
                                                                                            <input type="radio" name="genderMale" value="पुरूष" checked>
                                                                                            <span> पुरूष </span>
                                                                                        </label>
                                                                                        <label class="radio inline">
                                                                                            <input type="radio" name="genderMale" value="महिला" disabled>
                                                                                            <span>महिला </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="जन्म तिथि"
                                                                                        name="dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                        required />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="जन्म समय :"
                                                                                        name="dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                        required />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="जन्म स्थान :"
                                                                                        name="dol" autocomplete="off" required />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control"
                                                                                        placeholder="निवास स्थान का पूर्ण पता : *" name="address"
                                                                                        autocomplete="off" required />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <select class="form-control" name="pradesh" required>
                                                                                        <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                        <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                        <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                        <option value='असम'>3. असम</option>
                                                                                        <option value='बिहार'>4. बिहार</option>
                                                                                        <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                        <option value='गोवा'>6. गोवा</option>
                                                                                        <option value='गुजरात'>7. गुजरात</option>
                                                                                        <option value='हरयाणा'>8. हरयाणा</option>
                                                                                        <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                        <option value='झारखंड'>10. झारखंड</option>
                                                                                        <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                        <option value='केरल'>12. केरल</option>
                                                                                        <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                        <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                        <option value='मणिपुर'>15. मणिपुर</option>
                                                                                        <option value='मेघालय'>16. मेघालय</option>
                                                                                        <option value='मिजोरम'>17. मिजोरम</option>
                                                                                        <option value='नगालैंड'>18. नगालैंड</option>
                                                                                        <option value='ओडिशा'>19. ओडिशा</option>
                                                                                        <option value='पंजाब'>20. पंजाब</option>
                                                                                        <option value='राजस्थान'>21. राजस्थान</option>
                                                                                        <option value='सिक्किम'>22. सिक्किम</option>
                                                                                        <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                        <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                        <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                        <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                        <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                        <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 my-2">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" placeholder="जिला :" name="jila"
                                                                                        autocomplete="off" required />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <div class="col-md-6 p-4">
                                                                        <h5 style="color: #ff5733; text-align:center;" class="mb-4">वधु विवरण पत्रक</h5>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" placeholder="नाम : *"
                                                                                    name="bride_name" autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <input type="text" minlength="10" maxlength="10" name="bride_phone"
                                                                                    class="form-control" placeholder="मोबा./व्हाट्सएप नंबर : *"
                                                                                    autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <div class="maxl" name="gender" autocomplete="off">
                                                                                    <label class="radio inline">
                                                                                        <input type="radio" name="gender" value="पुरूष" disabled>
                                                                                        <span> पुरूष </span>
                                                                                    </label>
                                                                                    <label class="radio inline">
                                                                                        <input type="radio" name="gender" value="महिला" checked>
                                                                                        <span>महिला </span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" placeholder="जन्म तिथि"
                                                                                    name="bride_dob" autocomplete="off" onfocus="(this.type='date')"
                                                                                    required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" placeholder="जन्म समय :"
                                                                                    name="bride_dot" autocomplete="off" onfocus="(this.type='time')"
                                                                                    required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" placeholder="जन्म स्थान :"
                                                                                    name="bride_dol" autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="निवास स्थान का पूर्ण पता : *" name="bride_address"
                                                                                    autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <select class="form-control" name="bride_pradesh" required>
                                                                                    <option class="hidden" value="NONE" selected>प्रदेश :</option>
                                                                                    <option value='आंध्र प्रदेश'>1. आंध्र प्रदेश</option>
                                                                                    <option value='अरुणाचल प्रदेश'>2. अरुणाचल प्रदेश</option>
                                                                                    <option value='असम'>3. असम</option>
                                                                                    <option value='बिहार'>4. बिहार</option>
                                                                                    <option value='छत्तीसगढ'>5. छत्तीसगढ</option>
                                                                                    <option value='गोवा'>6. गोवा</option>
                                                                                    <option value='गुजरात'>7. गुजरात</option>
                                                                                    <option value='हरयाणा'>8. हरयाणा</option>
                                                                                    <option value='हिमाचल प्रदेश'>9. हिमाचल प्रदेश</option>
                                                                                    <option value='झारखंड'>10. झारखंड</option>
                                                                                    <option value='कर्नाटक'>11. कर्नाटक</option>
                                                                                    <option value='केरल'>12. केरल</option>
                                                                                    <option value='मध्य प्रदेश'>13. मध्य प्रदेश</option>
                                                                                    <option value='महाराष्ट्र'>14. महाराष्ट्र</option>
                                                                                    <option value='मणिपुर'>15. मणिपुर</option>
                                                                                    <option value='मेघालय'>16. मेघालय</option>
                                                                                    <option value='मिजोरम'>17. मिजोरम</option>
                                                                                    <option value='नगालैंड'>18. नगालैंड</option>
                                                                                    <option value='ओडिशा'>19. ओडिशा</option>
                                                                                    <option value='पंजाब'>20. पंजाब</option>
                                                                                    <option value='राजस्थान'>21. राजस्थान</option>
                                                                                    <option value='सिक्किम'>22. सिक्किम</option>
                                                                                    <option value='तमिलनाडु'>23. तमिलनाडु</option>
                                                                                    <option value='तेलंगाना'>24. तेलंगाना</option>
                                                                                    <option value='त्रिपुरा'>25. त्रिपुरा</option>
                                                                                    <option value='उतार प्रदेश'>26. उतार प्रदेश</option>
                                                                                    <option value='उत्तराखंड'>27. उत्तराखंड</option>
                                                                                    <option value='पश्चिम बंगाल'>28. पश्चिम बंगाल</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" placeholder="जिला :"
                                                                                    name="bride_jila" autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                        <div class="col-12" style="display: flex; justify-content: center;">
                                            <input type="submit" name="submit" class="btnRegister"
                                                style="background-color: #ff5733; max-height:60px; border: 1px solid transparent; border-radius: 12px; margin-top: 0px;"
                                                value="पंजीकृत करें" required />
                                        </div>
                        <?php } ?>
                            </form>
                            <!-- normale Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Page Section End -->
</div>
<?php include('footer.php');