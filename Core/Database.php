<?php ;

// Import the necessary classes and namespaces
namespace Core;

/**
 * This file is responsible for handling the database connection using PDO.
 */
use PDO;

// Connect to mysql database and execute a query
class Database
{
    // Store the database connection
    public $connection;
    
    // Store the prepared statement
    public $statement;

    // Constructor to establish the database connection
    public function __construct()
    {
        // Load the database configuration
        $config = require base_path('config.php');
       
        // Build the Data Source Name (DSN) string for the PDO connection
        $dsn = 'mysql:' . http_build_query($config['database'], '', ';');

        // Create a new PDO instance with the DSN, username, password, and options
        $this->connection = new PDO($dsn, $config['database']['username'], $config['database']['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // Execute a query with optional parameters
    public function query($query, $params = [])
    {
        // Prepare the statement
        $this->statement = $this->connection->prepare($query);

        // Execute the statement with the parameters
        $this->statement->execute($params);

        // Return the current instance for method chaining
        return $this;
    }

    // Fetch all rows from the result set
    public function get()
    {
        return $this->statement->fetchAll();
    }

    // Fetch the next row from the result set
    public function find()
    {
        return $this->statement->fetch();
    }

    // Fetch the next row from the result set or abort if no result found
    public function findOrFail()
    {
        // Fetch the next row
        $result = $this->find();

        // If no result found, abort the script
        if (!$result) {
            abort();
        }

        // Return the result
        return $result;
    }
}
