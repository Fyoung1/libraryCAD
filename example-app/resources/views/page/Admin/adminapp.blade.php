<!doctype html>
<html lang="en">

<header style="background: #FFFFFF;position: fixed;top: 0;width: 100%;height: 8%;z-index: 1000;">
    @include('header.AdminHeader')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</header>

<body style="margin: 0;padding: 0;width: 100%;height: 100%">
<main class="container">
    @yield('content')
</main>
</body>
<footer>
</footer>
</html>

<style>
    .container {
        width: 100%;
        height: 100%;
        top:76px;
        position: relative;
    }
</style>
