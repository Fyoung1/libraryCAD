<title>fyoungproject</title>

<div class="paramsHeader">
    <h1 style="margin-left: 4%;width: 15%;height: 4%;margin-top:-0.5%;"><a href='/' style="text-decoration: none; color: initial;"> library</a></h1>
    <form action="" class="search-bar" style="position: relative;top:70%;">
        <input type="search" name="search" pattern=".*\S.*" required>
        <button class="search-btn" type="submit" style="border: 0px solid #FFFFFF;color:#888a85;">
            <span>Найти</span>
        </button>
    </form>
    @guest
        <a href="/login" style="position: relative; left: 4.5%; text-decoration: none; color: initial;font-size: 20px;margin-top: 1%;" class="button1">Войти</a>
    @endguest
    @auth
        <a href="/logout" style="position: relative; left: 4.5%; text-decoration: none; color: initial;font-size: 20px;margin-top: 1%;" class="button1">Выйти</a>
        <a href="/my-books" style="position: relative; left: -5%; text-decoration: none; color: initial;font-size: 20px;margin-top: -1.3%;" class="button1">Ваши книги</a>
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
    .search-bar
    {
        position: relative;
        margin-top: -50px;
        width: 40%;
        margin-left: 20%;

    }
    .button1
    {
        width: 10%;
        display: flex;
        margin-left: 90%;
        margin-top: -50px;
    }

    .button1
    {
        /*display: flex;*/
        /*width: 4%;*/
        /*margin-left: 118px;*/
    }

    nav ul {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        position: relative;
    }

    nav ul li a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #333;
    }

    nav ul li:hover > a {

    }

    nav ul li ul {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;

        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    nav ul li:hover > ul {
        display: block;
    }

    nav ul li ul li {
        width: 100%;
    }

    nav ul li ul li a {
        padding: 15px;
        color: #1d2124;
    }

    nav ul li ul li a:hover {
        background-color: #666;
    }

</style>
