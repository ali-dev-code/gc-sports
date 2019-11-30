<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>

<?php
if (isset($_GET['delete'])) {
    $idFromUrl = $_GET['delete'];

    $sql = " DELETE FROM upcoming_sports WHERE id = '$idFromUrl' ";
    $execute = mysqli_query($Connection, $sql);
    if ($execute) {
        $_SESSION['success'] = ' Deleted successfully ';
        Redirect_to('upcoming-sports.php');
    }
}

?>
