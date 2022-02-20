class Article {
    title;
    description;
    category;
    image;

    constructor(title, description, category, image) {
        this.title = title;
        this.description = description;
        this.category = category;
        this.image = image;
    }

}

/** @type {HTMLFontElement} createArticleForm */
const createArticleForm = document.getElementById('createArticleForm')

if (createArticleForm) {
    /** @type {HTMLInputElement} titleInput */
    const titleInput = createArticleForm.querySelector('#titleInput')
    /** @type {HTMLTextAreaElement} descriptionInput */
    const descriptionInput = createArticleForm.querySelector('#descriptionInput')
    /** @type {HTMLSelectElement} categoryInput */
    const categoryInput = createArticleForm.querySelector('#categoryInput')
    /** @type {HTMLInputElement} imageInput */
    const imageInput = createArticleForm.querySelector('#imageInput')
    /** @type {HTMLImageElement} imagePreview */
    const imagePreview = createArticleForm.querySelector('#imagePreview')

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

    createArticleForm.onsubmit = (event) => {
        event.preventDefault();

        const article = new Article(titleInput.value, descriptionInput.value, categoryInput.value, imageInput.files[0])

        const formData = new FormData();
        formData.append('title', article.title)
        formData.append('description', article.description)
        formData.append('category', article.category)
        console.log(article.category)
        formData.append('image', article.image)

        function cleanUpCreateForm() {
            titleInput.value  = '';
            descriptionInput.value = '';
            categoryInput.value = null;
            imageInput.value = null;
            imagePreview.src = '';
            imagePreview.hidden = true;
        }

        axios.post('/api/articles', formData)
            .then(response => {
                console.log(response);
                alert('New article was created with success')
                cleanUpCreateForm();
            })
            .catch(error => {
                console.error(error.response.data)
            })
    }
}
