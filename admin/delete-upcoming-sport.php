<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>

<?php
if (isset($_GET['delete'])) {
    $idFromUrl = $_GET['delete'];
    // delete image from upload folder when deleting record from pur DB.

    $deleteImage = " SELECT * FROM upcoming_sports WHERE id = '$idFromUrl' ";
    $execute = mysqli_query($Connection, $deleteImage);
    $row = mysqli_fetch_array($execute);
    $image = $row['image'];
    unlink("upload/upcoming/$image");

    $sql = " DELETE FROM upcoming_sports WHERE id = '$idFromUrl' ";
    $execute = mysqli_query($Connection, $sql);
    if ($execute) {
        $_SESSION['success'] = ' Deleted successfully ';
        Redirect_to('upcoming-sports.php');
    }
}

?>
