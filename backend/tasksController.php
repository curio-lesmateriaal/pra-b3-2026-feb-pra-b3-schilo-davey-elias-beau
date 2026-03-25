<?php
require_once(__DIR__ . '/conn.php');

$action = $_GET['action'] ?? '';

if ($action == 'create') {
    $titel = $_POST['titel'] ?? '';
    $beschrijving = $_POST['beschrijving'] ?? '';
    $afdeling = $_POST['afdeling'] ?? '';
    $status = 'todo';

    if (empty($titel) || empty($beschrijving) || empty($afdeling)) {
        die('Vul alle velden in.');
    }

    $stmt = $conn->prepare("INSERT INTO taken (titel, beschrijving, afdeling, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titel, $beschrijving, $afdeling, $status);

    if ($stmt->execute()) {
        header('Location: ../taakverdeling.php');
        exit;
    } else {
        echo 'Fout bij opslaan van taak.';
    }

    $stmt->close();
    $conn->close();
}

if ($action == 'update'){
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
}

if ($action == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM taken WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: ../taakverdeling.php");
        exit;
    } else {
        echo 'Fout bij verwijderen van taak.';
    }

    $stmt->close();
    $conn->close();
}