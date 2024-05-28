@extends('app')
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
        @if ($Book->availability == 'забронировано')
            <p style="position: relative;margin-top:22%;height: 25px;width: 15%;margin-left: -11%;" >Недоступно</p>
        @else
            <button style=" position:relative;margin-top:22%;height: 25px;width: 15%;margin-left: -11%;border: 0px solid #FFFFFF;color:#1d2124;font-size: 15px;" id="{{$Book->id}}" onclick='myFunction(this.id)'>Забронировать</button>
        @endif
    @endforeach
</div>
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

<script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
    document.getElementById('myButton').onclick = myFunction;
    function myFunction(id) {
        $.ajax({
            url: '/reserve-book/'+id,         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {id:id},     /* Данные передаваемые в массиве */
            success: function(response){
                alert(response.message);/* функция которая будет выполнена после успешного запроса.  */
            }
        });
    }
</script>
