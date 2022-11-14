const form = document.querySelector('#a'),
fileInput = form.querySelector('.file-input');

form.addEventListener("click", () => {
    fileInput.click();
    
})

fileInput.onchange = ({ target }) => {
    let file = target.files[0];
    if (file) {
        let fileName = file.name;
        uploadFile(fileName);
    }
}

function uploadFile(name) { 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../../php/postFoto.php");
    let formData = new FormData(form);
    xhr.send(formData);
}
