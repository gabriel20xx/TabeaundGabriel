<?php

$pin = '2306';

if(isset($_POST['pwd']) && $_POST['pwd'] == $pin) {
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
    
    <body>
    
        <img src="img/image1-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5 mx-2">
            <blockquote class="blockquote">
                <p>I saw that you were perfect, and so I loved you. Then I saw that you were not perfect and I loved you
                    even more.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Angelita Lim
            </figcaption>
        </figure>
    
        <img src="img/image2-min.jpg" class="img-fluid" alt="..." loading="lazy">
        <img src="img/image3-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5">
            <blockquote class="blockquote">
                <p>You know you’re in love when you can’t fall asleep because reality is finally better than your dreams.
                </p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Dr. Seuss
            </figcaption>
        </figure>
    
        <img src="img/image4-min.jpg" class="img-fluid" alt="..." loading="lazy">
        <img src="img/image5-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5">
            <blockquote class="blockquote">
                <p>Love is that condition in which the happiness of another person is essential to your own.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Robert A. Heinlein
            </figcaption>
        </figure>
    
        <img src="img/image6-min.jpg" class="img-fluid" alt="..." loading="lazy">
        <img src="img/image7-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5">
            <blockquote class="blockquote">
                <p>The best thing to hold onto in life is each other.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Audrey Hepburn
            </figcaption>
        </figure>
    
        <img src="img/image8-min.jpg" class="img-fluid" alt="..." loading="lazy">
        <img src="img/image9-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5">
            <blockquote class="blockquote">
                <p>I need you like a heart needs a beat.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Unknown
            </figcaption>
        </figure>
    
        <img src="img/image10-min.jpg" class="img-fluid" alt="..." loading="lazy">
        <img src="img/image11-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5">
            <blockquote class="blockquote">
                <p>I am who I am because of you. You are every reason, every hope, and every dream I’ve ever had.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                The Notebook
            </figcaption>
        </figure>
    
        <img src="img/image12-min.jpg" class="img-fluid" alt="..." loading="lazy">
        <img src="img/image13-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5">
            <blockquote class="blockquote">
                <p>If I had a flower for every time I thought of you... I could walk through my garden forever.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Alfred Tennyson
            </figcaption>
        </figure>
    
        <img src="img/image14-min.jpg" class="img-fluid" alt="..." loading="lazy">
        <img src="img/image15-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <figure class="text-center my-5">
            <blockquote class="blockquote">
                <p>Take my hand, take my whole life too. For I can’t help falling in love with you.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Elvis Presley
            </figcaption>
        </figure>
    
        <img src="img/image16-min.jpg" class="img-fluid" alt="..." loading="lazy">
    
        <div class="button-container">
            <button class="star-btn" id="starButton">
                <i class="bi bi-star-fill"></i>
            </button>
            <button class="lock-btn" id="lockButton">
                <i class="bi bi-lock-fill"></i>
            </button>
            <button class="envelope-btn" id="envelopeButton">
                <i class="bi bi-envelope-fill"></i>
            </button>
            <button class="snow-btn" id="snowButton">
                <i class="bi bi-snow"></i>
            </button>
            <button class="heart-btn" id="heartButton">
                <i class="bi bi-heart-fill"></i>
            </button>
        </div>
    
        <div class="carousel d-none">
            <div class="frame">
                <div class="wrapper" onclick="toggleEnvelope(event)">
                    <div class="lid one"></div>
                    <div class="lid two"></div>
                    <div class="envelope"></div>
                    <div class="letter">
                        <p>You are the best person on earth. I love you with every heartbeat. I wish you the best. Make your
                            wishes come true.</p>
                        <p class="fst-italic">- Gabriel</p>
                    </div>
                </div>
            </div>
    
            <div class="frame d-none">
                <div class="wrapper" onclick="toggleEnvelope(event)">
                    <div class="lid one"></div>
                    <div class="lid two"></div>
                    <div class="envelope"></div>
                    <div class="letter">
                        <p>Urs Message</p>
                        <p class="fst-italic">- Urs</p>
                    </div>
                </div>
            </div>
    
            <div class="frame d-none">
                <div class="wrapper" onclick="toggleEnvelope(event)">
                    <div class="lid one"></div>
                    <div class="lid two"></div>
                    <div class="envelope"></div>
                    <div class="letter">
                        <p>Diegos Message</p>
                        <p class="fst-italic">- Diego</p>
                    </div>
                </div>
            </div>
        </div>
    
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
    if(isset($_POST['pwd']) && $_POST['pwd'] != $pin) {
        echo '
        <p>Pin is wrong!</p>
        ';
    }
}

?>