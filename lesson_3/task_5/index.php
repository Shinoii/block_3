<?php
use App\Entity\User;

require 'vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';
use App\Entity\Post;
//  Задание 5: Отношения между сущностями (Doctrine)
//  Задача:
//  Создать сущность Post, связанную с UserController (отношение один ко многим).
//  Добавить в Post метод getUser(), который возвращает автора.

//  Проверка:
try {
    $post = $entityManager->getRepository(Post::class)->find(1);
    if ($post === null) {
        echo 'Посты не найдены';
    } else{
        echo $post->getUser()->getName();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
// ✅ Выводит имя автора поста