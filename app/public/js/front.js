/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/front.js ***!
  \*******************************/
var photoPreviewContainer = document.getElementById('photo-upload__preview');
var inputContainer = document.querySelector('.item-upload');
var inputIndex = 1;
var item_images = [];
function addInputChangeListener(input) {
  input.addEventListener('change', handleFileInputChange);
}
addInputChangeListener(document.getElementById('photo-upload'));
function handleFileInputChange(event) {
  var selectedFiles = event.target.files;
  for (var i = 0; i < selectedFiles.length; i++) {
    var index = item_images.length + i;
    var elemContainer = previewImage(selectedFiles[i], index);
    photoPreviewContainer.appendChild(elemContainer);
    createHiddenInput(selectedFiles[i].name, index);
    item_images.push(selectedFiles[i]);
  }

  // Прячем текущий input
  event.target.style.display = 'none';

  // Создаем новый input после загрузки файлов
  var newInput = createFileInput();
  inputContainer.prepend(newInput);
  addInputChangeListener(newInput); // Назначаем обработчик события изменения новому input
}

document.getElementById('photo-upload__preview').addEventListener('click', function (e) {
  var tgt = e.target.closest('button');
  if (tgt && tgt.classList.contains('delete')) {
    var divContainer = tgt.closest('div');
    var fileName = tgt.dataset.filename;
    divContainer.parentNode.remove();

    // Удаление из массива и скрытого инпута
    item_images = item_images.filter(function (img) {
      return img.name != fileName;
    });
    var inputToRemove = document.querySelector("input[name=\"photos[".concat(divContainer.parentNode.dataset.index, "]\"]"));
    inputToRemove.remove();
  }
});
function createFileInput() {
  var newInput = document.createElement('input');
  newInput.type = 'file';
  newInput.name = "photos[".concat(inputIndex, "]");
  newInput.classList.add('form-control');
  newInput.classList.add('col-md-12');
  newInput.multiple = true;
  newInput.addEventListener('change', handleFileInputChange);
  inputIndex++;
  return newInput;
}
function createHiddenInput(filename, index) {
  var input = document.createElement('input');
  input.type = 'hidden';
  input.name = "photos[".concat(index, "]");
  input.value = filename;
  document.getElementById('upload-form').appendChild(input);
}
function previewImage(file, index) {
  var imageContainer = document.createElement('div');
  imageContainer.classList.add('col-md-3', 'px-4', 'pb-3');
  imageContainer.setAttribute('id', "".concat(index));
  var cardContainer = document.createElement('div');
  cardContainer.classList.add('card', 'px-0', 'border-gray');
  var elem = document.createElement('img');
  elem.setAttribute('src', URL.createObjectURL(file));
  elem.setAttribute('class', 'item-photo__preview img-thumbnail');
  var removeButton = document.createElement('button');
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
/******/ })()
;