export class Reviews {
    constructor(customersBox) {
        this.customersBox = jQuery(customersBox);
        this.customerFirst = this.customersBox.find('.customer__wrapper__img').first();
        this.activeCustomer = null;

        this.sampleReviewBox = jQuery('.customers__review__box');
        this.sampleCustomerReview = this.sampleReviewBox.find('.customer__review__content');
        this.sampleCustomerFullname = this.sampleReviewBox.find('.customer__review__fullname');
        this.sampleCustomerProfession = this.sampleReviewBox.find('.customer__review__profession');

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
        if (customer.get(0) !== this.activeCustomer?.get(0)) {
            this.removeActive();
            this.setActive(customer);
            const customerData = this.getDataCustomer(customer);
            this.setDataCustomer(customerData);
            this.animateSampleBox();
        }
    }

    addListeners() {
        this.customersBox.find('.customer__wrapper__img').each((index, customer) => {
            jQuery(customer).on('mouseenter', () => {
                this.updateCustomerState(jQuery(customer));
            })
        })
    }
}