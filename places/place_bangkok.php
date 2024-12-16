<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');

$packages = [
    ["name" => "3 Days & 2 Nights", "place" => "Grand Palace & Temples Tour", "price" => 20000, "image" => "https://cdn-imgix.headout.com/media/images/adbcb77f18f0273c202c5490347f381a-5.jpg?w=744&h=465&crop=faces&auto=compress%2Cformat&fit=min"],
    ["name" => "5 Days & 4 Nights", "place" => "Shopping & Floating Markets", "price" => 30000, "image" => "https://lh7-rt.googleusercontent.com/docsz/AD_4nXe0_UaEfQBSkEVdl7lEjLYMLrAA01nZaL33tC7b50bqk4WLbwFofSNLqmXW_oaEAyaD337i1Pdcqeup5P8YRu655f7Xy8Wr56fk07NqDou3NOgoWn22d7Hdg2rwAibVjxP9GY-67OXVD0OrxRvfmjyFpjE?key=z6vppo4ajt6Uc5CC4n8tWA"],
    ["name" => "7 Days & 6 Nights", "place" => "Bangkok & Pattaya Beach", "price" => 50000, "image" => "https://cdn.kimkim.com/files/a/images/e07d7b506bbfacc0f20c4b5aadf98f948345e737/original-451bc13b2bf831633ffb88ee321cf71e.jpg"]
];

$events = [
    ["name" => "Cultural Dance Show", "place" => "Siam Niramit", "image" => "https://upload.wikimedia.org/wikipedia/commons/9/9d/Siam_Niramit_Stage_Performance.jpg", "type" => "Paid"],
    ["name" => "Nightlife Experience", "place" => "Khao San Road", "image" => "https://upload.wikimedia.org/wikipedia/commons/d/d1/Khaosan_Road_at_night.jpg", "type" => "Free"],
    ["name" => "Thai Street Food Festival", "place" => "Chatuchak Market", "image" => "https://upload.wikimedia.org/wikipedia/commons/e/ef/Street_Food_in_Bangkok.jpg", "type" => "Paid"]
];

$hotels = [
    ["name" => "Mandarin Oriental Bangkok", "place" => "Chao Phraya River", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/219442601.jpg?k=6f49081756205c24b12deea2860eb3439c6d13d7e5cb9b4094235c8f8de72282&o=&hp=1", "description" => "A luxurious riverside hotel with a blend of Thai heritage and modern elegance.", "map" => "https://maps.app.goo.gl/F9DzBceVJBPx5EWaA"],
    ["name" => "The Peninsula Bangkok", "place" => "Bangkok Riverside", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/100456945.jpg?k=8e2ab30e8b8498ba4c1cc3826c88b4ed1a5d8e87dd59207a21407da9d0c5140d&o=&hp=1", "description" => "Elegant riverside accommodations with world-class service.", "map" => "https://maps.app.goo.gl/FbRbbJJfFMwF7RvV6"],
    ["name" => "Siam Kempinski Hotel", "place" => "Siam", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/68250146.jpg?k=3bfa6f20d649e3aa882d1a7fae7f0d8b0c282dc00bb25eb0e2349db199d2cbf2&o=&hp=1", "description" => "A luxurious retreat in the heart of Bangkok's shopping district.", "map" => "https://maps.app.goo.gl/P2LjCtBp5xmqbf9V8"]
];

$activities = [
    ["name" => "Visit the Grand Palace", "place" => "Rattanakosin Island", "time" => "9:00 AM-12:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/8/84/Wat_Phra_Kaew_and_Grand_Palace_in_Bangkok%2C_Thailand.jpg", "description" => "Explore the stunning architecture and learn about Thailand's royal heritage."],
    ["name" => "Explore Chatuchak Market", "place" => "Chatuchak", "time" => "2:00-5:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/c/c6/Chatuchak_Weekend_Market_Bangkok.jpg", "description" => "Shop, eat, and experience the vibrant culture of Bangkok's largest market."],
    ["name" => "Dinner Cruise on Chao Phraya River", "place" => "Chao Phraya River", "time" => "7:00-9:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/f/f3/Dinner_cruise_in_Bangkok.jpg", "description" => "Enjoy a scenic dinner cruise with stunning views of Bangkok's landmarks."]
];

$feedbacks = [
    ["name" => "Ali Raza", "review" => "The Grand Palace is a masterpiece. A must-visit in Bangkok!", "rating" => 5],
    ["name" => "Sana Ahmed", "review" => "Loved the floating markets and street food. The city is so lively!", "rating" => 4.9],
    ["name" => "Hassan Mehmood", "review" => "Nightlife on Khao San Road is electrifying. Bangkok has something for everyone!", "rating" => 4.8]
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
    <title>Bangkok Tourism</title>
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
            $city='Bangkok';
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