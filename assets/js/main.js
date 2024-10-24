// const target = document.getElementById('black__block');

// const observerCallback = (entries, observer) => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//             entry.target.style.opacity = '1'; 
//             observer.unobserve(entry.target);
//         }
//     });
// };

// const observerOptions = {
//     root: null,
//     rootMargin: '0px',
//     threshold: 0.5 
// };

const observer = new IntersectionObserver(observerCallback, observerOptions);

observer.observe(target);

jQuery(document).ready(function($) {
    var lastScroll = 0;
    const headerLine = $('#header__line');

    window.addEventListener('scroll', () => {
        let scrollTop = window.scrollY;
        if( scrollTop > lastScroll){
            headerLine.css('transform', 'translateY(0)');
        }else{
            headerLine.css('transform', 'translateY(-100px)');
        }
    })
});

