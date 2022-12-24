<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <title>Tasks</title>
  <style>
    <?php include "style.css" ?>
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card mt-3">
          <div class="card-header p-3">
            <form action="task/create" method="POST">
              <div class="input-group">
                <input type="text" name="description" class="form-control" placeholder="مهمة جديدة" require>
                <button class="btn btn-warning fs-5" type="submit">اضافة مهمة</button>
              </div>
            </form>
          </div>
          <div class="card-body p-3">
            <ul class="nav nav-pills justify-content-center mb-3">
              <li class="nav-item">
                <a href="<?= home();?>" class="nav-link">الكل</a>
              </li>
              <li class="nav-item">
                <a href="?completed=0" class="nav-link">قيد التنفيذ</a>
              </li>
              <li class="nav-item">
                <a href="?completed=1" class="nav-link">مكتملة</a>
              </li>
            </ul>
            <?php foreach ($tasks as $task) : ?>
            <div class="todo-item p-2 <?= !$task->completed ? : 'completed' ?>">
              <div class="p-1">
                <a href="task/update?id=<?=$task->id?>&completed=<?= $task->completed ? '0' : '1' ?>">
                  <i class="bi fs-5 <?= $task->completed ? 'bi-check-square' : 'bi-square text-secondary' ?>"></i>
                </a>
              </div>
              <div class="flex-fill m-auto p-2">
                <?= $task->description ?>
              </div>
              <div class="trash mb-2">
                <a href="task/delete?id=<?= $task->id ?>" class="todo-item-remove">
                  <i class="bi bi-trash3 text-danger fs-4"></i>
                </a>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>