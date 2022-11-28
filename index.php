<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
if (isset($_GET['parking']) && !empty($_GET['parking'])) {

    var_dump($_GET);
    $temp = [];

    foreach ($hotels as $item) {
        $park = $item['parking'] ? 'yes' : 'no';
        if ($park == $_GET['parking']) {
            $temp[] = $item;
        }
    }
    $hotels = $temp;
    var_dump($hotels);
}
if (isset($_GET['vote']) && !empty($_GET['vote'])) {
    $hotels = array_filter($hotels, fn ($value) => $value['vote'] >= $_GET['vote']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>PHP Hotel</title>

</head>

<body class="">
    <form action="index.php" method="GET">
        <h1 class="text-primary text-uppercase ms-5 fw-bold">Hotels:</h1>
        <select class="form-control form-control text-center w-25 mt-4 mb-4 ms-5" id="type" name="parking">
            <option value="" selected>Segli</option>
            <option value="yes">parking</option>
            <option value="no">no parking</option>
        </select>
        <select class="form-control form-control text-center w-25 mt-4 mb-4 ms-5" name=" vote" id="vote">
            <option value="" selected>scegli </option>
            <option value="1">vote 1</option>
            <option value="2">vote 2</option>
            <option value="3">vote 3</option>
            <option value="4">vote 4</option>
            <option value="5">vote 5</option>
        </select>
        <button class="btn btn-primary ms-5 " type="submit">Send</button>
    </form>
    <table class='container table table-bordered border-primary table-dark table-striped mt-5 text-uppercase'>
        <thead>
            <tr>
                <th scope='col'>name</th>
                <th scope='col'>description</th>
                <th scope='col'>parking</th>
                <th scope='col'>vote</th>
                <th scope='col'>distance to center</th>
            </tr>
        </thead>

        <?php

        foreach ($hotels as $hotel) {

            $park = $hotel['parking'] ? 'yes' : 'no';

            echo "
    <tbody>
    <tr>
    <td>$hotel[name]</td>
    <td>$hotel[description]</td>
    <td>$park</td>
    <td>$hotel[vote]</td>
    <td>$hotel[distance_to_center] km</td>
    </tr>
    </tbody>
    ";
        }
        ?>
    </table>

</body>

</html>