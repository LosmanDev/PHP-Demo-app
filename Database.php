<?php ;

// Connect to mysql database and execute a query
class Database
{
    public $connection;

    public function __construct()
    {
        $config = require 'config.php';
       
        //Data Source name. A string that declares connection to database.
        $dsn = 'mysql:'.  http_build_query($config['database'], '', ';');

        //Create instance of PDO('PHP data objects') Class
        $this -> connection = new PDO($dsn, $config['database']['username'], $config['database']['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}
