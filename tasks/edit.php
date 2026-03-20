<?php
require_once '../backend/conn.php';

$id = $_GET['id'];

$sql = "SELECT * FROM taken WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$taak = $result->fetch_assoc();
?>

<h1>Taak aanpassen</h1>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $taak['id'] ?>">

    Titel:<br>
    <input type="text" name="titel" value="<?= $taak['titel'] ?>"><br><br>

    Beschrijving:<br>
    <textarea name="beschrijving"><?= $taak['beschrijving'] ?></textarea><br><br>

    Afdeling:<br>
    <input type="text" name="afdeling" value="<?= $taak['afdeling'] ?>"><br><br>

    Status:<br>
    <select name="status">
        <option value="todo" <?= $taak['status'] == 'todo' ? 'selected' : '' ?>>Todo</option>
        <option value="doing" <?= $taak['status'] == 'doing' ? 'selected' : '' ?>>Doing</option>
        <option value="done" <?= $taak['status'] == 'done' ? 'selected' : '' ?>>Done</option>
    </select><br><br>

    <button type="submit">Opslaan</button>
    <form action="../backend/meldingenController.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Verwijderen">
    </form>
</form>