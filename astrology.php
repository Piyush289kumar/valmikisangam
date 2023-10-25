<?php include('header.php');
include("config.php");
// for exiting user only
if (isset($_GET['user_detail'])) {
  $user_detail = $_GET['user_detail'];
} else {
  $user_detail = NULL;
}
if (isset($_POST['submit'])) {
  $for_who = mysqli_real_escape_string($conn, $_POST['for_who']);
  $astro_talk_process = "Pending";
  $member_name = mysqli_real_escape_string($conn, $_POST['name']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $dot = mysqli_real_escape_string($conn, $_POST['dot']);
  $dol = mysqli_real_escape_string($conn, $_POST['dol']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $pradesh = mysqli_real_escape_string($conn, $_POST['pradesh']);
  $jila = mysqli_real_escape_string($conn, $_POST['jila']);
  $output_img = "userProfile.webp";
  $post_date = date("d M, Y");
  $id = ("VS" . strtoupper(substr($phone, 5, 5))) . "UID" . strtoupper(substr($member_name, 0, 2));

  // for exiting user only 
  $sql_user_exit_check = "SELECT * FROM form_data WHERE id = '{$user_detail}'";
  $result_sql_user_exit_check = mysqli_query($conn, $sql_user_exit_check) or die("Query Die!! --> sql_show_category");
  if (mysqli_num_rows($result_sql_user_exit_check) > 0) {
    // For exiting user only 
    $sql_insert_astro_request = "INSERT INTO astro_talk (user_id, astro_category,astro_date, astro_talk_process)
                values('{$user_detail}','{$for_who}','{$post_date}','{$astro_talk_process}')";
    if (mysqli_query($conn, $sql_insert_astro_request)) {
      ?>
      <script>alert('आपका पंजीयन सफलतापूर्वक संपन्न हुआ')</script>
      <?php
      echo "<script>window.location.href='$hostname/astroForm_submitted.php'</script>";
      die();
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
      $sql_insert_astro_request = "INSERT INTO astro_talk (user_id, astro_category,astro_date, astro_talk_process)
                  values('{$end_username}','{$for_who}','{$post_date}','{$astro_talk_process}')";
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
        <p class="heading_program">|| श्री गणेशाय: नमः ||</p>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-7 p-4"
        style="background: #fff; margin-right:2%; border: 1px solid gainsboro; border-radius: 24px;">
        <div class="col-md-12 mb-2">
          <div class="card" style="border: 1px solid #ff5733; border-radius: 12px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light"
              style="display: flex; justify-content: center;">
              <img src="images/Pt Mehar Prakash ji.webp" alt="Picture of Astrologiest" class="img-fluid mt-3"
                style="border: 2px solid #ff5733; border-radius: 50%;  width:150px; height: 150px;" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body" style="text-align: center;">
              <!-- <h5 class="card-title"></h5> -->
              <p class="card-text my-2">
                <span style="color: #fff; background:#ff5733; padding: 6px 12px; border-radius:12px;">पंडित मेहेर प्रकाश
                  उपाध्याय</span>
              </p>
              <p class="card-text mb-3">
                20 वर्षो का अनुभव
              </p>
              <div class="form-group  mb-2">
                <p class="form-control"
                  style="text-align:center; background: rgba(128, 128, 128, 0.1000); color: #1c2331;">
                  &#160;&#160;&#160;&#160;&#160;हमारे सहयोगी <span style="color: #ff5733;">पंडित मेहेर प्रकाश
                    उपाध्याय</span> जबलपुर के एक अनुभवी ज्योतिष आचार्य हैं,जिन्हें ज्योतिष के क्षेत्र में लगभग 20 वर्षों
                  का अनुभव है एवं इस क्षेत्र में निरंतर सक्रिय रहते हैं।<br> <br>
                  &#160;&#160;&#160;&#160;&#160;आप कुंडली अध्ययन, वैदिक ज्योतिष, लाल किताब ज्योतिष आदि में पारंगत हैं।
                  <span style="color: #ff5733;">वाल्मीकि संगम वेबसाइट</span> के माध्यम से हमारे सजातीय बंधुओं को <span
                    style="color: #3C2B99;">वैवाहिक, प्रेम विवाह, प्रेम संबंधों में सफ़लता, परिवार, स्वास्थ्य, रिश्ते,
                    व्यावसायिक, शिक्षा, कैरियर</span> तथा अन्य मुद्दों पर बहुमूल्य परामर्श प्रदान करने के लिए हमने
                  इन्हें आमंत्रित किया है। ज्योतिष और वैदिक पूजन कर्मों में इनकी टीम ने हमेशा हमारी मदद की है।
                <p class="form-control"
                  style="text-align:left; background: rgba(128, 128, 128, 0.1000); color: #1c2331;">Note : 1. आपकी फीस
                  वैवाहिक मिलान [एक मिलान] हेतु शुल्क <span style="color: #ff5733;">रु. 351/- </span><br>
                  अन्य समस्याओं के समाधान हेतु शुल्क <span style="color: #ff5733;">रु. 501/- [पांच प्रश्न]
                  </span>है।<br><br> नीचे दिए गए QR Code के माध्यम से आप सीधे इनको पेमेंट करके मिलान अथवा ज्योतिष समाधान
                  हेतु संपर्क कर सकते हैं।
                </p>
                <p class="form-control"
                  style="text-align:center; background: rgba(128, 128, 128, 0.1000); color: #1c2331;">
                  <span style="color: #3C2B99;">--- QR CODE ---</span><br>
                  <span style="color: #ff5733; font-size:22px; font-weight:700;">+91 74006 35055</span><br>
                  <img src="images/Payment_qr.jpg" alt="QR CODE" style="width:50%; border:2px solid black; border-radius:12px; 
                margin: 12px 0;">
                </p>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Card End -->
      </div>
      <div class="col-md-4 p-4" style="background: #fff; border: 1px solid gainsboro; border-radius: 24px; height:50%;">
        <h5 style="color: #ff5733; text-align:center;" class="mb-4">पंजीयन पत्रक</h5>
        <!-- For Loging User Form -->
        <?php
        if ($user_detail <> NULL) {
          $sql_show_category = "SELECT * FROM form_data WHERE id = '{$user_detail}' LIMIT 1";
          $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Die!! --> sql_show_category");
          if (mysqli_num_rows($result_sql_show_category) > 0) {
            while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
              ?>
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-group">
                  <select class="form-control" name="for_who" required>
                    <!-- <option class="hidden" value="प्रकार" selected>प्रकार :</option> -->
                    <!-- <option value="वैवाहिक मिलान">1. वैवाहिक मिलान</option> -->
                    <option value="समस्या समाधान" selected>समस्या समाधान</option>
                  </select>
                </div>
                <div class="col-md-12 my-2">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="नाम : *" value="<?php echo $row['name'] ?>"
                      name="name" autocomplete="off" required />
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <div class="form-group">
                    <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"
                      placeholder="मोबा./व्हाट्सएप नंबर : *" autocomplete="off" value="<?php echo $row['phone'] ?>"
                      required />
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
                        <input type="radio" name="gender" value="महिला">
                        <span>महिला </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="जन्म तिथि" name="dob" autocomplete="off"
                      onfocus="(this.type='date')" value="<?php echo $row['dob'] ?>" required />
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="जन्म समय :" name="dot" autocomplete="off"
                      onfocus="(this.type='time')" value="<?php echo $row['dot'] ?>" required />
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="जन्म स्थान :" name="dol"
                      value="<?php echo $row['dol'] ?>" autocomplete="off" required />
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="निवास स्थान का पूर्ण पता : *"
                      value="<?php echo $row['address'] ?>" name="address" autocomplete="off" required />
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <div class="form-group">
                    <select class="form-control" name="pradesh" required>
                      <option selected value="<?php echo $row['pradesh'] ?>">
                        <?php echo $row['pradesh'] ?>
                      </option>
                      <option class="hidden" value="NONE" disabled>प्रदेश :</option>
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
                      value="<?php echo $row['jila'] ?>" autocomplete="off" required />
                  </div>
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                  <input type="submit" name="submit" class="btnRegister"
                    style="background-color: #ff5733; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;"
                    value="पंजीकृत करें" required />
                </div>
              </form>
            <?php }
          }
        } else { ?>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
              <select class="form-control" name="for_who" required>
                <!-- <option class="hidden" value="प्रकार" selected>प्रकार :</option> -->
                <!-- <option value="वैवाहिक मिलान">1. वैवाहिक मिलान</option> -->
                <option value="समस्या समाधान" selected>समस्या समाधान</option>
              </select>
            </div>
            <div class="col-md-12 my-2">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="नाम : *" name="name" autocomplete="off" required />
              </div>
            </div>
            <div class="col-md-12 my-2">
              <div class="form-group">
                <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"
                  placeholder="मोबा./व्हाट्सएप नंबर : *" autocomplete="off" required />
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
                    <input type="radio" name="gender" value="महिला">
                    <span>महिला </span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-12 my-2">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="जन्म तिथि" name="dob" autocomplete="off"
                  onfocus="(this.type='date')" required />
              </div>
            </div>
            <div class="col-md-12 my-2">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="जन्म समय :" name="dot" autocomplete="off"
                  onfocus="(this.type='time')" required />
              </div>
            </div>
            <div class="col-md-12 my-2">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="जन्म स्थान :" name="dol" autocomplete="off"
                  required />
              </div>
            </div>
            <div class="col-md-12 my-2">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="निवास स्थान का पूर्ण पता : *" name="address"
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
                <input type="text" class="form-control" placeholder="जिला :" name="jila" autocomplete="off" required />
              </div>
            </div>
            <div class="col-12" style="display: flex; justify-content: center;">
              <input type="submit" name="submit" class="btnRegister"
                style="background-color: #ff5733; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;"
                value="पंजीकृत करें" required />
            </div>
          </form>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- Home Page Section End -->
</div>
<?php include('footer.php');