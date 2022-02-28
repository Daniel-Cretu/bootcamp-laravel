class Article {
    title;
    description;
    category;
    author;
    image;

    constructor(title, description, category, author, image) {
        this.title = title;
        this.description = description;
        this.category = category;
        this.author = author;
        this.image = image;
    }

}

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
                <strong class="me-auto">New article was created/updated with success</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;
}

/** @type {HTMLFontElement} editArticleForm */
const editArticleForm = document.getElementById('editArticleForm')


if (editArticleForm) {
    /** @type {HTMLInputElement} titleInput */
    const titleInput = editArticleForm.querySelector('#titleInput')
    /** @type {HTMLTextAreaElement} descriptionInput */
    const descriptionInput = editArticleForm.querySelector('#descriptionInput')
    /** @type {HTMLSelectElement} categoryInput */
    const categoryInput = editArticleForm.querySelector('#categoryInput')
    /** @type {HTMLSelectElement} imagePreview */
    const authorInput = editArticleForm.querySelector('#authorInput')
    /** @type {HTMLInputElement} imageInput */
    const imageInput = editArticleForm.querySelector('#imageInput')
    /** @type {HTMLImageElement} imagePreview */
    const imagePreview = editArticleForm.querySelector('#imagePreview')

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

    editArticleForm.onsubmit = (event) => {
        event.preventDefault();

        const article = new Article(titleInput.value, descriptionInput.value, categoryInput.value, authorInput.value, imageInput.files[0])

        const formData = new FormData();
        formData.append('title', article.title)
        formData.append('description', article.description)
        formData.append('category', article.category)
        formData.append('author', article.author)
        console.log(article.category)
        formData.append('image', article.image)

        function cleanUpCreateForm() {
            titleInput.value  = '';
            descriptionInput.value = '';
            categoryInput.value = null;
            authorInput.value = null;
            imageInput.value = null;
            imagePreview.src = '';
            imagePreview.hidden = true;
        }

        axios.post('/api/articles/'+document.getElementById('articleId').value, formData)
            .then(response => {
                const errorToastsRegion = document.querySelector('[error-toasts-region]');
                errorToastsRegion.innerHTML = getSuccessToastTemplate()
                $('#successToast').toast('show');
                cleanUpCreateForm();
            })
            .catch(error => {
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
