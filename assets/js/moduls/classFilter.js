let animateCategoryBlock = false;
export class Filter {
    constructor(obj, mql) {
        if (!animateCategoryBlock) {
            this.categoryObj = obj;
            this.mql = mql;

            this.categoryLine = this.categoryObj.closest('.category__line');

            this.productBox = jQuery('.category__content__box');
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
            const category = jQuery(this).attr('data-category');
            if (category && childs.includes(category)) {
                currentChilds.push(jQuery(this));
            }
        });
        this.countProductsInCategory = currentChilds.length;
        return jQuery(currentChilds);
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
            jQuery(this).css({
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
        if (this.mql.matches) {
            countRows = Math.ceil(Number(this.countProductsInCategory) / 4);
        } else {
            countRows = Math.ceil(Number(this.countProductsInCategory) / 2);
        }
        const newBoxHeight = countRows * oneProductHeight;
        this.productBox.animate({ 'height': newBoxHeight }, 300);
    }
}