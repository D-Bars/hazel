export class ObserveSections {
    constructor(sectionArray) {
        this.sections = sectionArray;

        this.menuContainer = document.querySelector('.header__menu__box');
        this.menuItems = this.menuContainer.querySelectorAll('li');
        this.sizeVaries = null;
        this.setActiveBlocker = false;

        this.addListenerByClick();
        this.addResizeListener();
        this.onScroll();
    }

    getCurrentSection(sections, scrollY) {
        const section = sections.find(section => scrollY >= section.top && scrollY < section.bottom);
        if (section) {
            return section.id;
        } else {
            return null;
        }
    }

    getSectionsPosition() {
        return this.sections.map(section => {
            const rect = section.getBoundingClientRect();
            const top = rect.top + window.scrollY - 400;
            const bottom = top + rect.height;
            return { id: section.getAttribute('id'), top, bottom };
        });
    }

    addListenerByClick() {
        this.menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                this.setActiveBlocker = true;
                const sectionId = e.target.getAttribute('href').slice(1);
                this.setActive(sectionId);
                setTimeout(() => {
                    this.setActiveBlocker = false;
                    this.handlingSectionActivate();
                }, 1000);
            })
        })
    }

    setActive(sectionId) {
        this.removeActive();
        const activeMenuItem = this.menuContainer.querySelector(`a[href="#${sectionId}"]`)?.closest('li');
        activeMenuItem.classList.add('active__menu__item');
    }

    removeActive() {
        this.menuItems.forEach(item => {
            item.classList.remove('active__menu__item');
        });
    }

    handlingSectionActivate() {
        if (this.setActiveBlocker) return;
        const sectionsPos = this.getSectionsPosition();
        const currentTopPos = window.scrollY;
        const currentSection = this.getCurrentSection(sectionsPos, currentTopPos);
        if (currentSection) {
            this.setActive(currentSection)
        }
    }

    addResizeListener() {
        window.addEventListener("resize", () => {
            this.onResize();
        });
    }

    onResize() {
        clearTimeout(this.sizeVaries);
        this.sizeVaries = setTimeout(() => {
            this.handlingSectionActivate();
        }, 500);
    }

    onScroll() {
        window.addEventListener('scroll', () => {
            this.handlingSectionActivate();
        })
    }
}