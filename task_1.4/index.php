<?php

$filename = __DIR__ . "/data.json";
$result = [];

if (file_exists($filename))
    $result = json_decode(file_get_contents($filename), true);

if (!empty($_GET)) {
    $i = 0;

    foreach ($result as $news) {

        if ($news['id'] == $_GET['set_viewed']) {
            $result[$i]['viewed'] += 1;

            file_put_contents($filename, json_encode($result));
            break;

        }
        $i++;
    }
    unset($_GET);
    header('location: /task_1.4');
}
?>

<? foreach ($result as $item): ?>
    <div>
        <b><?= $item['name'] ?></b><br>
        <small>Viewed: <?= $item['viewed'] ?></small><br>
        <?= $item['text'] ?><br><br>
        <a href="?set_viewed=<?= $item['id'] ?>">I watched</a>
        <hr>
    </div>
<? endforeach; ?>

