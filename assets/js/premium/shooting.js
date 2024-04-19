console.log('shooting');

let nextButton = document.querySelector('.next-button');
const imageContainer = document.querySelector('.image-container');
const collageContainer = document.querySelector('.collage-container');
let selectedImages = [];

const renderImagesForSelection = (result) => {
    console.log('render', result);
    for (let i = 0; i < 9; i++) {
        const image = document.createElement('img');
        image.src = `/data/tmp/${result.file.split('.jpg')[0]}-${i}.jpg`;
        image.id = `${result.file.split('.jpg')[0]}-${i}.jpg`;
        image.classList.add('select-image');
        imageContainer.appendChild(image);
    }
};

imageContainer.addEventListener('click', function (event) {
    if (event.target.classList.contains('select-image') && selectedImages.length < 4) {
        const imageId = event.target.src.split('/').pop();
        const index = selectedImages.indexOf(imageId);
        if (index === -1) {
            selectedImages.push(imageId);
            event.target.classList.add('selected');
            event.target.classList.remove('grayscale'); // uklanja se efekat sive boje
        } else {
            selectedImages.splice(index, 1);
            event.target.classList.remove('selected');
            event.target.classList.add('grayscale'); // dodaje se efekat sive boje
        }
        renderCollage();
    }
});

const renderCollage = () => {
    collageContainer.innerHTML = '';
    selectedImages.forEach((imageId) => {
        const image = document.createElement('img');
        image.src = document.getElementById(imageId).src;
        collageContainer.appendChild(image);
    });
};

let intervalId = setInterval(() => {
    const result = JSON.parse(localStorage.getItem('result'));
    console.log('result', result);

    if (result) {
        clearInterval(intervalId);
        renderImagesForSelection(result);
    }
}, 2000);

nextButton.addEventListener('click', function () {
    let params = new URLSearchParams(window.location.search);
    const result = JSON.parse(localStorage.getItem('result'));
    result.selectedImages = selectedImages;
    result.layout = params.get('collage');
    console.log('next step', params);
    photoBooth.processPic(result);
});
