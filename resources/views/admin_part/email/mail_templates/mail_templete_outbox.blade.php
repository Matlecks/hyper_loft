<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="/css/style.css" rel="stylesheet">
    <title>Отправка email</title>
</head>

<body>
    <div class="">
        <div style="background: #232323; text-align: center;">
            <a href="" style="padding-top: 20px ;text-decoration: none; display: flex; align-items: center; justify-content: center;">
                <img src="http://u1962648.isp.regruhosting.ru/img/logo.png" width="40">
                <div style="font-size: 30px; color:#aa3a24; margin-left: 10px;">
                    FOXIT</div>
            </a>
            <div class="" style="padding-top: 20px; color: #ffffff; font-size: 25px;">Ваша
                Заявка на звонок получена!</div>
            <div class="" style="padding: 30px; color: #ffffff; font-size: 15px;">

                Уважаемый/ая {{ $mess->name }},

                <p>Мы рады сообщить Вам, что мы получили Ваше письмо с заявкой на звонок. Мы ценим
                    Ваш интерес к нашей компании и готовы обсудить все вопросы, которые у Вас
                    возникли.</p>

                <p>Мы всегда готовы помочь нашим клиентам и предоставить им необходимую информацию.
                    Если у Вас есть какие-либо дополнительные вопросы или потребности, не
                    стесняйтесь связаться с нами.</p>

                <p>Спасибо за Ваше обращение. Мы будем рады связаться с Вами в ближайшее время.</p>

                <p>С уважением, команда FOXIT</p>

            </div>

        </div>
    </div>
</body>

</html>
