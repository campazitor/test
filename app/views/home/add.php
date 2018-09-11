<div class="container">
    <div class="row">
        <div class="col-6 head"><h1>Добавить студента</h1></div>
        <div class="col-6 main">
            <form method="post" class="needs-validation">
                <div class="form-group">
                    <label for="rank">Рейтинг</label>
                    <input type="number" class="form-control"
                           name="rank" id="rank"
                           placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="secondname">Фамилия</label>
                    <input type="text" class="form-control"
                           name="secondname" id="secondname"
                           placeholder="Введите фамилию" required>
                </div>
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control"
                           name="name" id="name"
                           placeholder="Введите имя" required>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
                <a type="button" href="/" class="btn btn-warning">вернуться на
                    список</a>
            </form>
        </div>
    </div>
</div>