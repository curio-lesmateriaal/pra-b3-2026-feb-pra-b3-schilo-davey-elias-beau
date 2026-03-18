<?php include '../header.php'; ?>

<h2>Nieuwe taak</h2>

<form method="POST" action="../backend/tasksController.php?action=create">

    <label>Titel:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Beschrijving:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Afdeling:</label><br>
    <select name="department">
        <option value="personeel">Personeel</option>
        <option value="horeca">Horeca</option>
        <option value="techniek">Techniek</option>
        <option value="inkoop">Inkoop</option>
        <option value="klantenservice">Klantenservice</option>
        <option value="groen">Groen</option>
    </select><br><br>

    <button type="submit">Opslaan</button>

</form>