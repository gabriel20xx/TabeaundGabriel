counter = 1;
current = 1;
function toggleEnvelope(event) {
    const wrapper = event.currentTarget;
    const frames = document.querySelectorAll('.frame');
    var frameContainer = document.getElementsByClassName("wrapper");
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

            if (current === frames.length) {
                current = 0;
            }

            wrapper.style.display = 'block';
        }, 2500);
        current++;
        frameContainer[current].classList.add("appear");
    } else {
        wrapper.classList.add('active');
        wrapper.classList.remove('appear');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Get the envelope button and the envelope containers
    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainers = document.getElementsByClassName("carousel");
    var frameContainer = document.getElementsByClassName("wrapper");

    // Add click event listener to the envelope button
    envelopeButton.addEventListener("click", function () {
        frameContainer[current].classList.toggle("appear");
        envelopeContainers.classList.toggle("d-none");
    });
});