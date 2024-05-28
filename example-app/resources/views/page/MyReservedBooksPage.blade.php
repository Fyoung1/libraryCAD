@extends('app')

@section('content')
    <div class="ShowMyBooks">
        @foreach($MyBooks as $MyBook)
            <input type="hidden" value="{{ $MyBook->id }}" name="id">
            <input type="hidden" value="{{ $MyBook->name }}" name="name">
            <input type="hidden" value="{{ $MyBook->author }}" name="author">
            <input type="hidden" value="{{ $MyBook->year_of_publication }}"  name="year_of_publication">
            <input type="hidden" value="{{ $MyBook->availability }}" name="availability">
            <input type="hidden" value="{{ $MyBook->image }}" name="image">
            <img style="width: 150px;height: 150px;" src="{{ url($MyBook->image) }}" alt="" class="">
            <p style="position: relative;margin-top: 13%;margin-left: -10%;width: 15%;" >{{ $MyBook->name}}</p>
            <p style="position: relative;margin-top: 16%;margin-left: -15%;width: 16%;">{{$MyBook->author }}</p>
            <p style="position: relative;margin-top: 19%;margin-left: -16%;width: 15%;">{{$MyBook->year_of_publication}} г.</p>
            <button style=" position:relative;margin-top:22%;height: 25px;width: 15%;margin-left: -19%;border: 0px solid #FFFFFF;color:#1d2124;font-size: 15px;" id="{{$MyBook->id}}" onclick='myFunctionReturnBook(this.id)'>Вернуть</button>
        @endforeach
    </div>
@endsection

<style>
    .ShowMyBooks
    {
        position: relative;
        display: flex;
        width: 70%;
        height: 100%;
        margin-left: 20%;
        margin-top: 4%;
    }
</style>
<script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    document.getElementById('myButton').onclick = myFunction;
    function myFunctionReturnBook(id) {
        $.ajax({
            url: '/return-book/'+id,         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {id:id},     /* Данные передаваемые в массиве */
            success: function(response){
                alert(response.message);/* функция которая будет выполнена после успешного запроса.  */
            }
        });
    }
</script>

