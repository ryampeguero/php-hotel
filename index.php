<?php
if(isset($_GET["park_filter"])){
    $park_filter = $_GET["park_filter"];
    switch($park_filter){
        case "true":
            $park_filter = true;
            break;
        case "false":
            $park_filter = false;
            break;
    }
    
    echo $park_filter;
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
            <option value="true">Si</option>
            <option value="false">No</option>
        </select>
        <button class="btn btn-primary submit">Filtra</button>
    </form>
    <?php
    foreach ($hotels as $index => $cur_hotel) {
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
                        <th scope="row">1</th>
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