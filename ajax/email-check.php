<?php

switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        require_once '../data/dbinit.php';

        // проверяем инн на дублирование
        $sql = "SELECT CASE WHEN (SELECT EXISTS(SELECT 1 FROM users WHERE email = :email)) THEN 'double' ELSE 'unic' END is_double";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(
            ':email' => $_POST['email']
        ));
        echo $stmt->fetch(PDO::FETCH_ASSOC)['is_double'];

        break;

    case 'GET':
        die();
        break;
}