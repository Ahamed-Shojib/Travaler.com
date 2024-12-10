<?php
// Adventures content
$title = "Adventures";
$description = "Adventures encompass thrilling experiences, from exploring rugged landscapes to igniting curiosity and creating unforgettable memories.";
$activities = [
    ["title" => "Trekking", "image" => "https://ik.imagekit.io/mayamaya/wp-content/uploads/2023/06/A-couple-trekking-1024x684.jpg", "description" => "Experience breathtaking mountain trails that challenge your limits."],
    ["title" => "Skydiving", "image" => "https://images.pexels.com/photos/2867732/pexels-photo-2867732.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2", "description" => "Feel the adrenaline rush as you jump into scenic landscapes."],
    ["title" => "Scuba Diving", "image" => "https://images.pexels.com/photos/37530/divers-scuba-divers-diving-underwater-37530.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2", "description" => "Dive into vibrant marine worlds full of colorful life."],
    ["title" => "Camping", "image" => "https://images.pexels.com/photos/1687845/pexels-photo-1687845.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2", "description" => "Relax under the stars and connect with nature."],
    ["title" => "Camping", "image" => "https://images.pexels.com/photos/1752417/pexels-photo-1752417.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2", "description" => "Relax under the stars and connect with nature."],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../css/style_adventures.css">
</head>

<body>
    <header>
        <h1><?php echo $title; ?></h1>
    </header>
    <div class="container">
        <section>
            <h2>Overview</h2>
            <p><?php echo $description; ?></p>
        </section>
        <section class="activities">
            <h2>Top Activities</h2>
            <ul>
                <?php
                foreach ($activities as $activity) {
                    echo "<li>{$activity['title']}</li>";
                }
                ?>
            </ul>
        </section>
        <section>
            <h2>Specific Adventures</h2>
            <div class="specific-adventures">
                <?php
                foreach ($activities as $activity) {
                    echo "
                    <div class='adventure-item'>
                        <img src='{$activity['image']}' alt='{$activity['title']}'>
                        <h3>{$activity['title']}</h3>
                        <p>{$activity['description']}</p>
                    </div>";
                }
                ?>
            </div>
        </section>
    </div>
    <?php require('../footer.php')?>
</body>

</html>