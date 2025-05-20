<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение Email</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #141414;
            color: #F3E5FE; /* white-purple */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #1E1E1E;
            padding: 2rem;
            border-radius: 12px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #CA7FFE; /* secondary-purple */
            margin-bottom: 1rem;
        }
        p {
            margin-bottom: 1.5rem;
        }
        .btn {
            display: inline-block;
            font-size: 1rem; /* text-xl */
            text-align: center;
            /*font-weight: 600; !* font-semibold *!*/
            background-color: #9701FE; /* primary-purple */
            color: #fff;
            text-decoration: none;
            border-radius: 10px; /* rounded-[10px] */
            padding: 1rem;
            transition: background-color 0.3s ease; /* duration-300 */
            cursor: pointer;
            border: none;
        }

        .btn:hover {
            background-color: #7500C5; /* dark-purple */
        }
        .message {
            color: #88ff88;
            margin-bottom: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Подтвердите Email</h1>

    <p>Мы отправили письмо с подтверждением на ваш email.</p>
    <p>Если вы не получили письмо, нажмите кнопку ниже.</p>

    @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn">Отправить письмо ещё раз</button>
    </form>

    <a href="{{ route('home') }}" class="btn" style="margin-top: 15px">Вернуться в магазин</a>
</div>
</body>
</html>
