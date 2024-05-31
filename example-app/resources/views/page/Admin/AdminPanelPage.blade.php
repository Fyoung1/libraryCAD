@extends('page.Admin.adminapp')

@section('content')
    <div class="ShowBooks">
    @foreach($Books as $Book)
        <input type="hidden" value="{{ $Book->id }}" name="id">
        <input type="hidden" value="{{ $Book->name }}" name="name">
        <input type="hidden" value="{{ $Book->author }}" name="author">
        <input type="hidden" value="{{ $Book->year_of_publication }}"  name="year_of_publication">
        <input type="hidden" value="{{ $Book->availability }}" name="availability">
        <input type="hidden" value="{{ $Book->image }}" name="image">
        <img style="width: 150px;height: 150px;" src="{{ url($Book->image) }}" alt="" class="">
        <p style="position: relative;margin-top: 13%;margin-left: -10%;width: 15%;" >{{ $Book->name}}</p>
        <p style="position: relative;margin-top: 16%;margin-left: -10%;width: 16%;">{{$Book->author }}</p>
        <p style="position: relative;margin-top: 19%;margin-left: -10%;width: 15%;">{{$Book->year_of_publication}} г.</p>
            <button style=" position:relative;margin-top:25%;height: 25px;width: 15%;margin-left: -11%;border: 0px solid #FFFFFF;color:#1d2124;font-size: 15px;" id="{{$Book->id}}" onclick='myFunctionDeleteBook(this.id)'>Удалить</button>
            <button style=" position:relative;margin-top:22%;height: 25px;width: 15%;margin-left: -11%;border: 0px solid #FFFFFF;color:#1d2124;font-size: 15px;" id="{{$Book->id}}" onclick='myFunction(this.id)'>Подробнее</button>
    @endforeach
    </div>
    <form class="search" style="position: relative;top:-105%;">
        <label>поиск по названию</label>
        <input type="search" name="name">
    </form>
    <button style="position: relative; border: 0px solid #FFFFFF;color:#888a85;top:-109%;left:17%;" onclick="myFunctionSearchBookForName()">Найти</button>
    <form class="searchForId" style="position: relative;top:-105%;">
        <label>поиск по id</label>
        <input type="search" name="id">
    </form>
    <button style="position: relative; border: 0px solid #FFFFFF;color:#888a85;top:-109%;left:15%;" onclick="myFunctionSearchBookForId()">Найти</button>
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
</style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    document.getElementById('myButton').onclick = myFunction;
        function myFunction(id) {
            window.location.href = "{{ route('admin.checkBook', ['id' => ':id']) }}".replace(':id', id);

        }

        function myFunctionDeleteBook(id)
        {
            $.ajax({
                url: '/admin-panel-delete-book/'+id,         /* Куда отправить запрос */
                method: 'get',             /* Метод запроса (post или get) */
                dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
                data: {id:id},     /* Данные передаваемые в массиве */
                success: function(response){
                    alert(response.message);/* функция которая будет выполнена после успешного запроса.  */
                }
            });

        }
    function myFunctionSearchBookForName() {
        const form = document.querySelector('.search');
        const formData = new FormData(form);
        const name = formData.get('name');

        console.log(name);

        $.ajax({
            url: '/search-book-for-name/',         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                name:name,
            },     /* Данные передаваемые в массиве */
            success: function(response){   /* функция которая будет выполнена после успешного запроса.  */
                alert(JSON.stringify(response.message));/* функция которая будет выполнена после успешного запроса.  */
            }
        });
    }
    function myFunctionSearchBookForId() {
        const form = document.querySelector('.searchForId');
        const formData = new FormData(form);
        const id = formData.get('id');

        console.log(id);

        $.ajax({
            url: '/search-book-for-id/',         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                id:id,
            },     /* Данные передаваемые в массиве */
            success: function(response){   /* функция которая будет выполнена после успешного запроса.  */
                alert(JSON.stringify(response.message));/* функция которая будет выполнена после успешного запроса.  */
            }
        });
    }

</script>
