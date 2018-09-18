<div class="container">
    <div class="row">
        <div class="col-6 head"><h1>Добавить студента</h1></div>
        <div class="col-6 main">
            <form method="post" class="needs-validation">

                <?php foreach ($postNames as $key => $value):?>

                    <?php switch ($postTypes[$key]):
                        case 'int':
                            $type = 'type="number"';
                            break;
                        case 'string':
                            $type = 'type="string"';
                            break;
                        default:
                            $type = '';
                    endswitch; ?>

                    <div class="form-group">
                        <label for="<?= $key ?>"><?= $value ?></label>
                        <input <?= $type ?> class="form-control" name="<?= $key ?>" id="<?= $key ?>" required>
                    </div>

                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary">Добавить</button>
                <a type="button" href="/" class="btn btn-warning">вернуться на
                    список</a>
            </form>
        </div>
    </div>
</div>