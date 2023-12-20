document.addEventListener("DOMContentLoaded", function () {
    var starButton = document.getElementById("starButton");
    var starContainer = document.getElementById("starContainer");
    var lockButton = document.getElementById("lockButton");
    var lockContainer = document.getElementById("lockContainer");
    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainer = document.getElementById("envelopeContainer");

    var heartButton = document.getElementById("heartButton");
    var snowButton = document.getElementById("snowButton");

    var heartEnabled, snowEnabled, envelopeEnabled, lockEnabled, starEnabled;

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

    heartButton.addEventListener("click", function () {
        toggleButton("heartButton", "darkred", "red", heartEnabled);
    });

    snowButton.addEventListener("click", function () {
        toggleButton("snowButton", "darkblue", "blue", snowEnabled);
    });

    function toggleContainer(container) {
        container.classList.toggle("d-none");
        resetButtonColors();
        // if container is visible change the button for its container from blue to red and all other buttons to their initial colors
    }

    function hideOtherContainers(containers) {
        containers.forEach(function (container) {
            if (!container.classList.contains("d-none")) {
                container.classList.add("d-none");
            }
        });
        resetButtonColors();
    }

    function resetButtonColors() {
        // Reset all button colors to their initial state
        heartButton.style.backgroundColor = heartEnabled ? "darkred" : "red";
        snowButton.style.backgroundColor = snowEnabled ? "darkblue" : "blue";
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
            case "snowButton":
                snowEnabled = state;
                break;
            // Add cases for other buttons if needed
        }
    }
});
