const mql = window.matchMedia("(min-width: 800px)");

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

    observer.observe(targetServicePosLeft);
    observer.observe(targetServicePosRight);
}

jQuery(document).ready(function ($) {

    const burger = $('.burger__menu');
    const menu = $('.menu__nav');
    const menuHeight = menu.outerHeight(true);
    burger.on('click', () => {
        burger.toggleClass('activeCloser');
        if (burger.hasClass('activeCloser')) {
            menu.css('display', 'flex').animate({ 'height': menuHeight }, 300);
        } else {
            menu.animate({ 'height': 0 }, 300, function () {
                menu.css('display', 'none');
            });
        }
    })

    //header line
    var lastScroll = 0;
    const headerLine = $('#header__line');

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
            headerLine.css('top', '0');
        } else {
            headerLine.css('top', '-100px');
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

                $(item).css({
                    left: `calc(50% + ${x}px - ${$(item).outerWidth() / 2}px)`,
                    top: `calc(50% + ${y}px - ${$(item).outerHeight() / 2}px)`
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
    if (mql.matches) {
        const advantages = new Advantages($('.advantages__circle'));
    }

    //why us parallax
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

    //portfolio
    let animateCategoryBlock = false;
    class Filter {
        constructor(obj) {
            if (!animateCategoryBlock) {
                this.categoryObj = obj;

                this.categoryLine = this.categoryObj.closest('.category__line');

                this.productBox = $('.category__content__box');
                this.productCollection = this.productBox.find('.category__product');
                this.countProductsInCategory = 0;

                this.setActive();

                if (this.categoryObj.is('[category-all]')) {
                    this.countProductsInCategory = this.productCollection.length;
                    this.showAllProducts();
                } else {
                    this.categoryName = this.categoryObj.attr('data-category');
                    this.categoryParent = this.categoryObj.is('[data-children]');
                    this.categoriesChilds = this.categoryObj.data('children');
                    this.showProduct();
                }
            }
        }

        setActive() {
            this.removeActive();
            this.categoryObj.addClass('category__active');
        }

        removeActive() {
            this.categoryLine.find('.category__active').removeClass('category__active');
        }

        showAllProducts() {
            this.animateProduct(this.productCollection);
        }

        showProduct() {
            if (this.categoryParent) {
                var currentChilds = this.findChilds(this.categoriesChilds);
                this.animateProduct(currentChilds);
            } else {
                const currentProducts = this.findCurrentProducts();
                if (currentProducts.length) {
                    this.animateProduct(currentProducts);
                }
            }
        }

        findChilds(childs) {
            const currentChilds = [];
            this.productCollection.each(function () {
                const category = $(this).attr('data-category');
                if (category && childs.includes(category)) {
                    currentChilds.push($(this));
                }
            });
            this.countProductsInCategory = currentChilds.length;
            return $(currentChilds);
        }

        findCurrentProducts() {
            const currentProducts = this.productBox.find('[data-category=' + this.categoryName + ']');
            this.countProductsInCategory = currentProducts.length;
            return currentProducts;
        }

        animateProduct(products) {
            animateCategoryBlock = true;
            this.setHeightProductBox();
            this.productCollection.css('display', 'none');
            products.each(function () {
                $(this).css({
                    display: 'flex',
                    opacity: 0,
                }).animate({
                    opacity: 1
                }, 300, function () {
                    animateCategoryBlock = false;
                });
            });
        }

        setHeightProductBox() {
            const oneProductHeight = this.productCollection.first().outerHeight(true);
            let countRows = 1;
            if (mql.matches) {
                countRows = Math.ceil(Number(this.countProductsInCategory) / 4);
            } else {
                countRows = Math.ceil(Number(this.countProductsInCategory) / 2);
            }
            const newBoxHeight = countRows * oneProductHeight;
            this.productBox.animate({ 'height': newBoxHeight }, 300);
        }
    }
    $('.category__item__title').on('click', function () {
        const category = new Filter($(this));
    })

    //reviews
    class Reviews {
        constructor(customersBox) {
            this.customersBox = $(customersBox);
            this.customerFirst = this.customersBox.find('.customer__wrapper__img').first();
            this.activeCustomer = null;

            this.sampleReviewBox = $('.customers__review__box');
            this.sampleCustomerReview = this.sampleReviewBox.find('.customer__review__content');
            this.sampleCustomerFullname = this.sampleReviewBox.find('.customer__review__fullname');
            this.sampleCustomerProfession = this.sampleReviewBox.find('.customer__review__profession');
            console.log(this.lastHeight);
            this.addListeners();
            this.updateCustomerState(this.customerFirst);
        }

        setActive(activeItem) {
            activeItem.addClass('customer__active');
            this.activeCustomer = activeItem;
        }

        removeActive() {
            this.customersBox.find('.customer__active').removeClass('customer__active');
        }

        getDataCustomer(customer) {
            return {
                review: customer.attr('data-review') || '',
                fullname: customer.attr('data-fullname') || '',
                profession: customer.attr('data-profession') || ''
            };
        }

        setDataCustomer(dataArray) {
            this.sampleCustomerReview.text(dataArray.review);
            this.sampleCustomerFullname.text(dataArray.fullname);
            this.sampleCustomerProfession.text(dataArray.profession);
        }

        animateSampleBox() {
            this.sampleReviewBox.stop(true, true);
            const currentHeight = this.sampleReviewBox.height();
            this.sampleReviewBox.css("height", "auto");
            const newBoxHeight = this.sampleReviewBox[0].scrollHeight;
            this.sampleReviewBox.height(currentHeight).animate({ height: newBoxHeight }, 300, 'swing');
        }

        updateCustomerState(customer) {
            if(customer.get(0) !== this.activeCustomer?.get(0)){
                this.removeActive();
                this.setActive(customer);
                const customerData = this.getDataCustomer(customer);
                this.setDataCustomer(customerData);
                this.animateSampleBox();
            }
        }

        addListeners() {
            this.customersBox.find('.customer__wrapper__img').each((index, customer) => {
                $(customer).on('mouseenter', () => {
                    this.updateCustomerState($(customer));
                })
            })
        }
    }

    const reviewsObj = new Reviews($('.customers__img__box'));
});

