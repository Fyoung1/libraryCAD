<title>fyoungproject</title>

<div class="paramsHeader">
    <h1 style="margin-left: 4%;width: 15%;height: 4%;margin-top:-0.5%;"><a href='/' style="text-decoration: none; color: initial;"> library</a></h1>
    @guest
        <a href="/login" style="position: relative; left: 4.5%; text-decoration: none; color: initial;font-size: 20px;margin-top: 1%;" class="button1">Войти</a>
    @endguest
    @auth
        <a href="/logout" style="position: relative; left: 4.5%; text-decoration: none; color: initial;font-size: 20px;margin-top: 1%;" class="button1">Выйти</a>
        <a href="/admin-panel-add-books" style="position: relative; left: -5%; text-decoration: none; color: initial;font-size: 20px;margin-top: -1.3%;" class="button1">Добавить книгу</a>
    @endauth
</div>

<style>
    .paramsHeader
    {
        position: fixed;
        top:3%;
        width: 100%;
        height: 6%;
        background: #FFFFFF;
        left: 0;
        border-bottom: 1px solid #888a85;
        box-sizing: border-box;
        /*overflow: hidden;*/
    }
    .button1
    {
        width: 10%;
        display: flex;
        margin-left: 90%;
        margin-top: -50px;
    }
</style>

