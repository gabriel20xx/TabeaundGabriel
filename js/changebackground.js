document.addEventListener("DOMContentLoaded", function () {
    // Your JavaScript code goes here

    function toggleButton(buttonId, enabledColor, disabledColor, enabledState) {
        let button = document.getElementById(buttonId);
        let state = false;

        button.addEventListener("click", function (event) {
            if (event.target.closest("#" + buttonId)) {
                state = !state;

                if (state) {
                    this.style.backgroundColor = enabledColor;
                } else {
                    this.style.backgroundColor = disabledColor;
                }

                enabledState = state; // Update the corresponding global variable
            }
        });
    }

    let heartEnabled, snowEnabled, envelopeEnabled, lockEnabled, starEnabled;

    toggleButton("heartButton", "darkred", "red", heartEnabled);
    toggleButton("snowButton", "darkblue", "blue", snowEnabled);
    toggleButton("envelopeButton", "black", "gray", envelopeEnabled);
    toggleButton("lockButton", "darkmagenta", "magenta", lockEnabled);
    toggleButton("starButton", "darkorange", "orange", starEnabled);
});