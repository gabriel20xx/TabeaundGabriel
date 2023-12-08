<?php

$pin = '2306';
$imageFolder = './img';

if (is_dir($imageFolder)) {
    $imageCount = count(array_diff(scandir($imageFolder), ['.', '..']));
}


if (isset($_POST['pwd']) && $_POST['pwd'] == $pin) {
    echo '
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">
    
    <head>
        <title>Tabea und Gabriel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="js/fallanimation.js"></script>
        <script src="js/envelope.js"></script>
        <script src="js/changebackground.js"></script>
    </head>
    
    <body>';

    $quotesAuthors = [
        ["quote" => "I saw that you were perfect, and so I loved you. Then I saw that you were not perfect and I loved you even more.", "author" => "Angelita Lim"],
        ["quote" => "You know you’re in love when you can’t fall asleep because reality is finally better than your dreams.", "author" => "Dr. Seuss"],
        ["quote" => "Love is that condition in which the happiness of another person is essential to your own.", "author" => "Robert A. Heinlein"],
        ["quote" => "The best thing to hold onto in life is each other.", "author" => "Audrey Hepburn"],
        ["quote" => "I need you like a heart needs a beat.", "author" => "Unknown"],
        ["quote" => "I am who I am because of you. You are every reason, every hope, and every dream I’ve ever had.", "author" => "The Notebook"],
        ["quote" => "If I had a flower for every time I thought of you... I could walk through my garden forever.", "author" => "Alfred Tennyson"],
        ["quote" => "Take my hand, take my whole life too. For I can’t help falling in love with you.", "author" => "Elvis Presley"],
    ];

    // Loop through both arrays based on specified iterations
    $x = 1;
    $y = 1;
    for ($i = 0; $i < count($quotesAuthors) + $imageCount; $i++) {
        if ($i % 3 == 0 || $i % 3 == 2) {
            // Display image for 1st, 3rd, 4th, 6th, 7th, 9th iteration
            echo '<img src="img/image'. $x .'-min.jpg" class="img-fluid" alt="..." loading="lazy">';
            $x++;
        } else {
            // Display quote for other iterations
            echo '<figure class="text-center my-5 mx-2">';
            echo '<blockquote class="blockquote">';
            echo '<p>' . $quotesAuthors[$y]["quote"] . '</p>';
            echo '</blockquote>';
            echo '<figcaption class="blockquote-footer">';
            echo $quotesAuthors[$y]["author"];
            echo '</figcaption>';
            echo '</figure>';
            $y++;
        }
    }


    $buttonClasses = ['star-btn', 'lock-btn', 'envelope-btn', 'snow-btn', 'heart-btn'];

    // Loop through the array to generate buttons
    echo '<div class="button-container">';
    foreach ($buttonClasses as $class) {
        echo '<button class="' . $class . '" id="' . substr($class, 0, -4) . 'Button">';
        echo '<i class="bi bi-' . substr($class, 0, -4) . '-fill"></i>';
        echo '</button>';
    }
    echo '</div>';


    $data = [
        ["name" => "Gabriel", "message" => "You are the best person on earth. I love you with every heartbeat. I wish you the best. Make your wishes come true."],
        ["name" => "Urs", "message" => "Urs Message"],
        ["name" => "Diego", "message" => "Diegos Message"]
    ];

    // Loop through the array to generate carousel frames
    echo '<div class="carousel d-none">';
    foreach ($data as $entry) {
        echo '<div class="frame">';
        echo '<div class="wrapper" onclick="toggleEnvelope(event)">';
        echo '<div class="lid one"></div>';
        echo '<div class="lid two"></div>';
        echo '<div class="envelope"></div>';
        echo '<div class="letter">';
        echo '<p>' . $entry["message"] . '</p>';
        echo '<p class="fst-italic">- ' . $entry["name"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';

    echo '
        <footer>
            <p class="text-center my-2">Made with ❤️ for my Soulmate</p>
        </footer>
    </body>
    
    </html>
    ';
} else {
    echo '
    <h1>Please enter pin code</h1>
    <form action="/index.php" method="post">
        <label for="pwd">Password</label>
        <input type="password" id="pwd" name="pwd"> 
        <input type="submit" value="Submit">
    </form>
    ';
    if (isset($_POST['pwd']) && $_POST['pwd'] != $pin) {
        echo '
        <p>Pin is wrong!</p>
        ';
    }
}
