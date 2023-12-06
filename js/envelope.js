counter = 1;
function toggleEnvelope(event) {
    const wrapper = event.currentTarget;
    const frames = document.querySelectorAll('.frame');

    const frameToShow = counter % frames.length;

    if (wrapper.classList.contains('active')) {
        wrapper.classList.remove('active');
        wrapper.classList.add('disappear');
        setTimeout(() => {
            wrapper.classList.remove('disappear');

            frames.forEach(frame => frame.classList.add('d-none'));

            frames[frameToShow].classList.remove('d-none');

            counter++;

            if (counter === frames.length) {
                counter = 0;
            }

            wrapper.style.display = 'block';
        }, 2500);
    } else {
        wrapper.classList.add('active');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Get the envelope button and the envelope containers
    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainers = document.getElementsByClassName("carousel");

    // Add click event listener to the envelope button
    envelopeButton.addEventListener("click", function () {
        // Loop through each envelope container and toggle the 'd-none' class
        for (var i = 0; i < envelopeContainers.length; i++) {
            envelopeContainers[i].classList.toggle("d-none");
        }
    });
});