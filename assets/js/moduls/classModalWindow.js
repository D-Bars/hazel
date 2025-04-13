export class modalWindow {
    constructor(modalTrigger) {
        this.modalTrigger = jQuery(modalTrigger);
        this.modalWrapper = jQuery('[modal_wrapper]');
        this.modalCloser = this.modalWrapper.find('[closer]');
        this.modalMask = this.modalWrapper.find('[mask]');

        this.triggerHideModal = [this.modalCloser, this.modalMask];

        this.addOnClick(this.modalTrigger, () => this.modalShow());
        this.addHideTriggers(this.triggerHideModal);
    }

    addOnClick(obj, callback) {
        if (Array.isArray(obj)) {
            obj.forEach((currentObj) => {
                currentObj.on('click', callback);
            });
        } else {
            obj.on('click', callback);
        }
    }

    addHideTriggers(trigger) {
        if (Array.isArray(trigger)) {
            trigger.forEach((currentObj) => {
                this.triggerHideModal.push(currentObj);
            })
        } else {
            this.triggerHideModal.push(trigger);
        }
        this.addOnClick(trigger, () => this.modalHide());
    }

    modalShow() {
        this.modalWrapper.animate({ right: '0vh' }, 500, () => {
            this.addOpenedClassToModal();
        });
    }

    modalHide() {
        this.modalWrapper.animate({ right: '-100vw' }, 500, () => {
            this.removeOpenedClassToModal();
        });
    }

    addOpenedClassToModal(){
        this.modalWrapper.addClass('modal__opened');
    }

    removeOpenedClassToModal(){
        this.modalWrapper.removeClass('modal__opened');
    }
}