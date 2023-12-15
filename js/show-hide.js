document.addEventListener("DOMContentLoaded", function () {
    var starButton = document.getElementById("starButton");
    var quoteContainer = document.getElementById("quoteContainer");
    starButton.addEventListener("click", function () {
        quoteContainer.classList.toggle("d-none");
    });

    var lockButton = document.getElementById("lockButton");
    var lockContainer = document.getElementById("lockContainer");
    lockButton.addEventListener("click", function () {
        lockContainer.classList.toggle("d-none");
    });

    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainer = document.getElementById("envelopeContainer");
    var frameContainer = document.getElementsByClassName("wrapper");
    envelopeButton.addEventListener("click", function () {
        envelopeContainer.classList.toggle("d-none");
        frameContainer[current].classList.toggle("appear");
        frameContainer[current].classList.toggle("d-none");
    });
});
