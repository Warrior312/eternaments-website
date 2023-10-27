<?php

require_once 'dbh.inc.php';

$sql = "SELECT * FROM sys";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $rows = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($rows);

    if ($rows[0][1] == 1) {
        header("location: https://eternaments.com/pages/maintenance.php");
        exit();
    }
}

?>