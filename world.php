<?php
    $country = strip_tags($_GET['country']);
    $context = strip_tags($_GET['context']);

    $host = 'localhost';
    $username = 'lab5_user';
    $password = 'password123';
    $dbname = 'world';

    if ($context === ""):
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<table>
  <tr>
    <th class="cntr">Name</th>
    <th class="cntr">Continent</th>
    <th class="cntr">Independence</th>
    <th class="cntr">Head of State</th>
  </tr>
  <?php foreach ($results as $row): ?>
  <tr>
    <td class="cntr"><?= $row['name'] ?></td>
    <td class="cntr"><?= $row['continent'] ?></td>
    <td class="cntr"><?= $row['independence_year'] ?></td>
    <td class="cntr"><?= $row['head_of_state'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>

<?php
    else:
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $stmt = $conn->query("SELECT cities.name, district, cities.population as population FROM countries join cities WHERE countries.name LIKE '%$country%' and code = country_code");

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
  <tr>
    <th class="city">Name</th>
    <th class="city">District</th>
    <th class="city">Population</th>
  </tr>
  <?php foreach ($results as $row): ?>
  <tr>
    <td class="city"><?= $row['name'] ?></td>
    <td class="city"><?= $row['district'] ?></td>
    <td class="city"><?= $row['population'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>

 <?php
    endif;
?>