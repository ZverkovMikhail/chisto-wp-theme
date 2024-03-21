let feedbackForm = document.querySelector('.feedback-form');
if (feedbackForm) {
    let captchaImageEl = document.querySelector('.captcha-image')
    window.addEventListener('load', () => {
        Array.from(feedbackForm.querySelectorAll('.feedback-form__input')).forEach((el) => {
            if (el.value !== '') {
                console.log(el.value)
                captchaImageEl.style.display = 'block';
            }
        });
    });
    feedbackForm.addEventListener('click', () => {
        console.log('captcha-image')
        captchaImageEl.style.display = 'block';
    });
}
class Gallery {
    active = -1;
    images = [];

    constructor(sliderEl, galleryPrevButton, galleryNextButton, imageClassName, imagePrevClassName, buttonDisableClassName) {
        this.buttonDisableClassName = buttonDisableClassName;
        this.imageClassName = imageClassName;
        this.imagePrevClassName = imagePrevClassName;
        this.sliderEl = sliderEl;
        this.galleryPrevButton = galleryPrevButton;
        this.galleryNextButton = galleryNextButton;
        this.images = document.querySelectorAll(`.${this.imageClassName}`);
        this.lastIndex = this.images.length - 1;
        this.isOver = false;
        if (this.active < 0) {
            this.active = this.lastIndex;
        }
        galleryPrevButton.addEventListener('click', this.prev.bind(this));
        galleryNextButton.addEventListener('click', this.next.bind(this));
        this.checkDisable();
    }

    next() {
        if (this.active > 0) {
            this.images[this.active--].classList.add(this.imagePrevClassName);
            this.fetchImages(this.lastIndex + 1);
        }
        this.checkDisable();
    }

    prev() {
        if (this.active < this.images.length - 1) {
            this.images[++this.active].classList.remove(this.imagePrevClassName);
        }
        this.checkDisable();
    }

    checkDisable() {
        if (this.active === 0) {
            this.disableButton(this.galleryNextButton);
        } else {
            this.enableButton(this.galleryNextButton);
        }
        if (this.active >= this.images.length - 1) {
            this.disableButton(this.galleryPrevButton);
        } else {
            this.enableButton(this.galleryPrevButton);
        }
    }

    enableButton(button) {
        if (button.classList.contains(this.buttonDisableClassName)) {
            button.classList.remove(this.buttonDisableClassName);
        }
    }

    disableButton(button) {
        if (!button.classList.contains(this.buttonDisableClassName)) {
            button.classList.add(this.buttonDisableClassName);
        }
    }

    fetchImages(startIndex) {
        if (!this.isOver) {
            fetch(`/wp-json/gallery/v1/next/${startIndex}`)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    this.lastIndex = data['last_index'];
                    const receivedImages = data['gallery_images'];
                    if (receivedImages.length) {
                        this.active += receivedImages.length;
                        receivedImages.forEach((img) => {
                            this.sliderEl.prepend(document.createRange().createContextualFragment(img));
                        });
                        this.images = document.querySelectorAll(`.${this.imageClassName}`);
                        this.checkDisable();
                    }

                    if (this.lastIndex < 0) {
                        this.isOver = true;
                    }
                })
        }

    }
}

class Services {
    services = new Map();
    activeServices = [];

    constructor(container, mobileWidth) {
        this.container = container;
        this.mobileWidth = mobileWidth;
        this.serviceButtons = this.container.querySelectorAll('.service__button');
        this.init();
    }

    init() {
        this.serviceButtons.forEach((button) => {
            let id = parseInt(button.dataset.id);
            let service = {
                button: button,
                content: this.container.querySelector(`.service__content-item[data-id="${button.dataset.id}"]`)
            }
            button.addEventListener('click', () => {
                this.serviceActivate(id);
            });

            this.services.set(id, service);
        });
        if (!this.activeServices.length) {
            this.serviceActivate(this.services.keys().next().value);
        }
        window.addEventListener('resize', () => {
            if (window.innerWidth > this.mobileWidth && this.activeServices.length > 1) {
                this.serviceActivate(this.activeServices[this.activeServices.length - 1]);
            }
        })
    }

    serviceActivate(id) {

        if (window.screen.width <= this.mobileWidth) {
            this.activeServices.push(id);
        } else {
            this.activeServices = [id];
        }
        this.services.forEach((service, id) => {
            if (this.activeServices.includes(id)) {
                service.button.classList.add('service__button_active');
                service.content.classList.add('service__content-item_active');
            } else {
                service.button.classList.remove('service__button_active');
                service.content.classList.remove('service__content-item_active');
            }
        });
    }
}

function init() {
    let wpcf7Elm = document.querySelector('.wpcf7');

    if (wpcf7Elm) {
        wpcf7Elm.addEventListener('wpcf7submit', function (event) {
            alert("wpcf7submit!");
        }, false);
        wpcf7Elm.addEventListener('wpcf7mailfailed', function (event) {
            alert("wpcf7mailfailed!");
        }, false);
        wpcf7Elm.addEventListener('wpcf7invalid', function (event) {
            alert("wpcf7invalid!");
        }, false);

    }
        const galleryPrevButtons = document.querySelector('.gallery__button_prev');
        const galleryNextButtons = document.querySelector('.gallery__button_next');
        const sliderEl = document.querySelector('.gallery__img-slider');
        if (sliderEl) {
            new Gallery(
                sliderEl,
                galleryPrevButtons,
                galleryNextButtons,
                'gallery-img__block',
                'gallery-img__block_prev',
                'gallery__button_disable'
            );
        }

        const serviceContainer = document.querySelector('.service__content');
        if (serviceContainer) {
            new Services(serviceContainer, 800);
        }
}

window.addEventListener('load', function () {
    setTimeout(() => {
        let preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.style.display = 'none';
        }
        init();
    }, 1);

});
