/* Массовое редактирование ajax */

/* Меняет у value чекбоксов */
var allCheckboxes = document.querySelectorAll('input[type="checkbox"]');

allCheckboxes.forEach(function (checkbox) {
    var isChecked = false;

    checkbox.addEventListener('click', function () {
        if (isChecked) {
            checkbox.value = false;
            isChecked = false;
        } else {
            checkbox.value = true;
            isChecked = true;
        }
    });
});


/*  */
var array_1_mail_action_btns = document.querySelectorAll('button.admin_part_mail_btn');
var array_2_mail_action_btns = document.querySelectorAll('.dropdown-menu button');

var mail_action_btns = Array.from(array_1_mail_action_btns).concat(Array.from(array_2_mail_action_btns));

var _token = document.querySelector('input[name="_token"]');
mail_action_btns.forEach(function (mail_action_btn) {
    mail_action_btn.addEventListener('click', function (event) {

        var action = mail_action_btn.id;
        var checkedLetters = document.querySelectorAll('input[type="checkbox"][value="true"]');
        var letters_id = Array.from(checkedLetters).map(function (checkbox) {
            return checkbox.id;
        });

        var action_input = document.querySelector('input[name="action"]');
        var letters_id_input = document.querySelector('input[name="letters_id"]');

        action_input.value = action;
        letters_id_input.value = letters_id;
    });
});
