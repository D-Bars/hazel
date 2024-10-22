jQuery(document).ready(function($) {
    let lastScroll = 0;
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