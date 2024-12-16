<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');

$packages = [
    ["name" => "3 Days & 2 Nights", "place" => "Marina Bay & Gardens by the Bay", "price" => 40000, "image" => "https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/07/c5/91/04.jpg"],
    ["name" => "5 Days & 4 Nights", "place" => "Sentosa Island & Universal Studios", "price" => 60000, "image" => "https://static.vecteezy.com/system/resources/previews/022/843/480/large_2x/singapore-oct-28-universal-studios-singapore-sign-on-october-28-2014-universal-studios-singapore-is-a-theme-park-located-within-resorts-world-sentosa-on-sentosa-island-singapore-free-photo.jpg"],
    ["name" => "7 Days & 6 Nights", "place" => "Singapore City & Surroundings", "price" => 85000, "image" => "https://ychef.files.bbci.co.uk/1280x720/p09cxktp.jpg"]
];

$events = [
    ["name" => "Singapore Food Festival", "place" => "Various Locations", "image" => "https://upload.wikimedia.org/wikipedia/commons/3/3e/Singapore_Street_Food_Festival.jpg", "type" => "Paid"],
    ["name" => "Marina Bay Light Show", "place" => "Marina Bay Sands", "image" => "https://upload.wikimedia.org/wikipedia/commons/2/29/Marina_Bay_Sands_Light_Show.jpg", "type" => "Free"],
    ["name" => "National Day Parade", "place" => "Padang", "image" => "https://upload.wikimedia.org/wikipedia/commons/f/fe/Singapore_National_Day_Parade.jpg", "type" => "Free"]
];

