<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Freight Exchange</title>

        <!-- Styles -->
        <style>
            html, body {
                font-family: sans-serif;
                font-weight: 200;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                /*align-items: center;*/
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                min-width: 70vw;

            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content" id="app">
                <locale-switcher></locale-switcher>
                <router-view></router-view>
                {{--<load-list-component></load-list-component>--}}
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>
<script>
    import LocaleSwitcher from "../js/components/LocaleSwitcher";
    export default {
        components: {LocaleSwitcher}
    }
</script>