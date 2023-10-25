<?php
include('phpmailer_smtp/smtp/PHPMailerAutoload.php');
$end_user_email = "info.valmikisangam4all@gmail.com";
$subject = "Account Login Notification";
$body = "Your <b>ADMIN Valmikisangam</b> Account was just used to <b>SIGN IN</b> by following information : <br><br><br><br>" .
"Date :- " . date("d M, Y h:i:sa") . "<br> IP Address :- " . getenv("REMOTE_ADDR");
include("config.php");
session_start();
$user = $_SESSION['username'];
$sql_show_category = "SELECT * FROM form_data WHERE id = '{$user}'";
$result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! -> sql_show_category");
if (mysqli_num_rows($result_sql_show_category) > 0) {
    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
        if ($row['email'] != NULL) {
            $end_user_email = $row['email'];
            $subject = "Account Login Notification";
            $body = "<b>Namaste " . $row['name'] . " Ji</b><br><br>" .
                "Your <b>Valmikisangam</b> Account was just used to <b>SIGN IN</b> by following information : <br><br><br><br>" .
                "User ID :- " . $row['id'] . "<br>Date :- " . date("d M, Y h:i:sa") . "<br> IP Address :- " . getenv("REMOTE_ADDR");
        }
    }
}
echo smtp_mailer($end_user_email, $subject, $body);
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "info.valmikisangam4all@gmail.com";
    $mail->Password = "bjtzzviuagttfnpl";
    $mail->SetFrom("info.valmikisangam4all@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if (!$mail->Send()) {
        echo "<div style='background:red; color:#fff; font-size:24px;'>Please cheack Your Internet Connection !!</div>";
    } else {
    return "<script>window.location.href='member.php'</script>";
    }
}
// echo "<script>window.location.href='$hostname/admin/member.php'</script>";
?>