@extends('page.Admin.adminapp')

@section('content')
    <div class="ShowBooks">
    <form class="formAddBook">
        <h3 style="position: relative;top:22%;left:-135%;">Название:</h3>
        <div class="input-data">
            <input type="text" name="name" required>
            <div class="underline"></div>
            <label for=""></label>
        </div>
        <h3 style="position: relative;top:17%;left:-135%;">Автор:</h3>
        <div class="input-author">
            <input type="text" name="author" required>
            <div class="underline"></div>
            <label for=""></label>
        </div>
        <h3 style="position: relative;top:12%;left:-140%;">Дата публикации:</h3>
        <div class="input-year">
            <input type="text" name="year_of_publication" required>
            <div class="underline"></div>
            <label for=""></label>
        </div>
        <h3 style="position: relative;top:8%;left:-140%;">Фото:</h3>
        <div class="input-status">
            <input type="text" name="image" required>
            <div class="underline"></div>
            <label for=""></label>
        </div>
    </form>
        <button style=" position:relative;margin-top:33%;height: 25px;width: 15%;left: -35%;border: 0px solid #FFFFFF;color:#1d2124;font-size: 15px;"  onclick='myFunctionAddBook()'>Добавить</button>
    </div>
    <a style="position: relative;top:-90%;left:10%;text-decoration: none; color: initial;" href="/admin-panel">Назад</a>
@endsection

<style>
    .ShowBooks
    {
        position: relative;
        display: flex;
        width: 70%;
        height: 100%;
        margin-left: 20%;
        margin-top: 2%;
    }
    label {
        position: absolute;
        top: 10px;
        left: 0;
        color: #333;
        transition: top 0.3s, font-size 0.3s;
    }
    .input-data {
        position: relative;
        margin-bottom: 20px;
        top: 17.5%;
        left: -80%;

    }
    .input-data input {
        width: 70%;
        padding: 6px;
        border: 1px solid #FFFFFF; /* цвет и толщина границы */
        border-bottom: 1px solid #888a85;
        border-radius: 1px; /* радиус закругления углов */
        outline: none;
    }
    .input-data input:focus + .underline {
        transform: scaleX(1);
    }
    .input-data input:focus + .underline + label {
        top: -10px;
        font-size: 12px;
        color: #007bff;
    }
    .input-author{
        position: relative;
        top: 12%;
        margin-left: -90%;
        margin-bottom: 20px;
    }

    .input-author input  {
        width: 50%;
        padding: 6px;
        border: 1px solid #FFFFFF; /* цвет и толщина границы */
        border-bottom: 1px solid #888a85;
        border-radius: 1px; /* радиус закругления углов */
        outline: none;
    }
    .input-author input:focus + .underline {
        transform: scaleX(1);
    }

    .input-author input:focus + .underline + label {
        top: -10px;
        font-size: 12px;
        color: #007bff;
    }
    .input-year{
        position: relative;
        top: 7%;
        margin-left: -45%;
        margin-bottom: 20px;
    }

    .input-year input  {
        width: 50%;
        padding: 6px;
        border: 1px solid #FFFFFF; /* цвет и толщина границы */
        border-bottom: 1px solid #888a85;
        border-radius: 1px; /* радиус закругления углов */
        outline: none;
    }
    .input-year input:focus + .underline {
        transform: scaleX(1);
    }

    .input-year input:focus + .underline + label {
        top: -10px;
        font-size: 12px;
        color: #007bff;
    }
    .input-status{
        position: relative;
        top: 2.5%;
        margin-left: -95%;
        margin-bottom: 20px;
    }

    .input-status input  {
        width: 50%;
        padding: 6px;
        border: 1px solid #FFFFFF; /* цвет и толщина границы */
        border-bottom: 1px solid #888a85;
        border-radius: 1px; /* радиус закругления углов */
        outline: none;
    }
    .input-status input:focus + .underline {
        transform: scaleX(1);
    }

    .input-status input:focus + .underline + label {
        top: -10px;
        font-size: 12px;
        color: #007bff;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    function myFunctionAddBook() {
        const form = document.querySelector('.formAddBook');
        const formData = new FormData(form);

        const name = formData.get('name');
        const author = formData.get('author');
        const year_of_publication = formData.get('year_of_publication');
        const image = formData.get('image');

        console.log(name, author, year_of_publication, image);

        $.ajax({
            url: '/admin-panel-add-to-base-book/',         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                name:name,
                author:author,
                year_of_publication:year_of_publication,
                image:image,
            },     /* Данные передаваемые в массиве */
            success: function(response){   /* функция которая будет выполнена после успешного запроса.  */
                alert(response.message);/* функция которая будет выполнена после успешного запроса.  */
            }
        });

    }
</script>
