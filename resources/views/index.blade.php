<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pokemon Hello</title>

        <style>
            /** CSS reset */
            * {
              box-sizing: border-box;
              margin: 0;
            }
            body {
              line-height: 1.5;
              -webkit-font-smoothing: antialiased;
            }
            img {
              display: block;
              max-width: 100%;
            }
            input, button, textarea, select {
              font: inherit;
            }
            /** END CSS reset*/

            body {
                font-family: monospace;
            }

            #app {
                max-width: 1000px;
                margin: 0 auto;
            }

            h1 {
                font-family: cursive;
                font-size: 96px;
                margin-top: 1em;
                text-align: center;
                color: #ffc908;
                text-shadow: 3px 3px 1px #3858a6;
            }
        </style>

        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
