<?php
require_once '../backend/conn.php';
include '../head.php';
require_once '../header.php';

$id = $_GET['id'];

$sql = "SELECT * FROM taken WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$taak = $result->fetch_assoc();
?>

<h1>Taak aanpassen</h1>

<form method="POST" action="../backend/tasksController.php?action=update">
    <input type="hidden" name="id" value="<?php echo $taak['id'] ?>">

    Titel:<br>
    <input type="text" name="titel" value="<?php echo $taak['titel'] ?>"><br><br>

    Beschrijving:<br>
    <textarea name="beschrijving"><?php echo $taak['beschrijving'] ?></textarea><br><br>

    Afdeling:<br>
    <input type="text" name="afdeling" value="<?php echo $taak['afdeling'] ?>"><br><br>

    Status:<br>
    <select name="status">
        <option value="todo" <?php $taak['status'] == 'todo' ? 'selected' : '' ?>>Todo</option>
        <option value="doing" <?php $taak['status'] == 'doing' ? 'selected' : '' ?>>Doing</option>
        <option value="done" <?php $taak['status'] == 'done' ? 'selected' : '' ?>>Done</option>
    </select><br><br>

    <button type="submit">Opslaan</button>
    <form action="../backend/meldingenController.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Verwijderen">
    </form>
</form>