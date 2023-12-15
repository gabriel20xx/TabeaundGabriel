document.addEventListener("DOMContentLoaded", function () {
    var starButton = document.getElementById("starButton");
    var quoteContainer = document.getElementById("quoteContainer");
    starButton.addEventListener("click", function () {
        toggleContainer(quoteContainer);

        hideOtherContainers([envelopeContainer, lockContainer]);
    });

    var lockButton = document.getElementById("lockButton");
    var lockContainer = document.getElementById("lockContainer");
    lockButton.addEventListener("click", function () {
        toggleContainer(lockContainer);

        hideOtherContainers([quoteContainer, envelopeContainer]);
    });

    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainer = document.getElementById("envelopeContainer");
    envelopeButton.addEventListener("click", function () {
        toggleContainer(envelopeContainer);
        
        hideOtherContainers([quoteContainer, lockContainer]);
    });

    function toggleContainer(container) {
        container.classList.toggle("d-none");
    }

    function hideOtherContainers(containers) {
        containers.forEach(function (container) {
            container.classList.add("d-none");
        });
    }
});