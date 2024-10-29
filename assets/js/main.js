const targetServicePosLeft = document.getElementById('TriggerObserv__left');
const targetServicePosRight = document.getElementById('TriggerObserv__right');

const observerCallback = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = entry.target;
            if(target.hasAttribute('PosLeft')){
                target.animate([
                    { left: '-100vw', opacity: 0 }, 
                    { left: 0, opacity: 1  }
                ], {
                    duration: 2500,
                    easing: 'ease-in-out',
                    fill: 'forwards' 
                }); 
            }
            if(target.hasAttribute('PosRight')){
                target.animate([
                    { left: '100vw', opacity: 0 }, 
                    { left: 0, opacity: 1  }
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
    rootMargin: '110%',
    threshold: 0.5 
};

const observer = new IntersectionObserver(observerCallback, observerOptions);

observer.observe(targetServicePosLeft);
observer.observe(targetServicePosRight);

jQuery(document).ready(function ($) {

    //header line
    var lastScroll = 0;
    const headerLine = $('#header__line');
    const mql = window.matchMedia("(min-width: 768px)");

    const toggleScrollHandler = (mql) => {
        if (mql.matches) {
            window.addEventListener('scroll', handleScroll);
        } else {
            window.removeEventListener('scroll', handleScroll);
        }
    };


    const handleScroll = () => {
        let scrollTop = window.scrollY;
        if (scrollTop > lastScroll) {
            headerLine.css('transform', 'translateY(0)');
        } else {
            headerLine.css('transform', 'translateY(-100px)');
        }
    };

    toggleScrollHandler(mql);

    mql.addListener(toggleScrollHandler);

    //advantages
    class Advantages {
        constructor(obj) {
            this.circle = obj;
            this.advantageTitle = this.circle.find('[title]');
            this.advantageDescription = this.circle.find('[description]');
            this.advatagesCollection = this.circle.find('.advantages__item');
            this.addHoverIco();
            this.setContent();
            this.advantageInterval = setInterval(() => this.switchActive(), 5000);
            this.intervalAfterHover();
            this.addHoverCircle();
        }

        addActive(obj) {
            obj.addClass('adv__active');
        }

        removeActive(obj) {
            obj.removeClass('adv__active');
        }

        addHoverIco() {
            this.advatagesCollection.on('mouseover', (event) => {
                this.removeActive(this.advatagesCollection);
                this.addActive($(event.currentTarget));
                this.setContent();
                clearInterval(this.advantageInterval);
            });
        }

        addHoverCircle() {
            this.circle.on('mouseover', () => {
                clearInterval(this.advantageInterval);
            });
        }

        intervalAfterHover() {
            this.circle.on('mouseleave', () => {
                clearInterval(this.advantageInterval);
                this.advantageInterval = setInterval(() => this.switchActive(), 5000);
            });
        }

        searchActive() {
            return this.advatagesCollection.filter('.adv__active');
        }

        switchActive() {
            const activeClass = this.searchActive();
            this.removeActive(activeClass);
            const nextItem = activeClass.next('.advantages__item').length ? activeClass.next('.advantages__item') : this.advatagesCollection.first();
            this.addActive(nextItem);
            this.setContent();
        }

        getContent() {
            this.title = this.searchActive().data('title');
            this.description = this.searchActive().data('description');
        }

        setContent() {
            this.getContent();
            this.advantageTitle.html(this.title);
            this.advantageDescription.html(this.description);
        }
    }
    const advantages = new Advantages($('.advantages__circle'));

    //why us parallax
    window.addEventListener('scroll', function () {
        const parallaxElement = document.getElementById('wrapper__parallax');

        const elementPositionTop = parallaxElement.getBoundingClientRect().top + window.scrollY;

        const scrollPosition = window.scrollY;
        const windowHeight = window.innerHeight;

        const parallaxStrength = 0.009;

        if (scrollPosition + windowHeight > elementPositionTop && scrollPosition < elementPositionTop + parallaxElement.offsetHeight) {
            const offset = 20 + (scrollPosition - elementPositionTop) * parallaxStrength;
            parallaxElement.style.setProperty('background-position', `10% ${offset}%`, 'important');
        }
    });

    
});

