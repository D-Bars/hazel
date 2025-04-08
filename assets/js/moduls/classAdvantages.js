export class Advantages {
    constructor(obj) {
        this.circle = obj;
        this.advantageTitle = this.circle.find('[title]');
        this.advantageDescription = this.circle.find('[description]');
        this.advantagesItemsBox = this.circle.find('.advantages__items__box');
        this.advantagesCollection = this.advantagesItemsBox.find('.advantages__item');

        this.positionItems();
        window.addEventListener('resize', () => { this.positionItems() });
        this.addHoverIco();
        this.setContent();
        this.advantageInterval = setInterval(() => this.switchActive(), 5000);
        this.intervalAfterHover();
        this.addHoverCircle();
    }

    positionItems() {
        const radius = this.circle.width() / 2;

        this.advantagesCollection.each((index, item) => {
            let angle = (index / this.advantagesCollection.length) * (2 * Math.PI);
            let x = Math.cos(angle) * radius;
            let y = Math.sin(angle) * radius;

            jQuery(item).css({
                left: `calc(50% + ${x}px - ${jQuery(item).outerWidth() / 2}px)`,
                top: `calc(50% + ${y}px - ${jQuery(item).outerHeight() / 2}px)`
            });
        });
    }

    addActive(obj) {
        obj.addClass('adv__active');
    }

    removeActive(obj) {
        obj.removeClass('adv__active');
    }

    addHoverIco() {
        this.advantagesCollection.on('mouseover', (event) => {
            this.removeActive(this.advantagesCollection);
            this.addActive(jQuery(event.currentTarget));
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
        return this.advantagesCollection.filter('.adv__active');
    }

    switchActive() {
        const activeClass = this.searchActive();
        this.removeActive(activeClass);
        const nextItem = activeClass.next('.advantages__item').length ? activeClass.next('.advantages__item') : this.advantagesCollection.first();
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