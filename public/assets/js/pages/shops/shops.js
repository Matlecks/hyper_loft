/* Сортировка */

var table = document.querySelector('table');
if (table) {
    var thead = table.querySelector('thead');
    var tbody = table.querySelector('tbody');
    var tr = thead.querySelector('tr');
    var ths = tr.querySelectorAll('th');
    var isFirstSvgClicked = true;

    ths.forEach(th => {
        th.addEventListener('click', () => {

            var _token = th.querySelector('input[name="_token"]').value;
            var spans = th.querySelectorAll('span.w-100');
            if (spans.length === 0) {
                return;
            }
            var firstSvg = spans[0].querySelector('svg');
            var secondSvg = spans[1].querySelector('svg');
            var spanWithoutClass = th.querySelector('span:not(.w-100)');
            if (!spanWithoutClass) {
                return;
            }
            var idValue = spanWithoutClass.id;
            var sortValue = "asc";
            if (isFirstSvgClicked) {
                firstSvg.style.fill = '#6C757DFF';
                secondSvg.style.fill = '#B6BBC2';
                sortValue = "desc";
            } else {
                firstSvg.style.fill = '#B6BBC2';
                secondSvg.style.fill = '#6C757DFF';
                sortValue = "asc";
            }
            isFirstSvgClicked = !isFirstSvgClicked;
            $.ajax({
                url: 'http://hyperloft/admin/shops/sort_shops',
                type: 'POST',
                dataType: 'json',
                data: { collumn_name: idValue, sort_value: sortValue, _token: _token, },
                success: function (response) {
                    if (response.success) {
                        tbody.innerHTML = response.html;
                    }
                }
            });
        });
    });
}
/*  */
