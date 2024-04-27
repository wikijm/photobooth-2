document.addEventListener('DOMContentLoaded', function () {
    console.log('collage.js');
    let fourCutButton = document.getElementById('four-cut-button');
    let sixCutButton = document.getElementById('six-cut-button');

    fourCutButton.addEventListener('click', function () {
        selectOption('1x4');
    });
    sixCutButton.addEventListener('click', function () {
        selectOption('2x3');
    });

    function selectOption(selectedOption) {
        if (selectedOption) {
            let collage = selectedOption.getAttribute('data-value');
            let price = selectedOption.getAttribute('data-price');

            let queryParams = '?step=quantity&collage=' + collage + '&price=' + price;
            let newUrl =
                window.location.protocol + '//' + window.location.host + window.location.pathname + queryParams;
            window.history.pushState({ path: newUrl }, '', newUrl);

            // Load the content of the new step via AJAX
            loadStepContent('quantity', queryParams);
        }
    }

    // Function to load step content via AJAX
    function loadStepContent(step, queryParams) {
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.querySelector('.premium-body').innerHTML = xhr.responseText;
                    // Load quantity.js dynamically
                    let script = document.createElement('script');
                    script.src = '/resources/js/premium/quantity.js';
                    script.onload = function () {
                        // Optional: Do something when quantity.js is loaded
                        console.log('quantity.js loaded');
                    };
                    document.head.appendChild(script);
                } else {
                    // Handle error
                    console.error('Failed to load step content');
                }
            }
        };
        xhr.open('GET', 'template/components/premium.' + step + '.php' + queryParams, true);
        xhr.send();
    }
});
