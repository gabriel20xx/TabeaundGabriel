current = 1;
function toggleEnvelope(event) {
    const wrapper = event.currentTarget;
    const frames = document.querySelectorAll('.frame');
    var frameContainer = document.getElementsByClassName("wrapper");

    if (wrapper.classList.contains('active')) {
        wrapper.classList.remove('active');
        wrapper.classList.add('disappear');
        setTimeout(() => {
            wrapper.classList.remove('disappear');

            if (current === frames.length) {
                current = 0;
            }

            wrapper.style.display = 'block';
            wrapper.classList.add('d-none');
            current++;
            frameContainer[current].classList.add("appear");
            frameContainer[current].classList.remove("d-none");
        }, 2500);
    } else {
        wrapper.classList.add('active');
        wrapper.classList.remove('appear');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Get the envelope button and the envelope containers
    var envelopeButton = document.getElementById("envelopeButton");
    var envelopeContainer = document.getElementById("envelopeContainer");
    var frameContainer = document.getElementsByClassName("wrapper");

    // Add click event listener to the envelope button
    envelopeButton.addEventListener("click", function () {
        envelopeContainer.classList.toggle("d-none");
        frameContainer[current].classList.toggle("appear");
        frameContainer[current].classList.toggle("d-none");
    });
});