<?php

class Todo
{
  const todoFilePath = './models/todo.txt';

  public function getTodos()
  {
    try {
      $todoString = file_get_contents(self::todoFilePath);
      return unserialize($todoString);
    } catch (\Exception $e) {
      return [];
    }
  }

  public function changeStatus($index)
  {
    $todos = $this->getTodos();
    $todos[$index]['status'] = !$todos[$index]['status'];
    $this->writeTodos($todos);
  }

  public function save($text)
  {
    $todo = [
      'text' => $text,
      'status' => false
    ];

    $this->saveTodo($todo);
  }

  private function saveTodo($todo)
  {
    $todos = $this->getTodos();
    $todos[] = $todo;
    $this->writeTodos($todos);
  }

  private function writeTodos($todos)
  {
    $todoString = serialize($todos);
    file_put_contents(self::todoFilePath, $todoString);
  }
}
