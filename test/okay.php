<?php if ($result['success'] === false): ?>
    <h1><?php echo $result['message'] ?></h1>
<?php endif; ?>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Names</th>
        <th>Age</th>
        <th>City</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['Name']); ?></td>
            <td><?php echo htmlspecialchars($row['Age']); ?></td>
            <td><?php echo htmlspecialchars($row['City']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
