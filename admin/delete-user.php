<?php
include("config.php");
// if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
//     echo "<script>window.location.href='$hostname/admin/'</script>";
// }
$user_id_getaddbar = $_GET['id'];
?>
<script>alert('Deleted successfully !!')</script>
<?php
$sql_delete_user = "DELETE FROM user WHERE username ='{$user_id_getaddbar}'";
if (mysqli_query($conn, $sql_delete_user)) {
    echo "DONE -> delete user";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the User Record.");
}
$sql_category_delete = "DELETE FROM form_data WHERE id = '{$user_id_getaddbar}'" or die("Query Failed!! --> sql_category_delete");
if (mysqli_query($conn, $sql_category_delete)) {
    echo "<script>window.location.href='$hostname/admin/users.php'</script>";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the User Record.");
}
mysqli_close($conn);
?>