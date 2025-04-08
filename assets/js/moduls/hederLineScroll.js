
const headerLineScroll = (mql) => {

    const lastScroll = 0;
    const headerLine = jQuery('#header__line');
    
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
}

export default headerLineScroll;