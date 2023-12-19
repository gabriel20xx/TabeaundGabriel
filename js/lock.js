function validatePassword() {
    // Replace 'your_password' with the actual password
    var password = document.getElementById("password").value;
    var correctPassword = "your_password"; // Replace with your actual password

    if (password === correctPassword) {
        // If the password is correct, show the message container
        document.getElementById("messageContainer").classList.remove('d-none');
        // Hide the password container
        document.querySelector(".password-container").style.display = "none";
    } else {
        alert("Invalid password. Please try again.");
    }
}

function getRandomMessage() {
    // Array of random messages
    var messages = [
        "Hello, world!",
        "Coding is fun!",
        "Keep calm and code on.",
        "Random message generator activated!",
        "May the code be with you.",
        "Programming is an art."
    ];

    // Get a random index
    var randomIndex = Math.floor(Math.random() * messages.length);

    // Display the random message
    document.getElementById("randomMessage").innerText = messages[randomIndex];
}