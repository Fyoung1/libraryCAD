Проект написанан на Laravel 
Бд mysql, бд хранится в OS panel 
Для запуска проекта необходимо в терминале прописать:
-php artisan migrate (для дропа данных в бд)
-php artisan migrate: fresh --seed (для стартовых данных в бд)
-php artisan serve (для запуска сервера)
_____________________________________________________________________________
Контроллеры 
AdminPanelController 
-showAdminPanel(Вывод списка книг в админ панель при помощи запроса в бд)
-CheckBookAdmin(Выбор книги для подробной информации при помощи запроса в бд по айди книги)
-EditBookAdmin(В контроллер передается айди для поиска в бд книги затем заполняем данными и проверяем на пустоту строки)
-DeleteBookAdmin(Удаление книги из бд по айди)
-AddBookAdmin(Переход на страницу с добавлением книги, для дальнейшего заполнения данных)
-AddToBaseBookAdmin(Добавление книги в бд)
Login Controller
-login(Вход в аккаунт)
-authenticated(Проверка на пользователя:админ или пользователь)
BookController
-ShowBooks(Вывод списка книг раннее забронированных пользователем)
-ReserveBook(Бронирование книги раннее выбранной пользователем по айди)
-ReturnBook(Возврат раннее бронированной книги пользователем )
-SearchBookForName(Поиск по названию книги )
-SearchBookForId(Поиск по айди в бд книги)
_________________________________________________________________
Модели 
Модель book состоит из (Названия,автора,даты публикации, статуса книги, картинки (ссылки))
Модель reserve состоит из (айди пользователя и айди книги)
Модель user состоит из (имени пользователя, почты, пароля и роли аккаунту(админ/пользователь))
_____________________________________________________
Миграции 
-create_user_table включает в себя:
'username' тип данных string;
'email' тип данных string;
'password' тип данных string;
'role' тип данных string;
-create_books_table включает в себя:
 'name' тип данных string;
  'author' тип данных string;
  'year_of_publication' тип данных int;
 'availability' тип данных string;
 'image' тип данных string;
-create_reserve_table
'id_users' тип данных int;
'id_books'тип данных int;
______________________________________________________
Сиды
BookSeeder включает в себя (Названия,автора,даты публикации, статуса книги, картинки (ссылки)). Пример указан ниже. 
'name' => 'Капитанская дочка',
'author' => 'Александр Пушкин',
'year_of_publication' => 1836,
'availability' => 'Доступно',
'image'=>'https://cdn.skidka-msk.ru/images/prodacts/250/61740/61740402.jpg',
UsersSeeder включает в себя (имя пользователя, почту, пароль и роль аккаунту(админ/пользователь)).Черед сид мы добавляем только админа.
'username' => 'admin',
'email' => 'admin@123.ru',
'password' => bcrypt(1234),
'role'=>'admin'
_____________________________________________
Роуты
Route::get('/', 'HomeController@index')->name('home.index'); - отображение основной страницы
Route::get('/reserve-book/{id}', 'BookController@ReserveBook')->name('ReserveBook'); - бронирование книги по айди
Route::get('/my-books', 'BookController@ShowBooks')->name('ShowBooks'); - отображение раннее забронированных книг
Route::get('/return-book/{id}', 'BookController@ReturnBook')->name('ReturnBook'); - возврат раннее забронированных книг
Route::get('/search-book-for-name', 'BookController@SearchBookForName')->name('SearchBookForName'); - поиск по названию книги
Route::get('/search-book-for-id', 'BookController@SearchBookForId')->name('SearchBookForId'); - поиск по айди книги 
_________________________________________
Роуты которые доступны только админу
Route::get('/admin-panel', 'AdminPanelController@showAdminPanel')->name('admin.dashboard'); - отображение админ панели
Route::get('/admin-panel-edit-book/{id}', 'AdminPanelController@CheckBookAdmin')->name('admin.checkBook'); - дополнительная информация о книге
Route::get('/edit-to-base-book/{id}', 'AdminPanelController@EditBookAdmin')->name('admin.editBook'); - редактирование данных о книги в бд
Route::get('/admin-panel-delete-book/{id}', 'AdminPanelController@DeleteBookAdmin')->name('admin.deleteBook'); - удаление книги в бд
Route::get('/admin-panel-add-books', 'AdminPanelController@AddBookAdmin')->name('admin.addBook'); - открытие страницы с добавленем книги
Route::get('/admin-panel-add-to-base-book', 'AdminPanelController@AddToBaseBookAdmin')->name('admin.addToBaseBook'); - добавление книги в бд








