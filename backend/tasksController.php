<?php
require_once(__DIR__ . '/conn.php');

$action = $_GET['action'] ?? '';

if ($action == 'create') {
    $titel = $_POST['titel'] ?? '';
    $beschrijving = $_POST['beschrijving'] ?? '';
    $afdeling = $_POST['afdeling'] ?? '';
    $deadline = date('Y-m-d H:i:s', strtotime($_POST['deadline']));
    $status = 'todo';

    if (empty($titel) || empty($beschrijving) || empty($afdeling)) {
        die('Vul alle velden in.');
    }

    $stmt = $conn->prepare("INSERT INTO taken (titel, beschrijving, afdeling, deadline, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $titel, $beschrijving, $afdeling, $deadline, $status);

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
    $deadline = date('Y-m-d H:i:s', strtotime($_POST['deadline']));
    $status = $_POST['status'];

    $sql = "UPDATE taken
            SET titel = ?, beschrijving = ?, afdeling = ?, deadline = ?, status = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $titel, $beschrijving, $afdeling, $deadline, $status, $id);
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