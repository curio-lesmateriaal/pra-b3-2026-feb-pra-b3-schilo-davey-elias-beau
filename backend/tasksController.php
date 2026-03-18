<?php
require_once(__DIR__ . '/conn.php');

$action = $_GET['action'] ?? '';

if ($action === 'create') {
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
        header('Location: ../index.php');
        exit;
    } else {
        echo 'Fout bij opslaan van taak.';
    }

    $stmt->close();
    $conn->close();
}