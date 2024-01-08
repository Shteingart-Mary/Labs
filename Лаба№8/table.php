<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <?php for($i=1;$i<=5;$i++): ?>
                <td>
                    <?php for($j=1;$j<=10;$j++): ?>
                        <div><?= $i?>x<?= $j?>=<?= $i*$j?></div>
                    <?php endfor; ?>
                </td>
            <?php endfor; ?>
        </tr>
        <tr>
            <?php for($i=6;$i<=10;$i++): ?>
                <td>
                    <?php for($j=1;$j<=10;$j++): ?>
                        <div><?= $i?>x<?= $j?>=<?= $i*$j?></div>
                    <?php endfor; ?>
                </td>
            <?php endfor; ?>
        </tr>
    </table>
</body>
</html>