$hotels = [
    ["name" => "Marina Bay Sands", "place" => "Marina Bay", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/219442601.jpg?k=6f49081756205c24b12deea2860eb3439c6d13d7e5cb9b4094235c8f8de72282&o=&hp=1", "description" => "Iconic luxury hotel with the world-famous infinity pool.", "map" => "https://maps.app.goo.gl/1xQLb9zL1TpYpXMy9"],
    ["name" => "The Fullerton Hotel", "place" => "Singapore River", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/68250146.jpg?k=3bfa6f20d649e3aa882d1a7fae7f0d8b0c282dc00bb25eb0e2349db199d2cbf2&o=&hp=1", "description" => "A historic luxury hotel with spectacular city views.", "map" => "https://maps.app.goo.gl/Q9RhQw7U1CBLJjkS6"],
    ["name" => "Shangri-La Singapore", "place" => "Orchard Road", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/219442789.jpg?k=fa862530c70e144527bf6579088f5a23b7b87296e54c2162c6ecf5475a3e118b&o=&hp=1", "description" => "Award-winning urban retreat near shopping hotspots.", "map" => "https://maps.app.goo.gl/D39Rz9X2uU5Fyqns5"]
];

$activities = [
    ["name" => "Visit Gardens by the Bay", "place" => "Marina Bay", "time" => "9:00 AM-6:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/8/84/Supertrees_at_Gardens_by_the_Bay.jpg", "description" => "Explore futuristic gardens, the Flower Dome, and Cloud Forest."],
    ["name" => "Ride the Singapore Flyer", "place" => "Downtown Core", "time" => "3:00-5:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/a/a5/Singapore_Flyer_at_sunset.jpg", "description" => "Enjoy breathtaking views of Singapore from Asia's largest Ferris wheel."],
    ["name" => "Night Safari", "place" => "Singapore Zoo", "time" => "7:00-10:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/5/59/Night_Safari_Singapore.jpg", "description" => "Experience wildlife at night with unique nocturnal exhibits."]
];

$feedbacks = [
    ["name" => "Emily Tan", "review" => "Gardens by the Bay is absolutely stunning. A must-see attraction!", "rating" => 5],
    ["name" => "John Lim", "review" => "Universal Studios and Sentosa are perfect for family fun.", "rating" => 4.9],
    ["name" => "Sophia Ng", "review" => "Singapore’s food scene is amazing. Loved the hawker centers!", "rating" => 4.8]
];



// Check if the cart is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }
  
  // Add to cart functionality
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart']) && isset($_SESSION['user_id'])) {
    $item = [
      'name' => $_POST['package_name'],
      'place' => $_POST['package_place'],
      'price' =>  $_POST['package_price'],
      'quantity' => $_POST['package_quantity'],
      'date'=> $_POST['package_date']
    ];
  
    // Add the item to the cart
    $_SESSION['cart'][] = $item;
    $add_message = "Item added to cart successfully.";
    echo "<script>alert('$add_message');</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singapore Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!--Nev-->
    <?php include('../re_use/nev.php');?>
    <!--Nev-->
    <div class="container mt-5">
        <!-- Packages Section -->
        <section class="mb-5">
            <h3>Tour Packages</h3>
            <div class="row">
                <?php foreach ($packages as $package): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img width="250px" height="250px" src="<?php echo $package['image']; ?>" class="card-img-top"
                            alt="<?php echo $package['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo $package['name']; ?></b></h5>
                            <p class="card-text"><b>Price: </b><?php echo number_format($package['price']); ?> BDT
                            </p>
                            <p class="card-text"><b>Destination: </b><?php echo $package['place']; ?></p>
                            <form method="POST">
                                <input type="hidden" name="package_name" value="<?php echo $package['name']; ?>">
                                <input type="hidden" name="package_place" value="<?php echo $package['place']; ?>">
                                <input type="hidden" name="package_price" value="<?php echo $package['price']; ?>">
                                <input type="hidden" name="package_quantity" value="1" min="1"
                                    class="form-control mb-2">
                                <input class="btn btn-outline-success" type="date" name="package_date" value="date"
                                    required>
                                <button type="submit" name="add_to_cart" class="btn btn-outline-primary">Add
                                    to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Weather Section -->
        <?php
            $city='Singapore';
            include('../re_use/weather.php');
        ?>
        <!-- Weather Section -->
        <!-- Events Section -->
        <section class="mb-5">
            <h3>Events</h3>
            <div class="accordion" id="eventsAccordion">
                <?php foreach ($events as $index => $event): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="eventHeading<?php echo $index; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#eventCollapse<?php echo $index; ?>" aria-expanded="true"
                            aria-controls="eventCollapse<?php echo $index; ?>">
                            <b><?php echo $event['name']; ?></b>
                        </button>
                    </h2>
                    <div id="eventCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="eventHeading<?php echo $index; ?>" data-bs-parent="#eventsAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $event['image']; ?>"
                                class="img-fluid mb-3 rounded" alt="<?php echo $event['name']; ?>">
                            <p><b>Location: </b> <?php echo $event['place']; ?></p>
                            <p><b>Type: </b> <?php echo $event['type']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Hotel Facilities Section -->
        <section class="mb-5">
            <h3>Hotel Facilities</h3>
            <div class="accordion" id="hotelsAccordion">
                <?php foreach ($hotels as $index => $hotel): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="hotelHeading<?php echo $index; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#hotelCollapse<?php echo $index; ?>" aria-expanded="true"
                            aria-controls="hotelCollapse<?php echo $index; ?>">
                            <b><?php echo $hotel['name']; ?></b>

                        </button>
                    </h2>
                    <div id="hotelCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="hotelHeading<?php echo $index; ?>" data-bs-parent="#hotelsAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $hotel['image']; ?>"
                                class="img-fluid mb-3 rounded" alt="<?php echo $hotel['name']; ?>">
                            <p><b>Location:</b> <?php echo $hotel['place']; ?></p>
                            <p><b>Map: </b><a href="<?php echo $hotel['map'];?>" target="_blank">Visit Now</a>
                            </p>
                            <p><b>Description:</b> <?php echo $hotel['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Daily Activities Section -->
        <section class="mb-5">
            <h3>Daily Activities</h3>
            <div class="accordion" id="activitiesAccordion">
                <?php foreach ($activities as $index => $activity): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="activityHeading<?php echo $index; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#activityCollapse<?php echo $index; ?>" aria-expanded="true"
                            aria-controls="activityCollapse<?php echo $index; ?>">
                            <b><?php echo $activity['name']; ?></b>
                        </button>
                    </h2>
                    <div id="activityCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="activityHeading<?php echo $index; ?>" data-bs-parent="#activitiesAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $activity['image']; ?>"
                                class="img-fluid mb-3 rounded" alt="<?php echo $activity['name']; ?>">
                            <p><b>Location: </b> <?php echo $activity['place']; ?></p>
                            <p><b>Time: </b> <?php echo $activity['time']; ?></p>
                            <p><b>Description:</b> <?php echo $activity['description']; ?></p>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Feedback and Reviews Section -->
        <section class="mb-5">
            <h3>Feedback & Reviews</h3>
            <div class="row">
                <?php foreach ($feedbacks as $feedback): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $feedback['name']; ?></h5>
                            <p class="card-text">"<?php echo $feedback['review']; ?>"</p>
                            <p class="card-text">Rating: <?php echo $feedback['rating']; ?> &#9733;</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
    <?php include('../re_use/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>