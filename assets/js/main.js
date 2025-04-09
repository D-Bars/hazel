import { createIntersectionObserverServices } from "./moduls/interSectionAPI.js";
import headerLineScroll from "./moduls/hederLineScroll.js";
import { ObserveSections } from "./moduls/classObserveSections.js";
import { Advantages } from "./moduls/classAdvantages.js";
import { Filter } from "./moduls/classFilter.js";
import { Reviews } from "./moduls/classReviews.js";
import parallax from "./moduls/parallax.js";

const mql = window.matchMedia("(min-width: 800px)");

jQuery(document).ready(function ($) {
    //interSection API (Services)
    createIntersectionObserverServices(mql);

    //burger for mobile
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
    headerLineScroll(mql);

    //observeSection
    const sectionIds = ["Home", "About", "Services", "Work", "Clients", "Contact"];
    const sectionArray = sectionIds.map(id => document.getElementById(id)).filter(Boolean)
    const sectionObserveObj = new ObserveSections(sectionArray);

    //advantages
    if (mql.matches) {
        const advantages = new Advantages($('.advantages__circle'));
    }

    //why us parallax
    parallax();

    //portfolio
    $('.category__item__title').on('click', function () {
        const category = new Filter($(this), mql);
    })

    //reviews
    const reviewsObj = new Reviews($('.customers__img__box'));
});

//сделать отдельное меню для архивной страницы с продуктами и для продуктов

