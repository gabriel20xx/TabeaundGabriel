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

        input.addEventListener('keydown', function(event) {
            if (event.key === 'Return' || event.key === 'Enter') {
                var inputValue = input.value.trim();
                if (!inputValue) {
                    var prevInput = array[index - 1];
                    if (prevInput) {
                        prevInput.focus();
                    }
                }
            }
        });
    });
});
