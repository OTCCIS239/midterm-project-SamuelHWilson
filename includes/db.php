<?php

// You might connect to your database here. However, don't
// hard-code your database credentials here! Instead,
// copy the file `/.env.example` to `/.env`, and
// place your credentials there. Notice, this
// file shouldn't be in your repository.

// You can access the credentials you have defined in
// `/.env` by calling the `getenv($name)` function.
// For example, use `getenv('DB_HOST')` to get the
// host of your database. Yours should be "localhost"

// Make sure to include support for DB_PORT. See the
// PHP Documentation for the MySQL PDO DSN:
// http://php.net/manual/en/ref.pdo-mysql.connection.php

$host = getenv("DB_HOST");
$port = getenv("DB_PORT");
$dbname = getenv("DB_DATABASE");
$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
$user = getenv("DB_USERNAME");
$pswd = getenv("DB_PASSWORD");
$conn =  new PDO($dsn, $user, $pswd);

function GetMany($query, $conn, $toBind = []) {
    $statement = $conn->prepare($query);
    foreach($toBind as $bString => $bValue) {
        $statement->bindValue($bString, $bValue);        
    }
    $statement->execute();
    $toReturn = $statement->fetchAll();
    $statement->closeCursor();
    return $toReturn;
}

function GetOne($query, $conn, $toBind = []) {
    $statement = $conn->prepare($query);
    foreach($toBind as $bString => $bValue) {
        $statement->bindValue($bString, $bValue);        
    }
    $statement->execute();
    $toReturn = $statement->fetch();
    $statement->closeCursor();
    return $toReturn;
}