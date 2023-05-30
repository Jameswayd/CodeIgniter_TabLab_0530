<!-- TableLabView.php -->
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $heading ?></h1>
    <table>
        <tr>
            <th>Time Used</th>
            <th>Step</th>
            <th>Description</th>
        </tr>
        <?php foreach ($todo_list as $week => $tasks): ?>
            <tr>
                <td><?= $week ?></td>
                <td><?= $tasks[0] ?></td>
                <td><?= $tasks[1] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
