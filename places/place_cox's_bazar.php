<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');

$packages = [
    ["name" => "3 Days & 2 Nights", "place" => "Cox's Bazar Beach", "price" => 15000, "image" => "https://speedholidays.com.bd/wp-content/uploads/2019/11/Coxs-Bazar-3.jpg"],
    ["name" => "5 Days & 4 Nights", "place" => "Inani Beach & Himchari", "price" => 22000, "image" => "https://sandee.com/_next/image?url=https%3A%2F%2Fcdn.sandee.com%2F59753_1650_1100.avif&w=3840&q=75"],
    ["name" => "7 Days & 6 Nights", "place" => "St. Martin's Island & Cox's Bazar", "price" => 30000, "image" => "https://www.deshghuri.com/wp-content/uploads/2014/05/first-view-of-st-martin-island.jpg"]
];

$events = [
    ["name" => "Beach Carnival", "place" => "Cox's Bazar Beach", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_D-3c4mf9ERWLo7hjZnLRZDYkP_3YimQ0Ng&usqp=CAU", "type" => "Free"],
    ["name" => "Sunset Cruise", "place" => "Laboni Beach", "image" => "https://upload.wikimedia.org/wikipedia/commons/d/d6/Sunset_at_Cox%27s_Bazar_Beach.jpg", "type" => "Paid"],
    ["name" => "Seafood Fest", "place" => "Cox's Bazar Town", "image" => "https://upload.wikimedia.org/wikipedia/commons/6/64/Seafood.jpg", "type" => "Paid"]
];

$hotels = [
    ["name" => "Sayeman Beach Resort", "place" => "Cox's Bazar", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/102358078.jpg?k=2ed2ac5896b5d3fca11b58a78d8b1cc623fd25fbe97ba08327e0e6ae4fd6792e&o=&hp=1", "description" => "A luxurious beachside resort with stunning sea views.", "map" => "https://maps.app.goo.gl/PF7Wa5qU3R9nhfEf6"],
    ["name" => "Ocean Paradise Hotel", "place" => "Cox's Bazar", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/191229948.jpg?k=ae8286165af3e24217b3e8d43f68974b1ac7b93119904b25fae8b08b61e6d366&o=&hp=1", "description" => "A premium hotel offering comfort and proximity to Laboni Beach.", "map" => "https://maps.app.goo.gl/xJWjULBK9EzDoxJo6"],
    ["name" => "Long Beach Hotel", "place" => "Cox's Bazar", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/51893109.jpg?k=cb39ff9c7c1ddafc67f0fdf77be3a331ec52bb8dc5b01c0aaba7302ef99ef07b&o=&hp=1", "description" => "Modern accommodations with excellent amenities for all travelers.", "map" => "https://maps.app.goo.gl/FwvMbW54VdKoB1Kn7"]
];

$activities = [
    ["name" => "Explore Inani Beach", "place" => "Inani", "time" => "9:00 AM-12:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/5/5d/Inani_Beach%2C_Cox%27s_Bazar%2C_Bangladesh.jpg", "description" => "Relax on the white sandy beaches of Inani, away from the crowd."],
    ["name" => "Hiking in Himchari", "place" => "Himchari", "time" => "2:00-4:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/a/aa/Himchari_National_Park.jpg", "description" => "Enjoy the serene environment and scenic waterfalls in Himchari National Park."],
    ["name" => "Boat Ride to St. Martin's Island", "place" => "Teknaf", "time" => "8:00 AM-6:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/8/86/St._Martin%27s_Island_-_Bangladesh.jpg", "description" => "Take a day trip to the coral island and immerse yourself in nature."]
];

$feedbacks = [
    ["name" => "Arman Rahman", "review" => "The beaches are breathtaking, and the seafood is amazing!", "rating" => 5],
    ["name" => "Tania Hossain", "review" => "St. Martin's Island is a paradise. Highly recommend the boat ride!", "rating" => 4.9],
    ["name" => "Imran Karim", "review" => "Himchari's hiking trails are peaceful and rejuvenating.", "rating" => 4.8]
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
    <title>Cox's Bazar Tourism</title>
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
            $city="Cox's Bazar";
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