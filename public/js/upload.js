
/*
|==================================================================
| Checking if the DOM containing the above item list: version 1.0
|==================================================================
*/
let hasElementAll = (els) => {
    for (let i = 0; i < els.length; i++) {
        return document.contains(els[i]) ?? false;
    }
}

// ================================================================================================================

const uploadArea = document.getElementById('uploadArea');
const fileInput = document.getElementById('fileInput');
const preview = document.getElementById('preview');
const holder = document.getElementById('holder');
const browseBtn = document.getElementById('browseBtn');

if (hasElementAll([uploadArea, fileInput, browseBtn])) {

    uploadArea.addEventListener('click', () => fileInput.click());

    browseBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.click();
    });

    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#007bff';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = '#999';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#999';
        handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', () => {
        handleFiles(fileInput.files);
    });

    function handleFiles(files) {
        const file = files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                holder.textContent = "";
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview" />`;
            };
            reader.readAsDataURL(file);
        } else {
            alert('Please upload a valid image file.');
        }
    }

} else {
    console.log(`Unable to run drag and drop script  because this page doesn't have div with id #uploadArea`);
}
