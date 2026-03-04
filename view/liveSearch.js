document.addEventListener('DOMContentLoaded', function () {
    var forms = document.querySelectorAll('.js-live-search');

    forms.forEach(function (form) {
        var input = form.querySelector('input[name="search"]');
        var targetSelector = form.getAttribute('data-target');
        var endpoint = form.getAttribute('data-endpoint');
        var target = targetSelector ? document.querySelector(targetSelector) : null;
        var pageButtons = document.getElementById('products-pagebuttons');

        if (!input || !target || !endpoint) {
            return;
        }

        var initialHtml = target.innerHTML;
        var timer = null;
        var currentController = null;

        var runSearch = function () {
            var query = input.value.trim();

            if (currentController) {
                currentController.abort();
            }

            if (query === '') {
                target.innerHTML = initialHtml;
                if (pageButtons) {
                    pageButtons.style.display = '';
                }
                return;
            }

            if (pageButtons) {
                pageButtons.style.display = 'none';
            }

            currentController = new AbortController();
            var url = endpoint + '&search=' + encodeURIComponent(query);

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                signal: currentController.signal
            })
                .then(function (response) {
                    return response.text();
                })
                .then(function (html) {
                    target.innerHTML = html;
                })
                .catch(function (error) {
                    if (error.name !== 'AbortError') {
                        console.error(error);
                    }
                });
        };

        input.addEventListener('input', function () {
            clearTimeout(timer);
            timer = setTimeout(runSearch, 250);
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            runSearch();
        });
    });
});
