import { createIntersectionObserverServices } from "./moduls/interSectionAPI.js";
import headerLineScroll from "./moduls/hederLineScroll.js";
import { ObserveSections } from "./moduls/classObserveSections.js";
import { Advantages } from "./moduls/classAdvantages.js";
import { Filter } from "./moduls/classFilter.js";
import { Reviews } from "./moduls/classReviews.js";
import parallax from "./moduls/parallax.js";
import { modalWindow } from "./moduls/classModalWindow.js";

const mql = window.matchMedia("(min-width: 800px)");

jQuery(document).ready(function ($) {
    const currentPage = $('[data-page]').data('page');

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

    const modulesToInit = [
        {
            pages: ['front'],
            init: () => createIntersectionObserverServices(mql)
        },
        {
            pages: ['front'],
            init: () => {
                const sectionIds = ["Home", "About", "Services", "Work", "Clients", "Contact"];
                const sectionArray = sectionIds.map(id => document.getElementById(id)).filter(Boolean);
                new ObserveSections(sectionArray);
            }
        },
        {
            pages: ['front'],
            init: () => {
                if (mql.matches) new Advantages($('.advantages__circle'));
            }
        },
        {
            pages: ['front'],
            init: () => parallax()
        },
        {
            pages: ['front', 'archive-products'],
            init: () => {
                $('.category__item__title').on('click', function () {
                    new Filter($(this), mql);
                });
            }
        },
        {
            pages: ['front'],
            init: () => new Reviews($('.customers__img__box'))
        },
        {
            pages: ['archive-products', 'single-products'],
            init: () => new modalWindow('.header__company__btn')
        }
    ];

    modulesToInit.forEach(({ pages, init }) => {
        if (pages.includes(currentPage)) {
            init();
        }
    });
});

