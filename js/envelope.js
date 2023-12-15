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