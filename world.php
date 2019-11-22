<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'Password_123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($_SERVER['REQUEST_METHOD'] === 'GET' ){

  $country = filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  if(isset($country) or !empty($country)){
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<tr>";
    echo "<th>Country Name</th>";
    echo "<th>Continent</th>";
    echo "<th>Independence Year</th>";
    echo "<th>Head of State</th>";
    echo "</tr>";
    foreach($results as $row) {
      $country = $row['name'];
      $continent = $row['continent'];
      $ind_Year = $row['independence_year'];
      $hos = $row['head_of_state'];
      echo "<tr>";
      echo "<td>$country</td>";
      echo "<td>$continent</td>";
      echo "<td>$ind_Year</td>";
      echo "<td>$hos</td>";
      echo "</tr>";
    }
    echo "</table>";

  }
}