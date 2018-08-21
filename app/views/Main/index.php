<div class="container">
    <table border="2">
        <caption><h1>База студентов</h1></caption>
        <tr data-toggle="tooltip" data-placement="right" title="Tooltip on right">
            <th>Рейтинг</th>
            <th>Фамилия</th>
            <th>Имя</th>
        </tr>
        <?php foreach ($posts as $post):?>
            <tr>
                <td><?= $post['rank'] ?></td>
                <td><?= $post['secondname'] ?></td>
                <td><?= $post['name'] ?></td>
                <td><a href="#two" id="<?= $post['id'] ?>" data-toggle="modal">изменить данные</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br/>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#one"> Добавить студента  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="one" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавление нового студента</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" class="needs-validation" data-action="main/index.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rank">Рейтинг</label>
                        <input type="number" class="form-control" name="rank" id="rank" placeholder="Введите рейтинг" required>
                    </div>
                    <div class="form-group">
                        <label for="secondname">Фамилия</label>
                        <input type="text" class="form-control" name="secondname" id="secondname" placeholder="Введите фамилию" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="two" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Изменить данные студента</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" class="needs-validation" data-action="main/index.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rank">Рейтинг</label>
                        <input type="number" class="form-control" name="rank" id="rank" placeholder="<?= $post['id'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="secondname">Фамилия</label>
                        <input type="text" class="form-control" name="secondname" id="secondname" placeholder="Введите фамилию" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
