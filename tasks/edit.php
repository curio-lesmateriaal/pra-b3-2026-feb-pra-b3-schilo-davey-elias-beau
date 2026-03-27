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

    Deadline:<br>
    <input type="date" name="deadline" value="<?php echo $taak['deadline']?>"><br><br>

    Status:<br>
    <select name="status">
        <option value="todo" <?php echo $taak['status'] == 'todo' ? 'selected' : '' ?>>Todo</option>
        <option value="doing" <?php echo $taak['status'] == 'doing' ? 'selected' : '' ?>>Doing</option>
        <option value="done" <?php echo $taak['status'] == 'done' ? 'selected' : '' ?>>Done</option>
    </select><br>

    <button type="submit">Opslaan</button>
</form>

<form action="../backend/tasksController.php?action=delete" method="POST" onsubmit="return confirm('Weet u zeker dat u deze taak wilt verwijderen?');">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit">Verwijderen</button>
</form>
<?php require_once '../footer.php' ?>