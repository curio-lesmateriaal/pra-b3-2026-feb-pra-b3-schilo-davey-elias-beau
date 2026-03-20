<?php
require_once '../backend/conn.php';

$id = $_POST['id'];
$titel = $_POST['titel'];
$beschrijving = $_POST['beschrijving'];
$afdeling = $_POST['afdeling'];
$status = $_POST['status'];

$sql = "UPDATE taken
        SET titel = ?, beschrijving = ?, afdeling = ?, status = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $titel, $beschrijving, $afdeling, $status, $id);
$stmt->execute();

header("Location: ../taakverdeling.php");
exit;