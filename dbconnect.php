   

<?php


class dbconnect {


function connect(){
	 $username = 'root';
 $password = '';
 $dbName = 'project4';
 $dbHost = "35.222.85.157";

 try {
// Connect using TCP
$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $dbHost);

// Connect to the database
$conn = new PDO($dsn, $username, $password);
return $conn;
// Check connection
 } catch (TypeError $e) {
            throw new RuntimeException(
                sprintf(
                    'Invalid or missing configuration! Make sure you have set ' .
                    '$username, $password, $dbName, and $dbHost (for TCP mode) ' .
                    'or $connectionName (for UNIX socket mode). ' .
                    'The PHP error was %s',
                    $e->getMessage()
                ),
                $e->getCode(),
                $e
            );
        } catch (PDOException $e) {
            throw new RuntimeException(
                sprintf(
                    'Could not connect to the Cloud SQL Database. Check that ' .
                    'your username and password are correct, that the Cloud SQL ' .
                    'proxy is running, and that the database exists and is ready ' .
                    'for use. For more assistance, refer to %s. The PDO error was %s',
                    'https://cloud.google.com/sql/docs/mysql/connect-external-app',
                    $e->getMessage()
                ),
                $e->getCode(),
                $e
            );
        }}
}
?>
