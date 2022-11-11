<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country= $_GET["country"];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET["country"])):?>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($results as $tdv): ?>
      <tr>
        <td><?=$tdv['name'];?></td>
        <td><?=$tdv['continent'];?></td>
        <td><?=$tdv['independence_year'];?></td>
        <td><?=$tdv['head_of_state'];?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?> 
