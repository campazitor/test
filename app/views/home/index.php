<div class="container">
    <div class="row">
        <table class="table">
            <caption><h1>База студентов</h1></caption>
            <thead>
            <tr>
                <?php foreach ($postNames as $k => $v): ?>
                    <th scope="col"><?= $v ?></th>
                <?php endforeach; ?>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <?php foreach ($postNames as $k => $v): ?>
                        <td><?= $post[$k] ?></td>
                    <?php endforeach; ?>
                    <td><a href="/edit/<?= $post['id'] ?>">изменить данные
                            студента</a></td>
                    <td><a href="/delete/<?= $post['id'] ?>"
                           onclick="if(confirm('Запись будет удалена безвозвратно!!!'))submit();else return false;"
                        >удалить
                            студента</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/add/" type="button" class="btn btn-primary">Добавить
            студента</a>
    </div>
</div>