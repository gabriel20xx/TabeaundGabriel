document.addEventListener("DOMContentLoaded", function () {
    var starButton = document.getElementById("starButton");
    var starContainer = document.getElementById("starContainer");
    var lockButton = document.getElementById("lockButton");
    var lockContainer = document.getElementById("lockContainer");
    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainer = document.getElementById("envelopeContainer");
    
    var imagesButton = document.getElementById("imagesButton");

    var heartButton = document.getElementById("heartButton");

    var heartEnabled, envelopeEnabled, lockEnabled, starEnabled;

    starButton.addEventListener("click", function () {
        toggleContainer(starContainer);
        hideOtherContainers([lockContainer, envelopeContainer]);
        if (starEnabled) {
            toggleButton("starButton", "darkorange", "orange", starEnabled);
        }
    });

    lockButton.addEventListener("click", function () {
        toggleContainer(lockContainer);
        hideOtherContainers([starContainer, envelopeContainer]);
        if (lockEnabled) {
            toggleButton("lockButton", "darkmagenta", "magenta", lockEnabled);
        }
    });

    envelopeButton.addEventListener("click", function () {
        toggleContainer(envelopeContainer);
        hideOtherContainers([starContainer, lockContainer]);
        if (envelopeEnabled) {
            toggleButton("envelopeButton", "black", "gray", envelopeEnabled);
        }
    });

    imagesButton.addEventListener("click", function () {
        window.location.href = '../index.php?page=gallery';
    });

    heartButton.addEventListener("click", function () {
        toggleButton("heartButton", "darkred", "red", heartEnabled);
    });

    function toggleContainer(container) {
        container.classList.toggle("d-none");
        resetButtonColors();
    }

    function hideOtherContainers(containers) {
        resetButtonColors();
        containers.forEach(function (container) {
            if (!container.classList.contains("d-none")) {
                container.classList.add("d-none");
            }
        });
    }

    function resetButtonColors() {
        // Reset all button colors to their initial state
        heartButton.style.backgroundColor = heartEnabled ? "darkred" : "red";
        envelopeButton.style.backgroundColor = envelopeEnabled ? "black" : "gray";
        lockButton.style.backgroundColor = lockEnabled ? "darkmagenta" : "magenta";
        starButton.style.backgroundColor = starEnabled ? "darkorange" : "orange";
    }

    function toggleButton(buttonId, enabledColor, disabledColor, enabledState) {
        let button = document.getElementById(buttonId);
        let state = enabledState;

        state = !state;

        if (state) {
            button.style.backgroundColor = enabledColor;
        } else {
            button.style.backgroundColor = disabledColor;
        }

        // Update the corresponding global variable
        switch (buttonId) {
            case "heartButton":
                heartEnabled = state;
                break;
            // Add cases for other buttons if needed
        }
    }
});
