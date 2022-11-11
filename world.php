<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if(isset($_GET["country"])):
  $country= $_GET["country"];
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
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


<?php 
  if(isset($_GET["city"])):
    $city= $_GET["city"];
    $stmt=$conn->query("SELECT c.name, c.district, c.population FROM cities c join countries cs on c.country_code = cs.code WHERE cs.name LIKE '%$city%' ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>District</th>
          <th>Population</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($results as $tdv): ?>
        <tr>
          <td><?=$tdv['name'];?></td>
          <td><?=$tdv['district'];?></td>
          <td><?=$tdv['population'];?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
<?php endif; ?> 

