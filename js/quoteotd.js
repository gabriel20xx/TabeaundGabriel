document.addEventListener("DOMContentLoaded", function () {
    // Get the envelope button and the envelope containers
    var envelopeButton = document.getElementById("starButton");
    var envelopeContainer = document.getElementById("quoteContainer");

    // Add click event listener to the envelope button
    envelopeButton.addEventListener("click", function () {
        envelopeContainer.classList.toggle("d-none");
    });
});