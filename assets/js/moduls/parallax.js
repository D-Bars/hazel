function parallax() {
    window.addEventListener('scroll', function () {
        const parallaxElement = document.getElementById('wrapper__parallax');

        const elementPositionTop = parallaxElement.getBoundingClientRect().top + window.scrollY;

        const scrollPosition = window.scrollY;
        const windowHeight = window.innerHeight;

        const parallaxStrength = 0.020;

        if (scrollPosition + windowHeight > elementPositionTop && scrollPosition < elementPositionTop + parallaxElement.offsetHeight) {
            const offset = 30 + (scrollPosition - elementPositionTop) * parallaxStrength;
            parallaxElement.style.setProperty('background-position', `10% ${offset}%`, 'important');
        }
    });
}

export default parallax;