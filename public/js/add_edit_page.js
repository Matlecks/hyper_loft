var tabs = document.querySelectorAll('.add_page_switcher li');
if (tabs) {
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            tabs.forEach(function (element) {
                element.classList.remove('active');
            });
            tab.classList.add('active');

            var clickedId = tab.getAttribute('id');
            var tabContents = document.querySelectorAll('.tab_content');

            tabContents.forEach(function (content) {
                if (content.getAttribute('id') === clickedId) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        });
    });
}

var dropzones = document.querySelectorAll('.dropzone');
var imageArray = []; // Создаем пустой массив для хранения картинок

dropzones.forEach(dropzone => {
    /* var image = dropzone.querySelector('.dropzone_img');
    var fileIcon = dropzone.querySelector('i');
    var fileName = dropzone.querySelector('span'); */
    var fileInput = dropzone.querySelector('input[type="file"]');
    /* var img_cards_container = document.querySelector('.img_cards_container'); */

    var imageCount = 0;
    /* var imageArray = []; */

    function handleFiles(files) {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageArray_element = document.getElementById('imageArray');
            var reader = new FileReader();
            var img_src;
            reader.onload = function (e) {
                var anounce_tab = document.querySelector('#anounce');
                if (anounce_tab.classList.contains("active")) {
                    var image = document.getElementById('announcePreviewImage');
                    var fileName = document.getElementById('announceFileName');
                    image.src = e.target.result;
                    img_src = e.target.result;
                    fileName.innerText = file.name;
                } else {
                    var image = document.getElementById('detailPreviewImage');
                    var fileName = document.getElementById('detailFileName');
                    var img_cards_container = document.querySelector('.img_cards_container');
                    image.src = e.target.result;
                    img_src = e.target.result;
                    fileName.innerText = file.name;
                    if (img_cards_container && imageCount < 3) {
                        var admin_part_img_cards = document.querySelectorAll('.admin_part_img_card');
                        /* if (admin_part_img_cards) {
                            admin_part_img_cards.forEach(admin_part_img_card => {
                                admin_part_img_card.remove();
                            });
                        } */
                        var html = `<div class="admin_part_img_card">
                        <div class="admin_part_img_card_img_container">
                            <img src="${img_src}"
                                class="admin_part_img_card_img">
                        </div>
                        <div style="padding: 1.5rem;">
                            <p class="admin_part_img_card_title">${file.name}</p>
                            <button class="admin_part_img_card_img_delete_btn">Delete</button>
                        </div>
                    </div>`;
                        img_cards_container.innerHTML += html;
                        imageCount++;
                        imageArray.push(file.name);
                        imageArray_element.value = imageArray.join(",");
                    }
                }
            }
            reader.readAsDataURL(file);
        }
    }

    dropzone.addEventListener('click', function () {
        fileInput.click();
    });

    fileInput.addEventListener('change', function (event_drop) {
        var files = event_drop.target.files;
        console.log(files);
        handleFiles(files);
    });

    dropzone.addEventListener('dragover', function (event_dragover) {
        event_dragover.preventDefault();
    });

    dropzone.addEventListener('drop', function (event_drop) {
        event_drop.preventDefault();
        var files = event_drop.dataTransfer.files;
        handleFiles(files);
    });
});
/*  */
