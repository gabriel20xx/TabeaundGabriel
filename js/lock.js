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

function getRandomMessage() {
    // Array of random messages
    var messages = [
        "Kiss each other passionately.",
        "Touch each other on the body.",
        "Masturbate each others genital slowly.",
        "Make love to each other.",
        "Tickle each other with a feather.",
        "Suck each others genitals.",
    ];

    // Get a random index
    var randomIndex = Math.floor(Math.random() * messages.length);

    // Display the random message
    document.getElementById("randomMessage").innerText = messages[randomIndex];
}