function validatePassword() {
    // Replace 'your_password' with the actual password
    var password = document.getElementById("password").value;
    var correctPassword = "KinkyGame"; // Replace with your actual password

    if (password === correctPassword) {
        // If the password is correct, show the message container
        document.getElementById("messageContainer").style.display = "block";
        document.getElementById("messageContainer").classList.remove("d-none");
        // Hide the password container
        document.querySelector(".password-container").style.display = "none";
    } else {
        alert("Invalid password. Please try again.");
    }
}

var messages = [
    { text: "Kiss each other passionately.", time: 10 },
    { text: "Touch each other on the body.", time: 15 },
    { text: "Masturbate each others genitals slowly.", time: 20 },
    { text: "Make love to each other.", time: 30 },
    { text: "Tickle each other with a feather.", time: 12 },
    { text: "Suck each others genitals.", time: 25 },
];

var currentMessageIndex;
    var timer;
    var timeRemaining;
    var timerRunning = false;

    function getRandomMessage() {
        // Get a random index
        currentMessageIndex = Math.floor(Math.random() * messages.length);

        // Display the random message
        document.getElementById("randomMessage").innerText = messages[currentMessageIndex].text;

        // Display initial time
        timeRemaining = messages[currentMessageIndex].time;
        updateTimerDisplay();
    }

    function startPauseTimer() {
        if (timerRunning) {
            // Pause the timer if it's already running
            clearInterval(timer);
            timer = null;
            timerRunning = false;
        } else {
            // Start the timer
            timer = setInterval(function () {
                timeRemaining--;
                updateTimerDisplay();
                if (timeRemaining <= 0) {
                    clearInterval(timer);
                    timer = null;
                    timerRunning = false;
                    // Display a new message when the timer reaches zero
                    getRandomMessage();
                }
            }, 1000);
            timerRunning = true;
        }

        // Update button text
        updateButtonText();
    }

    function updateTimerDisplay() {
        document.getElementById("timer").innerText = "Time Remaining: " + timeRemaining + " seconds";
    }

    function updateButtonText() {
        var button = document.getElementById("startPauseButton");
        button.classList.remove("d-none");
        button.innerText = timerRunning ? "Pause Timer" : "Start Timer";
        button.classList.remove("btn-success", "btn-danger");
        button.classList.add(timerRunning ? "btn-danger" : "btn-success");
    }

    function getNewMessage() {
        // Reset the timer and get a new message
        clearInterval(timer);
        timer = null;
        timerRunning = false;
        getRandomMessage();
        updateTimerDisplay();
        updateButtonText();
    }