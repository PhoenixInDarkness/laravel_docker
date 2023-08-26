const photoPreviewContainer = document.getElementById('photo-upload__preview');
const inputContainer = document.querySelector('.item-upload');
let inputIndex = 1;
let item_images = [];

function addInputChangeListener(input) {
    input.addEventListener('change', handleFileInputChange);
}

addInputChangeListener(document.getElementById('photo-upload'));

function handleFileInputChange(event) {
    const selectedFiles = event.target.files;

    for (let i = 0; i < selectedFiles.length; i++) {
        const index = item_images.length + i;
        const elemContainer = previewImage(selectedFiles[i], index);
        photoPreviewContainer.appendChild(elemContainer);

        createHiddenInput(selectedFiles[i].name, index);
        item_images.push(selectedFiles[i]);
    }

    // Прячем текущий input
    event.target.style.display = 'none';

    // Создаем новый input после загрузки файлов
    const newInput = createFileInput();
    inputContainer.prepend(newInput);
    addInputChangeListener(newInput); // Назначаем обработчик события изменения новому input
}


document.getElementById('photo-upload__preview').addEventListener('click', (e) => {
    const tgt = e.target.closest('button');
    if (tgt && tgt.classList.contains('delete')) {
        const divContainer = tgt.closest('div');
        const fileName = tgt.dataset.filename;
        divContainer.parentNode.remove();

        // Удаление из массива и скрытого инпута
        item_images = item_images.filter(img => img.name != fileName);
        const inputToRemove = document.querySelector(`input[name="photos[${divContainer.parentNode.dataset.index}]"]`);
        inputToRemove.remove();
    }
});

function createFileInput() {
    const newInput = document.createElement('input');
    newInput.type = 'file';
    newInput.name = `photos[${inputIndex}]`;
    newInput.classList.add('form-control');
    newInput.classList.add('col-md-12');
    newInput.multiple = true;
    newInput.addEventListener('change', handleFileInputChange);
    inputIndex++;
    return newInput;
}

function createHiddenInput(filename, index) {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = `photos[${index}]`;
    input.value = filename;
    document.getElementById('upload-form').appendChild(input);
}

function previewImage(file, index) {
    const imageContainer = document.createElement('div');
    imageContainer.classList.add('col-md-3', 'px-4', 'pb-3');
    imageContainer.setAttribute('id', `${index}`);

    const cardContainer = document.createElement('div');
    cardContainer.classList.add('card', 'px-0', 'border-gray');


    const elem = document.createElement('img');
    elem.setAttribute('src', URL.createObjectURL(file));
    elem.setAttribute('class', 'item-photo__preview img-thumbnail');
    const removeButton = document.createElement('button');
    removeButton.setAttribute('type', 'button');
    removeButton.classList.add('btn', 'btn-danger', 'delete', 'add-photo-btn');
    removeButton.dataset.filename = file.name;
    removeButton.innerHTML = '<span>&times;</span>';
    cardContainer.appendChild(elem);
    cardContainer.appendChild(removeButton);
    imageContainer.appendChild(cardContainer);
    imageContainer.dataset.index = index; // Сохраняем индекс для удаления
    return imageContainer;
}
