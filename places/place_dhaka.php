<?php
error_reporting(0);
include('../re_use/session_user_name.php');
include('../re_use/link.php');
$packages = [
    ["name" => "3 Days & 4 Nights","place" => "Lalbag Fort,Dhaka", "price" => 10000, "image" => "https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/39/9d/0a.jpg"],
    ["name" => "5 Days & 6 Nights", "price" => 15000, "image" => "https://fantasykingdom.net/wp-content/uploads/2023/01/Details-to-Know-Before-Coming-to-Fantasy-Kingdom.webp"],
    ["name" => "10 Days & 11 Nights","place" => "Nation Zoo,Mirpur", "price" => 20000, "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXyMkHKEpQefaFhjUyM2hHB4PoZFFywv3unA&s", ]
];

$events = [
    ["name" => "Cultural Night","place" => "Dhaka", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEPWwe0YaDSPWlVLNFsBySbM_Jp42tOjecqQ&s", "type" => "Free"],
    ["name" => "Musical Concert","place" => "Savar", "image" => "https://img.freepik.com/premium-photo/confetti-fireworks-crowd-music-festival_989072-16.jpg", "type" => "Paid"],
    ["name" => "Movie","place" => "Dhaka", "image" => "https://lumiere-a.akamaihd.net/v1/images/p_encanto_homeent_22359_4892ae1c.jpeg", "type" => "Paid "]
];

$hotels = [
    ["name" => "Hotel White House International Residential","place"=>"Dhaka", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-YlKzNNRUm49qrKMf5zzX4QqF95DxYlstFw&s","description"=>"Lalbagh fort is a Mughal palace. It is one of the greatest heritage site of Dhaka, Bangladesh. It was built in 1678 A.D. by Muhammad Azam Shah and continued the work by his successor Nawab Shaista Khan. It has a huge area and many hidden passages.", "map"=> "https://maps.app.goo.gl/mkyp5kacyRDxLFZZ7"],
    ["name" => "Resort Atlantis", "place" => "Ashulia,Savar", "image" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/08/dc/00/cc/resort-atlantis.jpg?w=700&h=-1&s=1", "description" => "Take a break from your busy schedule, for a truly rejuvenating experience this year. The Atlantis is a unique getaway into a world of unparalleled luxury. Water Kingdom's 3-star Resort Atlantis invites you on a journey of discovery. Escape to a fabulous resort in a location where spectacular landscapes, historical wonders, magnificent environment and adventurous rides promise to create memories for a lifetime. Luxurious settings, impeccable service, international cuisine and VIP treatments come together to create the perfect holiday.","map"=> "https://maps.app.goo.gl/buwvdgLX2uVcmcMMA"],
    ["name" => "Pan Pacific", "place" => "Dhaka", "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1a/0f/fd/49/executive-suite.jpg", "description" => "Pan Pacific Sonargaon Dhaka welcomes you with a warm heart to enjoy the typical five-star facilities available; from first class surroundings to world-class hospitality in true Pan Pacific style, right from the airport. Now with the introduction of the extraordinary Elevated Express Highway, it now only takes 15 minutes to reach the doorstep of this iconic property in heart of the city center directly from the Hazrat Shah Jalal International Airport. Fostering a fantastically and strategically placed location, the property offers convenient access to key Government emplacements and Ministries.","map"=> "https://maps.app.goo.gl/SoNLfU9dYHhuVgYs9"]
];

$activities = [
    ["name" => "Visit to Heritage Place","place" => "Dhaka","time" => "9:00-11:00 AM", "image" => "https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/39/9d/0a.jpg", "description" => "Lalbagh fort is a Mughal palace. It is one of the greatest heritage site of Dhaka, Bangladesh. It was built in 1678 A.D. by Muhammad Azam Shah and continued the work by his successor Nawab Shaista Khan. It has a huge area and many hidden passages."],
    ["name" => "Explore Rides and Site", "place" => "Saver","time" => "2:00-4:00 PM","image" => "https://fantasykingdom.net/wp-content/uploads/2023/01/Details-to-Know-Before-Coming-to-Fantasy-Kingdom.webp", "description" => "Fantasy Kingdom has become a favourite destination for group outings, picnics, company or family day out. Attractive packages [including food, gifts, shows and travel to and from the park] are available. Facilities for arranging conference, annual general meeting or any corporate event, birthday, wedding or any family party, photo session or video shooting are also available in the fantasy kingdom. Prince Ashu, Princess Lia and their animal friends Zuzu, Bobo, Zipper and Bangasaur are always at the park welcoming everyone with a smile. Oh and they have many games for you. Come discover Fantasy Kingdom."],
    ["name" => "Experience Zoo Environment","place" => "Mirpur","time" => "6:00-10:00 PM", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXyMkHKEpQefaFhjUyM2hHB4PoZFFywv3unA&s", "description" => "Bangladesh National Zoo, is a zoo located in the Mirpur section of Dhaka, the capital city of Bangladesh. The zoo contains many native and non-native animals and wildlife, and attracts about three million visitors each year. On 5 February 2015, the name was changed from Dhaka Zoo to Bangladesh National Zoo."]
];

$feedbacks = [
    ["name" => "Ali Khan", "review" => "The trip was absolutely amazing! Hunza is breathtaking.", "rating" => 5],
    ["name" => "Sara Ahmed", "review" => "Loved the cultural night in Lahore. Highly recommended!", "rating" => 4.5],
    ["name" => "Usman Farooq", "review" => "Fairy Meadows is a must-visit. Great service!", "rating" => 5]
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
    <title>Sylhet Tourism</title>
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
            $city='Dhaka';
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