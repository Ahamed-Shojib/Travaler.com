<?php
$packages = [
    ["name" => "3 Days & 4 Nights", "price" => 20000, "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQM4iQvTcC6Cr61sNzUsaPCw-_6yengHdHrzA&s", "description" => "Lahore & Islamabad"],
    ["name" => "5 Days & 6 Nights", "price" => 35000, "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJDsPvhIbbsgOrt9-s4i79XAsHgYJ2YmDEPw&s", "description" => "Hunza Valley & Skardu"],
    ["name" => "10 Days & 11 Nights", "price" => 60000, "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-Fc_LrSnR7P7Av1s8kf5BV6ybLhKtoiri9A&s", "description" => "Fairy Meadows & Naran Kaghan"]
];

$events = [
    ["name" => "Cultural Night", "image" => "https://www.hebronhawkeye.com/wp-content/uploads/2022/09/34C059FA-7C7B-4EBD-8B37-2EBC9AAD305A-475x356.jpeg", "place" => "Lahore"],
    ["name" => "Desert Safari", "image" => "https://blog.oneclickdrive.com/wp-content/uploads/2023/10/1-1.jpg", "place" => "Cholistan"],
    ["name" => "Hiking Trip", "image" => "https://img.freepik.com/premium-photo/group-hikers-walking-down-hill-with-mountains-background_662214-511635.jpg", "place" => "Fairy Meadows"]
];

$hotels = [
    ["name" => "Serena Hotel", "image" => "https://image-tc.galaxy.tf/wijpeg-82jzupdydmrkdom6f5iyjmqxs/ish2-1.jpg", "place" => "Islamabad","description"=>"This luxurious hotel at the foot of the Margalla Hills lies 3 km from the Lal Masjid mosque, 4 km from Rawal Lake and 6 km from the Lok Virsa Museum.The elegant rooms and suites include free Wi-Fi and flat-screen TVs. Suites add separate sitting areas; some feature balconies. Room service is on available 24/7.", "map"=> "https://maps.app.goo.gl/aJ2uasc8mXp5nFXW7"],
    ["name" => "Pearl Continental", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXzQRFomJT3ETrDHDn2q4c2ixf2pgHaAY0nQ&s", "place" => "Lahore"],
    ["name" => "Hotel One", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSj2rzs4jeWPBFvQvHQssUBDZXurgLoNBdodg&s", "place" => "Skardu"]
];

$activities = [
    ["name" => "Visit to Badshahi Mosque", "image" => "https://visualpakistan.com/wp-content/uploads/2024/06/Badshahi-Mosque-3.jpg", "place" => "Lahore"],
    ["name" => "Explore Hunza Valley", "image" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0d/d5/1c/94/passu-valley-hunza-valley.jpg?w=1200&h=-1&s=1", "place" => "Hunza"],
    ["name" => "Experience Shandur Polo Festival", "image" => "https://i.dawn.com/primary/2023/07/64ab11a545690.jpg", "place" => "Shandur"]
];

$feedbacks = [
    ["name" => "Ali Khan", "review" => "The trip was absolutely amazing! Hunza is breathtaking.", "rating" => 5],
    ["name" => "Sara Ahmed", "review" => "Loved the cultural night in Lahore. Highly recommended!", "rating" => 4.5],
    ["name" => "Usman Farooq", "review" => "Fairy Meadows is a must-visit. Great service!", "rating" => 5]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakistan Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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
                            <h5 class="card-title"><?php echo $package['name']; ?></h5>
                            <p class="card-text">Price: PKR <?php echo number_format($package['price']); ?></p>
                            <p class="card-text">Destination: <?php echo $package['description']; ?></p>
                            <a href="cart.php?package=<?php echo urlencode($package['name']); ?>&price=<?php echo $package['price']; ?>"
                                class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

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
                            <?php echo $event['name']; ?> - <?php echo $event['place']; ?>
                        </button>
                    </h2>
                    <div id="eventCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="eventHeading<?php echo $index; ?>" data-bs-parent="#eventsAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $event['image']; ?>"
                                class="img-fluid mb-3" alt="<?php echo $event['name']; ?>">
                            Location: <?php echo $event['place']; ?>
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
                            <?php echo $hotel['name']; ?> - <?php echo $hotel['place']; ?>
                        </button>
                    </h2>
                    <div id="hotelCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="hotelHeading<?php echo $index; ?>" data-bs-parent="#hotelsAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $hotel['image']; ?>"
                                class="img-fluid mb-3" alt="<?php echo $hotel['name']; ?>">
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
                            <?php echo $activity['name']; ?> - <?php echo $activity['place']; ?>
                        </button>
                    </h2>
                    <div id="activityCollapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        aria-labelledby="activityHeading<?php echo $index; ?>" data-bs-parent="#activitiesAccordion">
                        <div class="accordion-body">
                            <img width="250px" height="250px" src="<?php echo $activity['image']; ?>"
                                class="img-fluid mb-3" alt="<?php echo $activity['name']; ?>">
                            Location: <?php echo $activity['place']; ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>