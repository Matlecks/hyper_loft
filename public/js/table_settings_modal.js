/* Переключает true/false в чекбоксах */

/* var modal = document.querySelector('.admin_part_modal_table_settings');

if (modal) {
    var ul = modal.querySelector('ul');

    var liList = ul.querySelectorAll('li');

    liList.forEach(function (li) {
        var checkbox = li.querySelector('input[type="checkbox"]');

        checkbox.addEventListener('click', function () {
            if (checkbox.value === 'true') {
                checkbox.value = 'false';
            } else {
                checkbox.value = 'true';
            }
        });

    });

    var admin_part_add_column = modal.querySelector('.admin_part_add_column');
    var add_btn = admin_part_add_column.querySelector('td:first-child');

    add_btn.addEventListener('click', function () {
        var admin_part_add_column_select = admin_part_add_column.querySelector('.admin_part_add_column_select');
        var admin_part_modal_sort_input = admin_part_add_column.querySelector('.admin_part_modal_sort_input');

        var selectedValue = admin_part_add_column_select.value;
        var inputValue = admin_part_modal_sort_input.value;

        var htmlCode = `
        <li class="list-group-item">
            <label class="form-check-label d-flex justify-content-between" for="firstCheckbox">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-check-input me-1" type="checkbox" value="true" name="checkbox_${selectedValue}" checked="">
                            </td>
                            <td>
                                <input type="text" name="column_altername_${selectedValue}" value="${selectedValue}" style="border: none; outline: none;">
                            </td>
                            <td>
                                <input type="text" name="column_name_${selectedValue}" style="border: none; width: 100px;" value="${selectedValue}" disabled="">
                            </td>
                            <td>
                                <input type="text" name="column_sort_${selectedValue}" class="admin_part_modal_sort_input" value="${inputValue}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </label>
        </li>
    `;

        ul.insertAdjacentHTML('beforeend', htmlCode);

    });

}
 */
