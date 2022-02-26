<!DOCTYPE html>

<body style="text-align:center;">
    <h1 style="color:blue;"> Manage Licenses </h1>
    
    <?php
        $servername = "localhost";
        $username = "jondy";
        $password = "Sauce!5150";
        $dbname = "licenses";

        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
              parent::__construct($it, self::LEAVES_ONLY);
            }
          
            function current() {
              return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
            }
          
            function beginChildren() {
              echo "<tr>";
            }
          
            function endChildren() {
              echo "</tr>" . "\n";
            }
          }

        try{
            # building table headers
            echo "<table border='1' align='center'>
            <tr>
            <th>Key</th>
            <th>Last Check-In</th>
            <th># of Users</th>
            <th>Remaining Users</th>
            </tr>";

            # connecting to mysql server
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected Successfully";
            # select row from licenses
            $stmt = $conn->prepare("SELECT licensekey, checkin, numusers, remainingusers FROM licenses");
            $stmt->execute();

            # fetch results of query and append to php table
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }

            echo "</table>";


            
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    ?>
</body>
</html>