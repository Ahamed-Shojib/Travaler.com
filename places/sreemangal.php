<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');


$packages = [
    ["name" => "2 Days & 1 Night", "place" => "Tea Gardens Tour", "price" => 8000, "image" => "https://upload.wikimedia.org/wikipedia/commons/a/a2/Srimangal_tea_garden.jpg"],
    ["name" => "3 Days & 2 Nights", "place" => "Lawachara Rainforest & Tea Estates", "price" => 12000, "image" => "https://upload.wikimedia.org/wikipedia/commons/6/66/Lawachara_National_Park.jpg"],
    ["name" => "5 Days & 4 Nights", "place" => "Sreemangal Full Experience", "price" => 20000, "image" => "https://upload.wikimedia.org/wikipedia/commons/d/d7/Sreemangal_train_station.jpg"]
];

$events = [
    ["name" => "Tea Festival", "place" => "Sreemangal", "image" => "https://cdn.shopify.com/s/files/1/0579/7597/files/tea_tasting_bruu_grande.jpg?v=1472371446", "type" => "Paid"],
    ["name" => "Cultural Evening", "place" => "Sreemangal Town", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ76l8dtACfxpoK_hTwlsJojKN_mnFpuzSgKQ&usqp=CAU", "type" => "Free"],
    ["name" => "Rainforest Exploration", "place" => "Lawachara", "image" => "https://upload.wikimedia.org/wikipedia/commons/6/6e/Lawachara_Rainforest.jpg", "type" => "Paid"]
];

$hotels = [
    ["name" => "Grand Sultan Tea Resort", "place" => "Sreemangal", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/51345850.jpg?k=6823b8398a256305ce4b28ab0b23444823626742242dc0c01a6cc07e5e858703&o=&hp=1", "description" => "A luxurious resort offering serene views of the tea gardens.", "map" => "https://maps.app.goo.gl/4cMQFmzmf8WdBvXv7"],
    ["name" => "Green Leaf Guest House", "place" => "Sreemangal Town", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/181945372.jpg?k=5ea4030e63718af3151d3e3c34017c5dfdb8a563f35db9182b32a47d0152739a&o=&hp=1", "description" => "A comfortable and budget-friendly guest house near town.", "map" => "https://maps.app.goo.gl/ErTfF6LFcrJh51rR9"],
    ["name" => "Nishorgo Eco Resort", "place" => "Lawachara", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTz_1tpxmG5lOf5vR_hbzPBc0L9OmWYBdijQ&usqp=CAU", "description" => "An eco-friendly resort close to the rainforest.", "map" => "https://maps.app.goo.gl/fCB3qohN5ZTjMToW7"]
];

$activities = [
    ["name" => "Explore Tea Gardens", "place" => "Sreemangal", "time" => "8:00-10:00 AM", "image" => "https://upload.wikimedia.org/wikipedia/commons/a/a2/Srimangal_tea_garden.jpg", "description" => "Wander through the lush, green tea gardens."],
    ["name" => "Rainforest Walk", "place" => "Lawachara", "time" => "10:30 AM-12:30 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/6/6e/Lawachara_Rainforest.jpg", "description" => "Discover the biodiversity of Lawachara National Park."],
    ["name" => "Tea Tasting", "place" => "Sreemangal Town", "time" => "4:00-6:00 PM", "image" => "https://cdn.shopify.com/s/files/1/0579/7597/files/tea_tasting_bruu_grande.jpg?v=1472371446", "description" => "Taste various types of aromatic teas grown locally."]
];

$feedbacks = [
    ["name" => "Ayesha Rahman", "review" => "The tea gardens in Sreemangal are a piece of heaven. Loved it!", "rating" => 5],
    ["name" => "Jahidul Islam", "review" => "The rainforest walk was refreshing and full of surprises!", "rating" => 4.9],
    ["name" => "Sadia Ahmed", "review" => "The Grand Sultan Resort made my stay luxurious and comfortable.", "rating" => 5]
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
    <title>Sreemangal Tourism</title>
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
                                    to
                                    Cart</button>
                                <!-- <a href="../cart.php?package=<?php echo urlencode($package['name']); ?>&price=<?php echo $package['price']; ?>"
                                    class="btn btn-primary">Book Now</a> -->
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Weather Section -->
        <?php
            $city='Sreemangal';
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