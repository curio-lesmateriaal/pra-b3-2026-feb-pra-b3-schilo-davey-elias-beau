<?php include '../head.php'; ?>
<?php include '../header.php'; ?>

<h2>Nieuwe taak</h2>

<form method="POST" action="../backend/tasksController.php?action=create">

    <label for="titel">Titel:</label><br>
    <input type="text" id="titel" name="titel" required><br><br>

    <label for="beschrijving">Beschrijving:</label><br>
    <textarea id="beschrijving" name="beschrijving" required></textarea><br><br>

    <label for="deadline">Deadline:</label><br>
     <input type="date" id="deadline" name="deadline" required><br><br>

    <label for="afdeling">Afdeling:</label><br>
    <select id="afdeling" name="afdeling" required>
        <option value="personeel">Personeel</option>
        <option value="horeca">Horeca</option>
        <option value="techniek">Techniek</option>
        <option value="inkoop">Inkoop</option>
        <option value="klantenservice">Klantenservice</option>
        <option value="groen">Groen</option>
    </select><br><br>

    <button type="submit">Opslaan</button>
</form>

<?php require_once '../footer.php' ?>
</body>
</html>