<?php
ini_set('display_errors', 0);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $city = htmlspecialchars($_POST['city']);
    $apiKey = 'c17ffc712fdfa4994858de7a45fd8986';

    $apiUrl = "https://api.openweathermap.org/data/2.5/forecast?q=" . urlencode($city) . "&appid=" . $apiKey . "&units=metric";

    $response = file_get_contents($apiUrl);
    $weatherData = json_decode($response, true);

    if ($weatherData && $weatherData['cod'] == "200") {
        $locationName = $weatherData['city']['name'] . ', ' . $weatherData['city']['country'];
        $forecast = [];
        foreach ($weatherData['list'] as $entry) {
            $date = explode(' ', $entry['dt_txt'])[0];
            if (!isset($forecast[$date])) {
                $temperature = $entry['main']['temp'];
                $description = $entry['weather'][0]['description'];
                $icon = $entry['weather'][0]['icon'];
                $dayOfWeek = date('l', strtotime($date));
                $forecast[$date] = [
                    'day' => $dayOfWeek,
                    'date' => $date,
                    'temperature' => $temperature,
                    'description' => $description,
                    'icon' => $icon
                ];
            }
        }
    } else {
        $error = "Could not retrieve weather data. Please check the city name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Weather Forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow p-4">
            <h1 class="text-center mb-4">Daily Weather Forecast</h1>
            <form method="POST" class="d-flex justify-content-center mb-4">
                <input type="text" name="city" class="form-control w-50 me-2" placeholder="Enter city name" required>
                <button type="submit" class="btn btn-outline-warning">Get Forecast</button>
            </form>

            <?php if (isset($forecast)) { ?>
            <h2 class="text-center">Location: <?php echo $locationName; ?></h2>
            <div class="row row-cols-1 row-cols-md-6 g-4 mt-4">
                <?php foreach ($forecast as $day) { ?>
                <div class="col">
                    <div class="card h-100 text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-warning"><?php echo $day['day']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $day['date']; ?></h6>
                            <img class="img-fluid my-3"
                                src="http://openweathermap.org/img/wn/<?php echo $day['icon']; ?>@2x.png"
                                alt="Weather Icon">
                            <h6 class="card-text text-info">Temperature: <?php echo $day['temperature']; ?>°C</h6>
                            <h6 class="card-text text-secondary">Description:
                                <?php echo ucfirst($day['description']); ?>
                            </h6>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } elseif (isset($error)) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $error; ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>