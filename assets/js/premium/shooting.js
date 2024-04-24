console.log('shooting');

let nextButton = document.querySelector('.next-button');
const imageContainer = document.querySelector('.image-container');
let selectedImages = [];
let params = new URLSearchParams(window.location.search);
const layout = params.get('collage');
const copies = Number(params.get('quantity'));
const collageContainer = document.querySelector(
    `${layout === '1x4' ? '.collage-container-1x4' : '.collage-container-2x3'}`
);

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
    const selectionCount = layout === '1x4' ? 4 : 6;
    if (event.target.classList.contains('select-image') && selectedImages.length < selectionCount) {
        const imageId = event.target.src.split('/').pop();
        const index = selectedImages.indexOf(imageId);
        if (index === -1) {
            selectedImages.push(imageId);
            event.target.classList.add('selected');
            event.target.classList.remove('grayscale');
        } else {
            selectedImages.splice(index, 1);
            event.target.classList.remove('selected');
            event.target.classList.add('grayscale');
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
    const result = JSON.parse(sessionStorage.getItem('result'));
    console.log('result', result);

    if (result) {
        clearInterval(intervalId);
        renderImagesForSelection(result);
    }
}, 2000);

nextButton.addEventListener('click', function () {
    const result = JSON.parse(sessionStorage.getItem('result'));
    result.selectedImages = selectedImages;
    result.layout = layout;
    const newResultObj = { ...result, selectedImages, layout, copies };
    sessionStorage.setItem('result', JSON.stringify(newResultObj));
    console.log('next step', params);
    photoBooth.processPic(result);
});
