current = 1;
function toggleEnvelope(event) {
    const wrapper = event.currentTarget;
    const frames = document.querySelectorAll('.frame');

    if (wrapper.classList.contains('active')) {
        wrapper.classList.remove('active');
        wrapper.classList.add('disappear');
        setTimeout(() => {
            wrapper.classList.remove('disappear');

            if (current === frames.length) {
                current = 0;
            }

            current++;
            
        }, 2500);
    } else {
        wrapper.classList.add('active');
    }
}