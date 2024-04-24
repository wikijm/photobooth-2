console.log('quantity.js');
let quantity = 2;
let pricePerTwo = parseInt(document.querySelector('.price').textContent.split('$')[1], 10);
let nextButton = document.querySelector('.next-button');

document.querySelector('.increase').addEventListener('click', function () {
    quantity += 2;
    document.querySelector('.quantity').textContent = quantity;
    document.querySelector('.price').textContent = 'Price: $' + (quantity / 2) * pricePerTwo;
});

document.querySelector('.decrease').addEventListener('click', function () {
    if (quantity > 2) {
        quantity -= 2;
        document.querySelector('.quantity').textContent = quantity;
        document.querySelector('.price').textContent = 'Price: $' + (quantity / 2) * pricePerTwo;
    }
});

nextButton.addEventListener('click', function () {
    let params = new URLSearchParams(window.location.search);
    let queryParams =
        '?step=shooting&collage=' + params.get('collage') + '&price=' + params.get('price') + '&quantity=' + quantity;
    let newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname + queryParams;
    window.history.pushState({ path: newUrl }, '', newUrl);

    loadStepContent('shooting', queryParams);
});

function loadStepContent(step, queryParams) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.querySelector('.premium-body').innerHTML = xhr.responseText;
                let script = document.createElement('script');
                script.src = '/resources/js/premium/shooting.js';
                script.onload = function () {
                    // Optional: Do something when quantity.js is loaded
                    console.log('shooting.js loaded');
                };
                document.head.appendChild(script);
                let params = new URLSearchParams(queryParams);
                let premiumData = {};

                for (let param of params) {
                    premiumData[param[0]] = param[1];
                }
                // photoBooth.thrill('premium', undefined, premiumData);
            } else {
                // Handle error
                console.error('Failed to load step content');
            }
        }
    };
    xhr.open('GET', 'template/components/premium.' + step + '.php' + queryParams, true);
    xhr.send();
}
