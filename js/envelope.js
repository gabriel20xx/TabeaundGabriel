let current = 1;

function toggleEnvelope(event) {
    const wrapper = event.currentTarget;
    const frames = document.querySelectorAll('.frame');

    if (wrapper.classList.contains('active')) {
        wrapper.classList.remove('active');
        wrapper.classList.add('disappear');

        setTimeout(() => {
            wrapper.classList.remove('disappear');
            wrapper.style.zIndex -=  1;

            if (current === frames.length) {
                current = 1;
            }

            current++;
        }, 2500);
    } else {
        wrapper.classList.add('active');
    }
}
