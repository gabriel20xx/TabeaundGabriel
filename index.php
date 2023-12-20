<?php

$imageFolder = './img';
$incorrect = false;

if (is_dir($imageFolder)) {
    $imageCount = count(array_diff(scandir($imageFolder), ['.', '..']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $pin1 = isset($_POST["pin1"]) ? $_POST["pin1"] : "";
    $pin2 = isset($_POST["pin2"]) ? $_POST["pin2"] : "";
    $pin3 = isset($_POST["pin3"]) ? $_POST["pin3"] : "";
    $pin4 = isset($_POST["pin4"]) ? $_POST["pin4"] : "";
    $pin = $pin1 . $pin2 . $pin3 . $pin4;

    $startDate = new DateTime('2022-06-23');
    $today = new DateTime();

    $interval = date_diff($startDate, $today);
    $daysSince = $interval->format('%a');

    $correctPin = str_pad($daysSince, 4, '0', STR_PAD_LEFT);

    if ($pin == $correctPin) {
        $unlocked = true;
        $incorrect = false;
    } else {
        $incorrect = true;
    }
} else {
    $unlocked = false;
}

// Header
echo '<!DOCTYPE html>';
echo '<html lang="en" data-bs-theme="dark">';
echo '<head>';
echo '<title>Tabea und Gabriel</title>';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">';
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo '</head>';
echo '<body>';

if ($unlocked) {
    // Quote and images container
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

    $x = 1;
    $y = 0;
    for ($i = 0; $i < count($quotesAuthors) + $imageCount; $i++) {
        if ($i % 3 == 0 || $i % 3 == 2) {
            // Display image for 1st, 3rd, 4th, 6th, 7th, 9th iteration
            echo '<img src="img/image' . $x . '-min.jpg" class="img-fluid" alt="..." loading="lazy">';
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

    // Button container
    $buttonClasses = ['snow', 'lock', 'envelope', 'star', 'heart'];

    echo '<div class="button-container">';
    foreach ($buttonClasses as $class) {
        echo '<button class="' . $class . '-btn" id="' . $class . 'Button">';
        echo '<i class="bi bi-' . $class . '"></i>';
        echo '</button>';
    }
    echo '</div>';

    // Envelope container
    $data = [
        ["name" => "Gabriel", "message" => "Ich bin unfassbar dankbar bisch du i mis läbe cho🥰 Du bisch di beschti Person uf dere Welt und bisch mis allerwichtigschte. Ich chan es läbe ohni dich ned vorstelle ❤️‍🔥", "color1" => "#0000ff", "color2" => "#ff9500", "color3" => "#00ffff"],
        ["name" => "Mami", "message" => "", "color1" => "#00000", "color2" => "#00000", "color3" => "#00000"],
        ["name" => "Papi", "message" => "Liebe Tabea<br>Ich wünsche Dir von ganzem Herzen ❤️ wunderbare Weihnachten🎄🎄Merry Christmas!🫂", "color1" => "#fdc500", "color2" => "#ffd500", "color3" => "#ffee32"],
        ["name" => "Diego", "message" => "Hey Schwöschterherz<br>Ich wünsche dir ganz schöni Wiehnachte und han dich ganz fest gern!❤️ bin immer für dich da!😘", "color1" => "#96c8eb", "color2" => "#96e8eb", "color3" => "#96a8eb"],
        ["name" => "Roxy", "message" => "Liebi Tabea, für mi bisch du über die jahr wie zure chline schwöster worde. Ig bi so stouz uf di wie du di am witer- entwickle bisch und bi immer da faus du mi bruchsch!❤️", "color1" => "#023e8a", "color2" => "#0077b6", "color3" => "#0096c7"],
        ["name" => "Hanna", "message" => "Tabea du bish e wundervolli jungi Frau. Mer hend scho mega schöni Sache erlebt. Danke defür. Hab dich mega lieb und freue mich uf witeri Erlebnis ❤️", "color1" => "#4361ee", "color2" => "#3a0ca3", "color3" => "#4cc9f0"],
        ["name" => "Alina", "message" => "Du bisch mir as Herz gwachse, ich schätze eusi SFrünschaft und wünsche Dir viel liebi im neue Jahr ❤️", "color1" => "#38419D", "color2" => "#3887BE", "color3" => "#52D3D8"],
        ["name" => "Jeremy", "message" => "Ich kenn dich jetzt au scho es zitli, bisch en sehr tolle Mensch, blieb so wied bisch 🙂", "color1" => "#236969", "color2" => "#43A680", "color3" => "#74F6A7"],
        ["name" => "Sophia", "message" => "Du bisch min Sunneschii, 20 Jahr han ich dich a minere Sitte kah und hoffe uf witeri 100 Jahr mit dir! I love You!", "color1" => "#ad2bcc", "color2" => "#ba55d3", "color3" => "#c9a0dc"],
        ["name" => "Shereen", "message" => "I bin so froh, dass ich dich han dörfe kennelerne, bisch so eh tolli und liebi Person. Bisch mir mega wichtig ❤️", "color1" => "#9d0208", "color2" => "#d00000", "color3" => "#dc2f02"],
        ["name" => "Larissa", "message" => "La mas linda del mundo! Te quiero tanto prima ❤️", "color1" => "#ddbea9", "color2" => "#ffe8d6", "color3" => "#b7b7a4"],
        ["name" => "Romano", "message" => "Ig cha gar nii so richtig fasse, das du mir üs glich scho es zitli kenne. Ig schetze üsi Frünsdschaft sehr und bi mega dankbar für aues", "color1" => "#0080ff", "color2" => "#00bfff", "color3" => "#00ffff"],
    ];

    echo '<div class="d-none" id="envelopeContainer">';
    foreach ($data as $entry) {
        echo '<div class="frame">';
        echo '<div class="wrapper" style="background-color: ' . $entry['color3'] . ';" onclick="toggleEnvelope(event)">';
        echo '<div class="lid one" style="border-top: 100px solid ' . $entry['color2'] . ';" ></div>';
        echo '<div class="lid two" style="border-top: 100px solid ' . $entry['color3'] . ';" ></div>';
        echo '<div class="envelope" style="border-right: 150px solid ' . $entry['color1'] . '; border-bottom: 100px solid' . $entry['color1'] . '; border-left: 150px solid' . $entry['color1'] . '; " ></div>';
        echo '<div class="letter d-flex flex-column justify-content-between p-1">';
        echo '<p class="message mb-0">' . $entry['message'] . '</p>';
        echo '<p class="fst-italic name">- ' . $entry['name'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';

    // Star container
    echo '<div class="overlay d-none" id="starContainer">';
    echo '<div class="overlay-content">';
    echo '<h2>Daily Quote</h2>';
    include('includes/daily_quote.php');
    echo '</div>';
    echo '</div>';

    // Lock container
    /*
    echo '<div class="overlay d-none" id="lockContainer">';
    echo '<div class="overlay-content">';
    echo '<h2>My Wishlist</h2>';
    echo '<form action="includes/wishlist.php" method="post">';
    echo '<div class="input-group mb-3">';
    echo '<input type="text" class="form-control" placeholder="Add an item to the wishlist" name="item" required>';
    echo '<div class="input-group-append">';
    echo '<button class="btn btn-success" type="submit" name="add">Add</button>';
    echo '</div>';
    include('includes/wishlist.php');
    echo '</div>';
    echo '</form>';
    echo '<p>Here is the next feature coming</p>';
    echo '</div>';
    echo '</div>';*/

    echo '<div class="overlay d-none" id="lockContainer">';
    echo '<div class="overlay-content">';
    echo '<div class="d-flex flex-column d-none" id="messageContainer">';
    echo '<h2 class="form-label">Your Dare</h2>';
    echo '<h3 id="randomMessage" class="m-4 text-success">Press the button to get a random dare!</h3>';
    echo '<p id="timer"></p>';
    echo '<button id="startPauseButton" class="btn btn-success mb-2 d-none" onclick="startPauseTimer()">Start Timer</button>';
    echo '<button class="btn btn-primary mb-2" onclick="getNewMessage()">Get New Message</button>';
    echo '<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">';
    echo '<input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">';
    echo '<label class="btn btn-outline-primary" for="btncheck1">Feather</label>';
    echo '<input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">';
    echo '<label class="btn btn-outline-primary" for="btncheck2">Vibrator</label>';
    echo '<input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">';
    echo '<label class="btn btn-outline-primary" for="btncheck3">Handcuffs</label>';
    echo '</div>';
    echo '</div>';
    echo '<div class="password-container">';
    echo '<label class="form-label" for="password">Enter Password:</label>';
    echo '<input class="form-control mb-2" type="password" id="password" />';
    echo '<button class="btn btn-primary" onclick="validatePassword()">Submit</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Footer
    echo '<footer>';
    echo '<p class="text-center my-2">Made with ❤️ for my Soulmate</p>';
    echo '</footer>';

    // JavaScript
    echo '<script src="js/fallanimation.js"></script>';
    echo '<script src="js/envelope.js"></script>';
    echo '<script src="js/show-hide.js"></script>';
    echo '<script src="js/lock.js"></script>';
} else {
    // Login container
    echo '<div class="container d-flex flex-column align-items-center justify-content-center text-center vh-100">';
    echo '<form id="pin_input" action="/index.php" method="post">';
    echo '<div class="container d-flex flex-column">';
    echo '<h1>Please enter pin code</h1>';
    echo '<div class="my-2">';
    echo '<input id="pin1" name="pin1" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '<input id="pin2" name="pin2" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '<input id="pin3" name="pin3" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '<input id="pin4" name="pin4" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '</div>';
    echo '<button type="submit" name="submit" class="btn btn-primary">Submit</button>';
    echo '</div>';
    echo '</form>';

    if ($incorrect) {
        echo '<p class="text-danger">Pin is wrong!</p>';
    }

    echo '</div>';

    // JavaScript
    echo '<script src="js/pin.js"></script>';
}

echo '</body>';
echo '</html>';
