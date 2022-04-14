
<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=webapp', $user = "root", $pass = "");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
