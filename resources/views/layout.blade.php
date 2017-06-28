<!DOCTYPE html>
  <html>
    <head>
      <title>Lydia - test </title>
        <link href="{{ asset('css/app.scss') }}" rel="stylesheet" type="text/css" >

        <style>
          html, body {
            height: 100%;
          }

          body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            /*font-family: 'Lato';*/
            font-family: ProximaNova-Regular, "Helvetica Neue", Helvetica, Arial, sans-serif;
          }

          .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
          }

          .content {
            text-align: left;
            display: inline-block;
          }

          .title {
            margin-top: 130px;
            font-size: 50px;
          }

          h3 {
            font-size: 20px;
            font-weight: 250;
            color: #1f76b9;
            margin-top: 80px;
          }

          table {
            width: 100%;
            display: table;
            border-collapse: separate;
            padding: 10px;
            border-spacing: 50px;
            border-bottom: 2px solid #1f76b9;
          }

          thead {
            color: #1f76b9;
          }

          .navbar {
            background-color: #1f76b9;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            position: fixed;
            left: 0px;
            top: 0px;
            z-index: 9;
            width: 100%;
          }

          .primary-button {
            color: white;
            border: 1px solid white;
            padding: 10px 15px;
            border-radius: 50px;
            font-weight: lighter;
            opacity: 0.6;
            text-decoration: none;
          }

          .primary-button:hover{
            opacity: 1;
            text-decoration: none;
            color: white;
          }

          .secondary-button {
            color: #666666;
            border: 1px solid #666666;
            padding: 10px 15px;
            border-radius: 50px;
            font-weight: lighter;
            opacity: 0.6;
            text-decoration: none;
          }

          .secondary-button:hover{
            opacity: 1;
            text-decoration: none;
            color: #666666;
          }

        </style>
    </head>
    <body>
      <div class="navbar">
        <a class="primary-button" href="http://localhost:8000/">Make a payment request</a>
        <a class="primary-button" href="http://localhost:8000/status">See all payment requests status</a>
      </div>
      <div class="container">
        <div class="title">Welcome to Lydia!</div>
          <div class="content">
            @yield('content')
        </div>
      </div>
    </body>
  </html>
