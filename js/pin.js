document.addEventListener('DOMContentLoaded', function() {
    var pinInputs = document.querySelectorAll('.pin-input');

    pinInputs.forEach(function(input, index, array) {
        input.addEventListener('input', function() {
            var nextInput = array[index + 1];
            if (nextInput) {
                nextInput.focus();
            } else {
                input.blur();
            }
        });
    });
});