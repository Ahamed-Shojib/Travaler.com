<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');

$packages = [
    ["name" => "3 Days & 2 Nights", "place" => "Petronas Towers & KLCC", "price" => 35000, "image" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/76/d5/e8/die-petronas-towers-sind.jpg?w=900&h=500&s=1"],
    ["name" => "5 Days & 4 Nights", "place" => "Batu Caves & Genting Highlands", "price" => 50000, "image" => "https://www.ontourmalaysia.com/wp-content/uploads/2021/01/One-day-tour-to-Genting-Highlands.jpeg"],
    ["name" => "7 Days & 6 Nights", "place" => "Kuala Lumpur City & Surroundings", "price" => 75000, "image" => "https://www.connollycove.com/wp-content/uploads/2022/01/Kuala-Lumpur-City-Centre-KLCC-Medium-1.jpg"]
];

$events = [
    ["name" => "Malaysia Mega Sale Carnival", "place" => "Various Locations", "image" => "https://upload.wikimedia.org/wikipedia/commons/3/31/Shopping_Mall_in_KL.jpg", "type" => "Paid"],
    ["name" => "Cultural Dance Performances", "place" => "Central Market", "image" => "https://upload.wikimedia.org/wikipedia/commons/9/94/Cultural_Dance_Malaysia.jpg", "type" => "Free"],
    ["name" => "New Year's Eve Countdown", "place" => "KLCC Park", "image" => "https://upload.wikimedia.org/wikipedia/commons/f/f3/New_Year_Eve_KLCC.jpg", "type" => "Free"]
];

$hotels = [
    ["name" => "Mandarin Oriental Kuala Lumpur", "place" => "KLCC", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/68367988.jpg?k=42d04543de9fda3c57b5d34d17790b8cd9cb64379f3a2aa194cfd3a1549b737b&o=&hp=1", "description" => "Luxurious accommodation steps away from the Petronas Towers.", "map" => "https://maps.app.goo.gl/jp5v5NVdPH9gjGpD9"],
    ["name" => "The Majestic Hotel Kuala Lumpur", "place" => "KL Sentral", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/220680356.jpg?k=ec0a7e7d8c4dfb58e20334ae8108882575afba531445c8aa0e1b1afefed4f6b7&o=&hp=1", "description" => "Colonial-era luxury hotel with a blend of tradition and modernity.", "map" => "https://maps.app.goo.gl/rt3kgFSsZXm5NvnD9"],
    ["name" => "Traders Hotel Kuala Lumpur", "place" => "KLCC", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/223607266.jpg?k=a3e1dba5f27c73114a5dc8077a3df1cd9cd807a9bc4629b4b0f158a5a9dca219&o=&hp=1", "description" => "Top-notch hospitality with breathtaking views of the Petronas Towers.", "map" => "https://maps.app.goo.gl/ErzCFi5ZWB4r9HXf9"]
];

$activities = [
    ["name" => "Visit Petronas Towers", "place" => "KLCC", "time" => "9:00 AM-6:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/a/a1/Petronas_Twin_Towers_at_night.jpg", "description" => "Admire the architecture and enjoy panoramic city views."],
    ["name" => "Explore Batu Caves", "place" => "Batu Caves", "time" => "7:00 AM-5:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/f/f9/Batu_Caves_statue.jpg", "description" => "Visit the iconic limestone caves and vibrant Hindu temples."],
    ["name" => "Shopping at Bukit Bintang", "place" => "Bukit Bintang", "time" => "10:00 AM-10:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/8/80/Bukit_Bintang_KL.jpg", "description" => "Indulge in high-end shopping, street food, and vibrant nightlife."]
];

$feedbacks = [
    ["name" => "Aisha Rahman", "review" => "The Petronas Towers are absolutely breathtaking at night!", "rating" => 5],
    ["name" => "Michael Tan", "review" => "Exploring Batu Caves was an unforgettable spiritual and cultural experience.", "rating" => 4.8],
    ["name" => "Sophia Lee", "review" => "Loved shopping and street food in Bukit Bintang. A lively area!", "rating" => 4.9]
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
    <title>Kuala Lumpur Tourism</title>
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
            $city='Kuala Lumpur';
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