let posts = []

const addPostButton = document.querySelector('.add-post')

addPostButton.addEventListener('click', async (event) => {
    event.preventDefault();
    const getErrorHtml = (message) => {
        return `<small class="form-text text-danger">${message}</small>`
    }
    const getPostHtml = (object) => {
        return `<div class="col-lg-6">
        <div class="card mb-4 rounded-lg shadow-lg">
        <div class="card-body">
            
            <div class="media-body ml-3">
            ${object.name}
            <div class="text-muted small">${object.date}</div>
        </div>
            <p class="ml-3 text-muted">
                ${object.message}
            </p>
            <div class="media mb-3">
            ${object.image ? `<img src="${object.image}" class="d-block ui-w-40 width100" alt="">` : ''}
            
            </div>
        </div>
        </div>
    </div>
`
    }
    function convertFileToData(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
        })
    }
    const allErrors = document.querySelectorAll('.text-danger')
    for (var error of allErrors) {
        error.remove()
    }
    // event.stopPropagation()
    const name = document.querySelector('.username')
    const message = document.querySelector('.post')
    const file = document.querySelector('.image');
    // add validations are
    let errors = {
        name: "",
        message: "",
        file: ""
    }
    if (name.value == "" || message.value == "") {
        if (name.value == "") {
            errors.name = "Username is required"
            name.parentElement.innerHTML += getErrorHtml(errors.name)
        }
        if (message.value == "") {
            errors.message = "Message is required"
            message.parentElement.innerHTML += getErrorHtml(errors.message)
        }
        if (file.files.length > 0 && file.files[0].type.split('/')[0] != "image") {
            errors.file = "only images are allowed"
            file.parentElement.innerHTML += getErrorHtml(errors.file)

        }
        return;
    }


    // get data from form
    const base64Image = file.files[0] ? await convertFileToData(file.files[0]) : null
    const object = {
        name: name.value,
        message: message.value,
        image: base64Image,
        date: (new Date()).toLocaleString()
    }

    document.querySelector('.posts-content > .row').innerHTML += getPostHtml(object)
    posts.push(object);
    console.log(posts)
})
    //   img.onload = () => {
    //     URL.revokeObjectURL(img.src);
    //   }
    //   img.src = URL.createObjectURL(this.files[0]);