// Получаем элементы, с которыми будем работать
var publicBtn = document.querySelector('#public_btn');
var adminBtn = document.querySelector('#admin_btn');
var publicForm = document.querySelector('#public_form');
var adminForm = document.querySelector('#admin_form');

// Скрываем форму public и делаем кнопку admin активной изначально
publicForm.style.display = 'none';
adminBtn.classList.add('active');

// Добавляем обработчики событий на клик по кнопкам
publicBtn.addEventListener('click', function() {
  // Делаем форму public видимой и форму admin скрываем
  publicForm.style.display = 'block';
  adminForm.style.display = 'none';
  // Делаем кнопку public активной, а кнопку admin неактивной
  publicBtn.classList.add('active');
  adminBtn.classList.remove('active');
});

adminBtn.addEventListener('click', function() {
  // Делаем форму admin видимой и форму public скрываем
  adminForm.style.display = 'block';
  publicForm.style.display = 'none';
  // Делаем кнопку admin активной, а кнопку public неактивной
  adminBtn.classList.add('active');
  publicBtn.classList.remove('active');
});
