<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сообщение с сайта</title>
    <style>
        body { font-family: sans-serif; line-height: 1.5; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .field { margin-bottom: 1em; }
        .label { font-weight: bold; color: #555; }
        .message { white-space: pre-wrap; padding: 12px; background: #f5f5f5; border-radius: 6px; }
        hr { border: none; border-top: 1px solid #ddd; margin: 20px 0; }
    </style>
</head>
<body>
    <p>На сайте получено новое сообщение через форму обратной связи.</p>
    <hr>
    <div class="field">
        <span class="label">Имя:</span><br>
        {{ $contactMessage->name }}
    </div>
    <div class="field">
        <span class="label">E-mail:</span><br>
        <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
    </div>
    @if($contactMessage->company)
    <div class="field">
        <span class="label">Компания:</span><br>
        {{ $contactMessage->company }}
    </div>
    @endif
    @if($contactMessage->phone)
    <div class="field">
        <span class="label">Телефон:</span><br>
        {{ $contactMessage->phone }}
    </div>
    @endif
    @if($contactMessage->subject)
    <div class="field">
        <span class="label">Тема:</span><br>
        {{ $contactMessage->subject }}
    </div>
    @endif
    <div class="field">
        <span class="label">Сообщение:</span><br>
        <div class="message">{{ $contactMessage->message }}</div>
    </div>
    <hr>
    <p style="font-size: 12px; color: #888;">Это письмо отправлено автоматически с сайта. Ответьте отправителю по указанному e-mail.</p>
</body>
</html>
