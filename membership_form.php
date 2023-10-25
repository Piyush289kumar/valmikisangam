<?php include('header.php');
// <!-- PHP Code -->
include("config.php");
if (isset($_POST['submit'])) {
    if (isset($_FILES['fileToUpload'])) {
        if ($_FILES['fileToUpload']["size"] > 10485760) {
            echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
        }
        $info = getimagesize($_FILES['fileToUpload']['tmp_name']);
        if (isset($info['mime'])) {
            if ($info['mime'] == "image/jpeg") {
                $img = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
            } elseif ($info['mime'] == "image/png") {
                $img = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
            } elseif ($info['mime'] == "image/webp") {
                $img = imagecreatefromwebp($_FILES['fileToUpload']['tmp_name']);
            } else {
                echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
            }
            if (isset($img)) {
                $output_img = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload']["name"]) . ".webp";
                imagewebp($img, "admin/upload/member/" . $output_img, 15);
                $for_who = mysqli_real_escape_string($conn, $_POST['for_who']);
                $member_name = mysqli_real_escape_string($conn, $_POST['name']);
                $dob = mysqli_real_escape_string($conn, $_POST['dob']);
                $dot = mysqli_real_escape_string($conn, $_POST['dot']);
                $dol = mysqli_real_escape_string($conn, $_POST['dol']);
                $height = mysqli_real_escape_string($conn, $_POST['height']);
                $rang = mysqli_real_escape_string($conn, $_POST['rang']);
                $manglik = mysqli_real_escape_string($conn, $_POST['manglik']);
                $education = mysqli_real_escape_string($conn, $_POST['education']);
                $business = mysqli_real_escape_string($conn, $_POST['business']);
                $state = mysqli_real_escape_string($conn, $_POST['state']);
                $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $pradesh = mysqli_real_escape_string($conn, $_POST['pradesh']);
                $jila = mysqli_real_escape_string($conn, $_POST['jila']);
                $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
                $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                $fphone = mysqli_real_escape_string($conn, $_POST['fphone']);
                $fbusiness = mysqli_real_escape_string($conn, $_POST['fbusiness']);
                $fgotra = mysqli_real_escape_string($conn, $_POST['fgotra']);
                $mname = mysqli_real_escape_string($conn, $_POST['mname']);
                $mgotra = mysqli_real_escape_string($conn, $_POST['mgotra']);
                $location = mysqli_real_escape_string($conn, $_POST['location']);
                $family = mysqli_real_escape_string($conn, $_POST['family']);
                $post_date = date("d M, Y");
                $id = ("VS" . strtoupper(substr($phone, 5, 5))) . "UID" . strtoupper(substr($member_name, 0, 2));
                $sql_insert_post = "INSERT INTO form_data (id,for_who,name, dob, dot, dol, height, rang, manglik, edu, business, state, phone, email, gender, address, pradesh, jila, pincode, fname, fphone, fbusiness, fgotra, mname, mgotra, location, family, img, date) VALUES ('{$id}','{$for_who}','{$member_name}','{$dob}','{$dot}','{$dol}','{$height}','{$rang}','{$manglik}','{$education}','{$business}','{$state}','{$phone}','{$email}','{$gender}','{$address}','{$pradesh}','{$jila}','{$pincode}','{$fname}','{$fphone}','{$fbusiness}','{$fgotra}','{$mname}','{$mgotra}','{$location}','{$family}','{$output_img}','{$post_date}') ";
                if (mysqli_query($conn, $sql_insert_post)) {
                    $end_username = ("VS" . strtoupper(substr($phone, 5, 5))) . "UID" . strtoupper(substr($member_name, 0, 2));
                    $end_userpassword = mysqli_real_escape_string($conn, md5(strtoupper(substr($member_name, 0, 2)) . "@" . substr($phone, 0, 5) . "&" . substr($phone, 5, 10)));
                    $sql_user_cheack = "SELECT username FROM user WHERE username = '{$end_username}'";
                    $result_user_cheack = mysqli_query($conn, $sql_user_cheack) or die("Query Die ( sql_user_cheack )!!");
                    if (mysqli_num_rows($result_user_cheack) > 0) { ?>
                        <script>alert('Member is already Exsits !!')</script>
                        <?php
                    } else {
                        $sql_insert_user = "INSERT INTO user (first_name, last_name,username,password,role,img)
                    values('{$member_name}','{$member_name}','{$end_username}','{$end_userpassword}','9','{$output_img}')";
                        if (mysqli_query($conn, $sql_insert_user)) {
                            $end_password = strtoupper(substr($member_name, 0, 2)) . "@" . substr($phone, 0, 5) . "&" . substr($phone, 5, 10);
                            ?>
                            <script>alert('आपका Username व Password निम्नानुसार :-\n\n<?php echo "Username : " . $id ?>\n<?php echo "Password : " . $end_password ?>')</script>
                            <?php
                            echo "<script>window.location.href='$hostname/Form_submitted.php'</script>";
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>Form Not Submited</div>";
                }
            }
        }
    }
}
?>
<!-- PHP Code -->
<!-- membership_form end -->
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="images/logo_text.png" alt="Valmiki Sangam"
                style="border-radius:12px; background-color: white; padding: 6px 12px;" />
            <!-- <h3>========</h3>
            <p>-------</p> -->
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">युवक - युवती विवरण<br><span
                            style="font-size: 15px; color: #ff5733;"></span></h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="offset-md-3 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="for_who" style="text-align:center;">
                                        <option class="hidden" value="NONE" selected>रिश्ता किस के लिए चाहिए :
                                        </option>
                                        <option value="स्वयं" style="text-align:left;">1. स्वयं</option>
                                        <option value="भाई" style="text-align:left;">2. भाई</option>
                                        <option value="बहन" style="text-align:left;">3. बहन</option>
                                        <option value="पुत्र" style="text-align:left;">4. पुत्र</option>
                                        <option value="पुत्री" style="text-align:left;">5. पुत्री</option>
                                        <option value="अन्य" style="text-align:left;">5. अन्य</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="नाम : *" name="name"
                                        autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="जन्म तिथि" name="dob"
                                        autocomplete="off" onfocus="(this.type='date')" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="जन्म समय :" name="dot"
                                        autocomplete="off" onfocus="(this.type='time')" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="जन्म स्थान :" name="dol"
                                        autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="height">
                                        <option class="hidden" value="NONE" selected>कद/उंचाई :</option>
                                        <option value="3.5-4.0 feet">1. 3.5-4.0 feet</option>
                                        <option value="4.0-4.5 feet">2. 4.0-4.5 feet</option>
                                        <option value="4.5-5.0 feet">3. 4.5-5.0 feet</option>
                                        <option value="5.0-5.5 feet">4. 5.0-5.5 feet</option>
                                        <option value="5.5-6.0 feet">5. 5.5-6.0 feet</option>
                                        <option value="6.0-6.5 feet">6. 6.0-6.5 feet</option>
                                        <option value="6.5-7.0 feet">7. 6.5-7.0 feet</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="rang">
                                        <option class="hidden" value="NONE" selected>रंग :</option>
                                        <option value="गोरा">1. गोरा</option>
                                        <option value="गेरूआ">2. गेरूआ</option>
                                        <option value="साॅवला">3. साॅवला</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="manglik">
                                        <option class="hidden" value="NONE" selected>मांगलिक :</option>
                                        <option value="हां">1. हां</option>
                                        <option value="नहीं">2. नहीं</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="शैक्षणिक योग्यता : *"
                                        name="education" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="व्यवसाय :" name="business"
                                        autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="state">
                                        <option class="hidden" value="NONE" selected>अविवाहित/तलाकशुदा/विधुर :</option>
                                        <option value="अविवाहित">1. अविवाहित</option>
                                        <option value="तलाकशुदा">2. तलाकशुदा</option>
                                        <option value="विधुर">3. विधुर</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"
                                        placeholder="मोबा./व्हाट्सएप नंबर : *" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="ई-मेल : *" name="email"
                                        autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <div class="maxl" name="gender" autocomplete="off">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="पुरूष" checked>
                                            <span> पुरूष </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="महिला">
                                            <span>महिला </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">पासपोर्ट फोटो *</label>
                                    <input type="file" name="fileToUpload" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="निवास स्थान का पूर्ण पता : *"
                                        name="address" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="pradesh">
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
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="जिला :" name="jila"
                                        autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="6" maxlength="10" class="form-control"
                                        placeholder="पिनकोड :" name="pincode" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="पिता का नाम : *" name="fname"
                                        autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="fphone" class="form-control"
                                        placeholder="पिता का मोबा. नंबर : *" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="पिता का व्यवसाय :"
                                        name="fbusiness" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="पिता का गोत्र :" name="fgotra"
                                        autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="माता का नाम :" name="mname"
                                        autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="माता का गोत्र :" name="mgotra"
                                        autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="किस लोकेशन में रिश्ता चाहिए :"
                                        name="location" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control"
                                        placeholder="परिवार मे सदस्यों की संख्या :" name="family" autocomplete="off" />
                                </div>
                                <input type="submit" name="submit" class="btnRegister" value="पंजीकृत करें" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- membership_form end -->
<?php include('footer.php'); ?>