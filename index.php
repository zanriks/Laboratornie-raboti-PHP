<?php
require_once "db_connect.php";

$query = "SELECT 
                c.surname, c.name, 
                s.service_name, s.base_price,
                ca.status, ca.case_id,
                SUM(p.amount) as total_paid
            FROM cases ca
            JOIN client c ON ca.client_id = c.client_id
            JOIN service s ON ca.service_id = s.service_id
            LEFT JOIN payments p ON ca.case_id = p.case_id
            GROUP BY ca.case_id";

$res = mysqli_query($mysqli, $query);
if(!$res) die(mysqli_error($mysqli));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Детективное агентство</title>
</head>
<body>

<h2>Учет услуг и платежей</h2>

<main>
    <section></section>
</main>

</body>
</html>
