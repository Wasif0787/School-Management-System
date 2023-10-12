In 'db.php'

replace password and database name with your credentials 

For Example

$host="localhost";
$user="root";
$password="abcd";
$db="database";

$data = mysqli_connect($host, $user, $password, $db);
