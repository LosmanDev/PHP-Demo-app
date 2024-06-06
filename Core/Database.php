<?php ;

namespace Core;

use PDO;

// Connect to mysql database and execute a query
class Database
{
    public $connection;
    
    public $statement;

    public function __construct()
    {
        $config = require base_path('config.php');
       
        //Data Source name. A string that declares connection to database.
        $dsn = 'mysql:'.  http_build_query($config['database'], '', ';');

        //Create instance of PDO('PHP data objects') Class
        $this -> connection = new PDO($dsn, $config['database']['username'], $config['database']['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this -> statement = $this -> connection -> prepare($query);

        $this -> statement -> execute($params);

        return $this;
    }

    public function get()
    {
        return $this -> statement -> fetchAll();
    }


    public function find()
    {
        return $this -> statement -> fetch();
    }

    public function findOrFail()
    {
        $result = $this -> find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
