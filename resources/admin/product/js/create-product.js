// class Product {
//     name;
//     description;
//     category;
//     price;
//     warnings;
//     image;
//
//     constructor(name, description, category, price, warnings, image) {
//         this.name = name;
//         this.description = description;
//         this.category = category;
//         this.price = price;
//         this.warnings = warnings;
//         this.image = image;
//     }
//
// }

function getErrorToastTemplate(key, error) {
    return `
        <div id="${key}" class="toast hide error-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">${error}</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;

}function getSuccessToastTemplate() {
    return `
        <div id="successToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header border-0 rounded bg-success text-white">
                <strong class="me-auto">New products was created with success</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;
}

/** @type {HTMLFontElement} createProductForm */
const createProductForm = document.getElementById('createProductForm')

if (createProductForm) {
    /** @type {HTMLInputElement} nameInput */
    const nameInput = createProductForm.querySelector('#nameInput')
    /** @type {HTMLTextAreaElement} descriptionInput */
    const descriptionInput = createProductForm.querySelector('#descriptionInput')
    /** @type {HTMLInputElement} descriptionInput */
    const priceInput = createProductForm.querySelector('#priceInput')
    /** @type {HTMLSelectElement} categoryInput */
    const categoryInput = createProductForm.querySelector('#categoryInput')
    /** @type {HTMLSelectElement} warningsInput */
    const warningsInput = createProductForm.querySelector('#warningsInput')
    /** @type {HTMLInputElement} imageInput */
    const imageInput = createProductForm.querySelector('#imageInput')
    /** @type {HTMLImageElement} imagePreview */
    const imagePreview = createProductForm.querySelector('#imagePreview')

    imageInput.onchange = (event) => {
        const file = imageInput.files[0];

        if (typeof file === 'undefined') {
            imagePreview.src = '';
            imagePreview.hidden = true;
        } else {
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.hidden = false;
        }
    }

    createProductForm.onsubmit = (event) => {
        event.preventDefault();

        // console.log(priceInput.value);
        // const article = new Product(nameInput.value, descriptionInput.value, priceInput.value, categoryInput.value, warningsInput.value, imageInput.files[0])
        // console.log(article.price);

        const formData = new FormData();
        formData.append('name', nameInput.value)
        formData.append('description', descriptionInput.value)
        formData.append('price', priceInput.value)
        formData.append('category', categoryInput.value)

        // for ( let i = 0; i < categoryInput.selectedOptions.length; i++) {
        //     console.log( categoryInput.selectedOptions[i].value);
        // }
        // console.log(warningsInput.options);
        let warnings = [];
        for (const [key, value] of Object.entries(warningsInput.options)) {
            // toasts = toasts + getErrorToastTemplate(key, value);
            // errorToastsRegion.innerHTML = toasts
            if(value.selected) {
                // console.log(value);
                warnings.push(value.value)
            }
        }

        console.log(warnings);


        // console.log([...categoryInput.options].filter(option => option.selected).map(option => option.value))
        formData.append('warnings', warnings)
        formData.append('image', imageInput.files[0])


        function cleanUpCreateForm() {
            nameInput.value  = '';
            descriptionInput.value = '';
            priceInput.value = null;
            categoryInput.value = 1;
            warningsInput.value = null;
            imageInput.value = null;
            imagePreview.src = '';
            imagePreview.hidden = true;
        }

        axios.post('/api/products', formData)
            .then(response => {
                const errorToastsRegion = document.querySelector('[error-toasts-region]');
                errorToastsRegion.innerHTML = getSuccessToastTemplate()
                $('#successToast').toast('show');
                cleanUpCreateForm();
            })
            .catch(error => {
                // console.error(error.response.data.errors)

                const errorToastsRegion = document.querySelector('[error-toasts-region]');
                console.log(errorToastsRegion)
                let toasts = '';
                for (const [key, value] of Object.entries(error.response.data.errors)) {
                    toasts = toasts + getErrorToastTemplate(key, value);
                    errorToastsRegion.innerHTML = toasts
                    console.log('#' + key);
                }
                $('.error-toast').toast('show');
            })
    }
}
