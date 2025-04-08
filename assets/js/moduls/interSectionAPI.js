export const createIntersectionObserverServices = (mql) => {
    const targetServicePosLeft = document.getElementById('TriggerObserv__left');
    const targetServicePosRight = document.getElementById('TriggerObserv__right');

    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                if (target.hasAttribute('PosLeft')) {
                    target.animate([
                        { left: '-100vw', opacity: 0 },
                        { left: 0, opacity: 1 }
                    ], {
                        duration: 2500,
                        easing: 'ease-in-out',
                        fill: 'forwards'
                    });
                }
                if (target.hasAttribute('PosRight')) {
                    target.animate([
                        { right: '-100vw', opacity: 0 },
                        { right: 0, opacity: 1 }
                    ], {
                        duration: 3000,
                        easing: 'ease-in-out',
                        fill: 'forwards'
                    });
                }
                observer.unobserve(entry.target);
            }
        });
    };

    const observerOptions = {
        root: null,
        rootMargin: '100%',
        threshold: 0.5
    };

    if (mql.matches) {
        const observer = new IntersectionObserver(observerCallback, observerOptions);

        if (targetServicePosLeft) observer.observe(targetServicePosLeft);
        if (targetServicePosRight) observer.observe(targetServicePosRight);
    }
};