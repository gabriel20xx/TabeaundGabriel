document.addEventListener("DOMContentLoaded", function () {
    var starButton = document.getElementById("starButton");
    var starContainer = document.getElementById("starContainer");
    var lockButton = document.getElementById("lockButton");
    var lockContainer = document.getElementById("lockContainer");
    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainer = document.getElementById("envelopeContainer");

    starButton.addEventListener("click", function () {
        toggleContainer(starContainer);
        hideOtherContainers([lockContainer, envelopeContainer]);
    });

    lockButton.addEventListener("click", function () {
        toggleContainer(lockContainer);
        hideOtherContainers([starContainer, envelopeContainer]);
    });

    envelopeButton.addEventListener("click", function () {
        toggleContainer(envelopeContainer);
        hideOtherContainers([starContainer, lockContainer]);
    });

    function toggleContainer(container) {
        container.classList.toggle("d-none");
    }

    function hideOtherContainers(containers) {
        containers.forEach(function (container) {
            if (!container.classList.contains("d-none")) {
                container.classList.add("d-none");
            }
        });
    }
});
