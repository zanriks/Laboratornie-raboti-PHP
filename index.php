<?php
function isPrime(int $num): bool
{
    if ($num < 2) return false;
    if ($num === 2) return true;
    if ($num % 2 === 0) return false;

    for ($i = 3; $i * $i <= $num; $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function hasNo123(int $num): bool {
    $strNum = strval($num);
    if (strpos($strNum, '1') !== false ||
            strpos($strNum, '2') !== false ||
            strpos($strNum, '3') !== false) {
        return false;
    }
    return true;
}

$arrayX = [];
$n = 10;

// Заполнение массива X рандомными числами
for ($i = 0; $i < $n; $i++) {
    $arrayX[] = rand(1, 100);
}

// Переписываем в Y числа, в которых нет 1, 2, 3
$arrayY = array_values(array_filter($arrayX, 'hasNo123'));

// Проверка массива на простые числа
$primeInY = array_values(array_filter($arrayY, 'isPrime'));

function sumTwoLargest(array $num): float
{
    if (count($num) < 2) {
        throw new InvalidArgumentException('Массив должен содержать минимум 2 числа.');
    }

    rsort($num);
    return $num[0] + $num[1];
}

function sumThreeMin(array $arr): ?int
{
    if (count($arr) < 3) return null;

    $sorted = $arr;
    sort($sorted);
    return array_sum(array_slice($sorted, 0, 3));
}

$sumTwoMax = sumTwoLargest($arrayY);
$sumThreeMin = sumThreeMin($arrayY);
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<main>
    <div class="container">
        <h1>Результат работы</h1>

        <div class="block">
            <span class="label">Массив X:</span>
            <span class="value"><?= implode(', ', $arrayX) ?></span>
        </div>

        <div class="block">
            <span class="label">Массив Y (без 1, 2, 3):</span>
            <span class="value"><?= implode(', ', $arrayY) ?></span>
        </div>

        <div class="block">
            <span class="label">Сумма двух наибольших:</span>
            <span class="value"><?= $sumTwoMax ?></span>
        </div>

        <div class="block">
            <span class="label">Сумма трёх наименьших:</span>
            <span class="value"><?= $sumThreeMin ?></span>
        </div>

        <div class="block">
            <span class="label">Простые числа:</span>
            <?php if (!empty($primeInY)): ?>
                <span class="value success"><?= implode(', ', $primeInY) ?></span>
            <?php else: ?>
                <span class="value error">Не найдено</span>
            <?php endif; ?>
        </div>

        <button onclick="location.reload()">Обновить данные</button>
    </div>
</main>
</body>
</html>