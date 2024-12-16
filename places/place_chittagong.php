<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');


$packages = [
    ["name" => "3 Days & 2 Nights", "place" => "Patenga Sea Beach", "price" => 15000, "image" => "https://www.travelmate.com.bd/wp-content/uploads/2019/08/patenga-sea-beach-2.jpg"],
    ["name" => "5 Days & 4 Nights", "place" => "Bandarban Hill Tracts", "price" => 22000, "image" => "https://live.staticflickr.com/4865/46052827292_7e3281deb1_c.jpg"],
    ["name" => "7 Days & 6 Nights", "place" => "Rangamati & Kaptai Lake", "price" => 30000, "image" => "https://www.travelmate.com.bd/wp-content/uploads/2019/07/Kaptai-Lake-2.jpg"]
];

$events = [
    ["name" => "Beach Bonfire Night", "place" => "Patenga Beach", "image" => "https://cdn.pixabay.com/photo/2016/11/14/04/43/fire-1823734_960_720.jpg", "type" => "Free"],
    ["name" => "Boat Cruise", "place" => "Kaptai Lake", "image" => "https://upload.wikimedia.org/wikipedia/commons/3/37/Kaptai_lake.jpg", "type" => "Paid"],
    ["name" => "Traditional Tribal Dance", "place" => "Bandarban", "image" => "https://upload.wikimedia.org/wikipedia/commons/9/9f/Traditional_Tribal_Dance.jpg", "type" => "Free"]
];

$hotels = [
    ["name" => "Hotel The Patenga Today", "place" => "Patenga", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/240642196.jpg?k=15c60300ed57c18ee5e43b4e9fc7a74c6d1f75c676b3842b88580ec50f23f70c&o=&hp=1", "description" => "A luxurious beachside stay with stunning ocean views.", "map" => "https://maps.app.goo.gl/4gQy6cDqs89QWiYYA"],
    ["name" => "Sairu Hill Resort", "place" => "Bandarban", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIRPPIoxsl7odZCx7n35FPzxdkh6ddci10Xw&s", "description" => "A serene retreat surrounded by hills and nature.", "map" => "https://maps.app.goo.gl/QWdDqrpKgNKC7S8D6"],
    ["name" => "Aronnak Holiday Resort", "place" => "Rangamati", "image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/181894231.jpg?k=6ae9677fcf11b7f8584018f3c8e598d9a462bfa9908dbb729c8ea990f2c63cf6&o=&hp=1", "description" => "Enjoy breathtaking views of Kaptai Lake.", "map" => "https://maps.app.goo.gl/XDqZQY7fjWUc9wWo8"]
];

$activities = [
    ["name" => "Explore Patenga", "place" => "Patenga Beach", "time" => "6:00-8:00 AM", "image" => "https://upload.wikimedia.org/wikipedia/commons/d/dc/Cox%27s_Bazar_beach.jpg", "description" => "Relax and enjoy the longest sea beach in the Country."],
    ["name" => "Visit Nilgiri", "place" => "Bandarban", "time" => "9:00 AM-1:00 PM", "image" => "https://upload.wikimedia.org/wikipedia/commons/f/f2/Nilgiri_Bandarban.jpg", "description" => "Experience the clouds and panoramic hill views."],
    ["name" => "Boat Ride on Kaptai Lake", "place" => "Kaptai Lake", "time" => "3:00-5:00 PM", "image" => "https://cdn.britannica.com/86/183386-050-47B23C32/Kaptai-Lake-Rangamati-Bangladesh.jpg", "description" => "Enjoy a serene boat ride on the scenic Kaptai Lake."]
];

$feedbacks = [
    ["name" => "Nayeem Ahmed", "review" => "Cox's Bazar is stunning. A must-visit destination.", "rating" => 5],
    ["name" => "Sharmin Akter", "review" => "The hills in Bandarban are breathtaking. Great hospitality!", "rating" => 4.8],
    ["name" => "Kamal Uddin", "review" => "Kaptai Lake cruise was a peaceful and enjoyable experience.", "rating" => 5]
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
    <title>Chittagong Tourism</title>
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
            $city='Chittagong';
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