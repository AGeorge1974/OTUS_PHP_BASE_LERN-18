<?php
    include_once('functions.php');
    function db_connect() {
            $host = 'localhost';
            $db   = 'book';
            $user = 'root';
            $pass = '';
            $charset = 'utf8';
        
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($dsn, $user, $pass, $opt);
            return $pdo;
    }

    function selectAuthor (int $idBook) {
        $pdo = db_connect();
        $nameAuthors = '';
        $author = $pdo->prepare('SELECT a.name FROM relbookauthor as r left Join authors a on r.IdAuthor = a.IdAuthor WHERE r.idBook = ?');
        $author->execute([$idBook]);
        foreach ($author as $rowAuthor)
        {
            $nameAuthors = $nameAuthors . ' ' . $rowAuthor['name'];
        }
        return $nameAuthors;
    }

    function selectBookAll () {
        $pdo = db_connect();
        $stmt = $pdo->prepare('SELECT idbook, name, pages, year FROM books As b');
        $stmt->execute();
        $listBook = $stmt->fetchAll();
        return $listBook;
    }

    function selectBook (array $arr) {
        $pdo = db_connect();
        $stmt = $pdo->prepare('SELECT idbook, name, pages, year FROM books As b' . $arr[0]);
        $stmt->execute($arr[1]);
        $listBook = $stmt->fetchAll();
        return $listBook;
    }

    function selectBookAuthor (array $arr) {
        $pdo = db_connect();
        $stmt = $pdo->prepare('SELECT b.idbook, b.name, b.pages, b.year FROM books As b Inner Join relbookauthor As r On b.IdBook = r.IdBook Inner Join AUTHORS As a On r.IdAuthor = a.IdAuthor ' . $arr[0]);
        $stmt->execute($arr[1]);
        $listBook = $stmt->fetchAll();
        return $listBook;
    }


?>
