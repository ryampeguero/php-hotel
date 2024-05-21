<?php
if (isset($_GET["park_filter"]) && !empty(($_GET["park_filter"]))) {
    $park_filter = true;

    echo "vero";
    echo "<br>";
} else {
    $park_filter = false;
    echo "falso";
    echo "<br>";
}

if (isset($_GET["vote"])) {
    switch ($_GET["vote"]) {
        case "":
            $vote = 0;
            break;
        default:
            $vote = $_GET["vote"];
            break;
    }
    echo "Il voto: " . $vote;
}
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

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="index.php" method="GET">
        <select name="park_filter" id="">
            <option data-hidden="true" value="">Seleziona</option>
            <option value="true">Si</option>
            <option value="false">No</option>
        </select>
        <label for="vote">Filtra per voto</label>
        <input type="number" name="vote" id="vote">
        <button class="btn btn-primary submit">Filtra</button>
    </form>


    <div>
        <h4>Filtrato per parcheggio:</h4>
    </div>

    <?php
    $filter_hotel = [];
    foreach ($hotels as $index => $cur_hotel) {
        if ($park_filter || isset($vote)) {
            switch ($_GET['park_filter']) {
                case "true":
                    if ($cur_hotel['parking'] == true && $cur_hotel['vote'] >= $vote) {
                        $filter_hotel[] = $cur_hotel;
                    }
                    break;
                case "false":
                    if ($cur_hotel['parking'] == false && $cur_hotel['vote'] >= $vote) {
                        $filter_hotel[] = $cur_hotel;
                        echo $vote;
                    }
                    break;

                default:
                    if ($cur_hotel['vote'] >=  $vote) {
                        $filter_hotel[] = $cur_hotel;
                    }
                    break;
            }
        } else {
            $filter_hotel[] = $cur_hotel;
        }
    }
    $i = 0;
    foreach ($filter_hotel as $index => $cur_hotel) {
    ?>
        <div class="pb-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" colspan="3">Name</th>
                        <th scope="col" colspan="3">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Center Distance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td colspan="3"><?php echo $cur_hotel["name"]; ?></td>
                        <td colspan="3"><?php echo $cur_hotel["description"]; ?></td>
                        <td><?php echo $cur_hotel["parking"] ? 'Si' : 'No'; ?></td>
                        <td><?php echo $cur_hotel["vote"]; ?></td>
                        <td><?php echo $cur_hotel["distance_to_center"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>