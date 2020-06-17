<? $user = unserialize($_COOKIE['user'])[0] ?>
<form class="sort" action="/" method="get" id="sort-form">
    <label>Сортриовать по:
        <select name="sort">
            <option value="userName">имени</option>
            <option value="email">email</option>
            <option value="text">тексту</option>
        </select>
    </label>
    <button type="submit" class="submit-button">Сортировать</button>
</form>
<div class="successful-message"><?= $success ? 'Новая задача успешно добавлена' : '' ?></div>
<? foreach ((array)$tasks as $task): ?>
    <div class="task" data-id="<?= $task['id'] ?>">
        <div class="task-header">
            <div class="userName"><?= $task['userName'] ?></div>
            <div class="email"><?= $task['email'] ?></div>
        </div>
        <div class="status"><?= ($task['completed']) ? 'Сделана' : '' ?> <?= ($task['edited']) ? 'Отредактирована' : '' ?></div>
        <? if ($user AND $user['role'] == 'admin'): ?>
            <div class="admins-features">
                <span class="edit">Редактировать</span>
                <? if (!$task['completed']): ?><span class="complete">Отметить сделанной</span><? endif; ?>
            </div>
        <? endif; ?>
        <div class="text"><?= $task['text'] ?></div>
        <div class="save-button">Сохранить</div>
    </div>
<? endforeach; ?>
<form method="post" class="add-new-form" action="/tasks/save" id="add-new-form">
    <label><span>name:</span><input name="userName" required></label>
    <label><span>email:</span><input name="email" type="email" required></label>
    <label><span>text:</span><textarea name="text" required form="add-new-form"></textarea></label>
    <button type="submit" class="submit-button">Добавить</button>
</form>
<div class="add-new"">
<div class="add-new-button">
    Добавить новую задачу
</div>
</div>
<div class="pagination">
    <? if ($pagesCount > 1): ?>
        <? for ($i = 1; $i <= $pagesCount; $i++): ?>
            <a class="page" href="/?page=<?= $i ?>"><?= $i ?></a>
        <? endfor; ?>
    <? endif; ?>
</div>
