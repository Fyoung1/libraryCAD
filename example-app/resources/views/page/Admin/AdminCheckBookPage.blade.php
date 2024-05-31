@extends('page.Admin.adminapp')


@section('content')
        <div class="ShowBooks">
                <input type="hidden" value="{{ $CheckBookAdmin->id }}" name="id">
                <input type="hidden" value="{{ $CheckBookAdmin->name }}" name="name">
                <input type="hidden" value="{{ $CheckBookAdmin->author }}" name="author">
                <input type="hidden" value="{{ $CheckBookAdmin->year_of_publication }}"  name="year_of_publication">
                <input type="hidden" value="{{ $CheckBookAdmin->availability }}" name="availability">
                <input type="hidden" value="{{ $CheckBookAdmin->image }}" name="image">
                <img style="width: 150px;height: 150px;" src="{{ url($CheckBookAdmin->image) }}" alt="" class="">
            <h3 style="position: relative;top:16%;left:-13%;">Название:</h3>
            <form class="formInfoBook">
            <div class="input-data">
                <input type="text" name="name" required>
                <div class="underline"></div>
                <label for="">{{$CheckBookAdmin->name}}</label>
            </div>
            <h3 style="position: relative;top:17%;left:-135%;">Автор:</h3>
            <div class="input-author">
                <input type="text" name="author" required>
                <div class="underline"></div>
                <label for="">{{$CheckBookAdmin->author}}</label>
            </div>
            <h3 style="position: relative;top:12%;left:-140%;">Дата публикации:</h3>
            <div class="input-year">
                <input type="text" name="year_of_publication" required>
                <div class="underline"></div>
                <label for="">{{$CheckBookAdmin->year_of_publication}} г.</label>
            </div>
            <h3 style="position: relative;top:8%;left:-140%;">Статус:</h3>
            <div class="input-status">
                <input type="text" name="status" required>
                <div class="underline"></div>
                <label for="">{{$CheckBookAdmin->availability}}</label>
            </div>
            </form>
                <button style=" position:relative;margin-top:26%;height: 25px;width: 15%;left: -35%;border: 0px solid #FFFFFF;color:#1d2124;font-size: 15px;" id="{{$CheckBookAdmin->id}}" onclick='myFunctionEditBook(this.id)'>Сохранить</button>
        </div>
        <a style="position: relative;top:-100%;left:10%;text-decoration: none; color: initial;" href="/admin-panel">Назад</a>
@endsection


<style>
    .ShowBooks
    {
        position: relative;
        display: flex;
        width: 70%;
        height: 100%;
        margin-left: 20%;
        margin-top: 4%;
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
        width: 40%;
        padding: 6px;
        border: 1px solid #FFFFFF; /* цвет и толщина границы */
        border-bottom: 0px solid #888a85;
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
        border-bottom: 0px solid #888a85;
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
        border-bottom: 0px solid #888a85;
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
        border-bottom: 0px solid #888a85;
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
    function myFunctionEditBook(id) {
        const form = document.querySelector('.formInfoBook');
        const formData = new FormData(form);

        const name = formData.get('name');
        const author = formData.get('author');
        const year_of_publication = formData.get('year_of_publication');
        const availability = formData.get('status');

        console.log(name, author, year_of_publication, availability,id);

        $.ajax({
            url: '/edit-to-base-book/'+id,         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                name:name,
                author:author,
                year_of_publication:year_of_publication,
                availability:availability,
            },     /* Данные передаваемые в массиве */
            success: function(response){   /* функция которая будет выполнена после успешного запроса.  */
                alert(response.message);/* функция которая будет выполнена после успешного запроса.  */
            }
        });

    }
</script>
