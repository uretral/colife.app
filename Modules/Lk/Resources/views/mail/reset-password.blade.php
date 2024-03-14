<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>{{ config('app.name') }}</title>
</head>

<body>
<div class="wrapper">
    <img src="https://static.tildacdn.com/tild6465-3063-4236-a134-636334646533/Logo.png"
         style="max-width: 70px; width: 70px; min-width: 70px; height: auto; display: block;"
    >
    <div class="content">
        <h2>{{ @$data['title']  }}</h2>
        <p>{{ @$data['description'] }}
            <span class="expires">{{ @$data['expires'] }}</span>
        </p>
        <div class="link"><a href="{{ @$data['url'] }}" target="_blank">{{ @$data['btn'] }}</a></div>

        <p>
            <small style="color: lightgrey"><i>{{ @$data['footer'] }}</i></small>
        </p>
    </div>
</div>



<style>
    body {
        min-height: 600px;
        background: #e3e3e3;
        margin: 0;
        padding: 0;
        font-style: normal;
        font-stretch: normal;
        text-decoration: none;
        font-weight: 300;
        font-size: 15px;
    }
    .wrapper {
        padding: 40px;
        max-width:600px;
        min-width:500px;
        margin: 40px auto;
        background: #fff;
        border-radius: 10px;
    }
    .content {
       padding:30px 30px 30px 0;
        text-align: left;
    }
    p{
        line-height: 2em;
        padding: 10px 10px 10px 0;
    }

    .link {
        width: 100%;
        text-align: center;
    }

    .expires{
        font-size: 14px; color: grey;
        margin-bottom: 20px;
    }



    a {
        text-align: left;
        color: white;
        background: #f38e2d;
        padding: 2%;
        text-decoration: none;
        font-weight: 300;
    }

    .logo {
        background: #fff;
        margin-top: 40px;
        height: 40px;
        width: 100%;
    }

</style>

</body>
</html>
