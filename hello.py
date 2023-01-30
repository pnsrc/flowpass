from datetime import datetime
import json
import requests
from telethon import TelegramClient
from flask import Flask, redirect, url_for, request
import asyncio

app = Flask(__name__)


# Use your own values from my.telegram.org
api_id = 27545814
api_hash = '448eb58661df26ab01bb12fed724a922'
loop = asyncio.new_event_loop()
asyncio.set_event_loop(loop)
client = TelegramClient('anon', api_id, api_hash, loop=loop)
client.start()


async def getYou():
    return await client.send_message('me', 'Настройка сервера для отправки сообщений в Telegram\nУспешно настроенна и запущена.')


async def send_notification(usernumber, text):
    return await client.send_message(usernumber, text)

# Function for get data POST


def index():
    # send message to telegram
    loop.run_until_complete(getYou())
    return 'Server is running'


@app.route('/api/send/scanit', methods=['POST'])
def send_login():
    if request.method == 'POST':
        # Get "user_token" from POST
        user_token = request.form['token']
        # Отправляем данный токен по адресу в виде post body
        url = 'https://flowpass.ru/api/get.pass'
        data = {'token': user_token}
        send = requests.post(url, data)
        # Преобразуем ответ в строковую переменную
        data = json.loads(send.text)
        now = str(datetime.now())
        message = 'Здравствуйте, '+data['fio'] + \
            '!\nВаш пропуск был отсканирован. Если это были не вы, пожалуйста, обратитесь к администратору системы\nВремя сканирования ' + now + '\nВаш flowpass'
        # Find row ten
        telegram_telephone = str(int(data['tel']))
        loop.run_until_complete(send_notification(
            '+' + telegram_telephone, message))
        return '{"status": "success"}'