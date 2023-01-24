

<h3>Lesson List</h3>
<?php

$lessons = $db->query('SELECT lessons.id, lessons.baslik, lessons.onay,categories.ad as categories_adi FROM lessons INNER JOIN categories ON categories.id = lessons.categories_id
ORDER BY lessons.id DESC ')->fetchAll(PDO::FETCH_ASSOC);
/*
$sorgu = $db->prepare('SELECT * FROM lessons WHERE id=?');
$sorgu->execute([7]);
$lessons = $sorgu->fetchAll(PDO::FETCH_ASSOC);

print_r($lessons);
*/
?>
<?php if($lessons): ?>
<ul>
    <?php foreach ($lessons as $lesson ):?>
    <li>
        <?php echo $lesson['baslik']; ?>
        (<?php echo $lesson['categories_adi']; ?>)
        <div>
            <?php if ($lesson['onay'] == 1 ):?>
            <a href="index.php?sayfa=read&id=<?php echo $lesson['id'] ?>">[READ]</a>
            <?php endif; ?>
            <a href="index.php?sayfa=update&id=<?php echo $lesson['id'] ?>">[UPDATE]</a>
            <a href="index.php?sayfa=delete&id=<?php echo $lesson['id'] ?>">[DELETE]</a>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
    <div>
    Henüz Eklenmiş Ders Bulunmuyor.
    </div>
<?php endif; ?>