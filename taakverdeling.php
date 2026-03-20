<?php
include 'head.php';
include 'header.php';

$sql = "
    SELECT 
        taken.id,
        taken.titel,
        taken.beschrijving,
        taken.afdeling,
        taken.status,
        taken.deadline,
        users.naam
    FROM taken
    LEFT JOIN users ON taken.user = users.id
    WHERE taken.status <> 'done'
    ORDER BY taken.id DESC
";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$taken = $result->fetch_all(MYSQLI_ASSOC);
?>

<h2>Taakverdeling</h2>

<?php if (count($taken) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Beschrijving</th>
                <th>Afdeling</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Naam</th>
                <th>Aanpassen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taken as $taak): ?>
                <tr>
                    <td><?php echo htmlspecialchars($taak['titel']); ?></td>
                    <td><?php echo htmlspecialchars($taak['beschrijving']); ?></td>
                    <td><?php echo htmlspecialchars($taak['afdeling']); ?></td>
                    <td><?php echo htmlspecialchars($taak['status']); ?></td>
                    <td><?php echo htmlspecialchars($taak['deadline'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($taak['naam'] ?? ''); ?></td>
                    <td>
                        <a href="taak-bewerken.php?id=<?php echo $taak['id']; ?>">aanpassen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Er zijn nog geen taken gevonden.</p>
<?php endif; ?>

</body>
</html>