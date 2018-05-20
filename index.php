<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?php

      require_once './models/todo.php';

      $conn = new PDO('mysql:host=localhost;dbname=todo_db',
                      'root', '');
      $conn->exec("set names utf8");

      // class Todo {
      //   public function status()
      //   {
      //     return ($this->status == '0') ? 'incomplete' : 'complete';
      //   }
      // };

      $res = $conn->query('SELECT description, status FROM todos');

      // $todos = $res->fetchAll(PDO::FETCH_CLASS, 'Todo');

      // $todos = $res->fetchAll(PDO::FETCH_ASSOC);

      // var_dump($todos);
      $todoModel = new TodoModel();

      var_dump($todoModel->getAll());

      // $query = 'INSERT INTO todos (description, status) VALUES (:description, :status)';
      // $stmt = $conn->prepare($query);
      //
      // $value = 'выгуляй собаку';
      // $stmt->bindParam(':description', $value);
      // $stmt->bindValue(':status', 1);
      //
      // $stmt->execute();

      // var_dump($res->fetchAll());

      $todoModel->create('Пропылисось ковер');
    ?>
  </body>
</html>
