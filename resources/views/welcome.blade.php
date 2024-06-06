<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-layout>

    <head>
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                flex-direction: column;
            }

            .button {
                background-color: #00aaff;
                color: white;
                padding: 15px 30px;
                margin: 10px;
                border: none;
                border-radius: 5px;
                text-align: center;
                text-decoration: none;
                font-size: 16px;
                transition: background-color 0.3s ease;
            }

            .button:hover {
                background-color: #0088cc;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <a href="/production" class="button">Resume</a>
            <a href="#" class="button">New game session</a>
        </div>
    </body>
</x-layout>

</html>
