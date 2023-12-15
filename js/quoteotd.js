document.addEventListener("DOMContentLoaded", function () {
    // Get the envelope button and the envelope containers
    var envelopeButton = document.getElementById("starButton");
    var envelopeContainer = document.getElementById("quoteContainer");

    // Add click event listener to the envelope button
    envelopeButton.addEventListener("click", function () {
        envelopeContainer.classList.toggle("d-none");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Get the envelope button and the envelope containers
    var lockButton = document.getElementById("lockButton");
    var lockContainer = document.getElementById("lockContainer");

    // Add click event listener to the envelope button
    lockButton.addEventListener("click", function () {
        lockContainer.classList.toggle("d-none");
    });
});