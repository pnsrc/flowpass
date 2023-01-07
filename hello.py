from datetime import datetime
from telethon import TelegramClient
import mariadb
import sys
from flask import Flask, redirect, url_for, request
import asyncio

app = Flask(__name__)


# Use your own values from my.telegram.org
api_id = 27545814
api_hash = '448eb58661df26ab01bb12fed724a922'


# Connect to MariaDB Platform
try:
    conn = mariadb.connect(
        user="root",
        password="",
        host="localhost",
        port=3306,
        database="pass"

    )
except mariadb.Error as e:
    print(f"Error connecting to MariaDB Platform: {e}")
    sys.exit(1)

# Get Cursor
cur = conn.cursor()

loop = asyncio.new_event_loop()
asyncio.set_event_loop(loop)
client = TelegramClient('anon', api_id, api_hash, loop=loop)
client.start()

async def getYou():
    return await client.send_message('me', 'Whoami')

async def send_notification(usernumber, text):
    return await client.send_message(usernumber, text)


@app.route('/')
def index():
    # send message to telegram
    loop.run_until_complete(getYou())
    return 'Message sent'

@app.route('/api/send/scanit', methods=['POST'])
def send_login():
    if request.method == 'POST':
        token = request.form['token']
        cur.execute("SELECT * FROM pass WHERE token = ?", (token,))
        row = cur.fetchone()
        if row is None:
            return 'Token not found'
        else:
            username = row[1]
            #Return time
            now = str(datetime.now())
            message = 'Здравствуйте, '+username+'!\nВаш пропуск был отсканирован. Если это были не вы, пожалуйста, обратитесь к администратору системы\nВремя сканирования '+ now +'\nВаш flowpass'
            # Find row ten
            usernumber = row[10]
            telegram_telephone = str(int(usernumber))
            loop.run_until_complete(send_notification('+'+ telegram_telephone, message))
            return '{"status": "success"}'

@app.route('/api/send/actions', methods=['POST'])
def send_actions():
    if request.method == 'POST':
        token = request.form['token']
        cur.execute("SELECT * FROM admins WHERE token = ?", (token,))
        row = cur.fetchone()
        if row is None:
            return '{"error": "Token not found"}'
        else:
            username = row[3]
            message = 'Здравствуйте, '+username+'!\nВы выполнили действие в системе flowpass\nВаш flowpass'
            # Find row ten
            usernumber = row[10]
            telegram_telephone = str(int(usernumber))
            loop.run_until_complete(send_notification('+'+ telegram_telephone, message))
            return '{"status": "success"}'

@app.route('/api/send/auth', methods=['POST'])
def send_auth():
    if request.method == 'POST':
        token = request.form['token']
        cur.execute("SELECT * FROM admins WHERE token = ?", (token,))
        row = cur.fetchone()
        if row is None:
            return '{"error": "Token not found"}'
        else:
            username = str(row[3])
            message = 'Здравствуйте, '+username+'!\nВы авторизовались в системе flowpass\nЕсли это были не вы, удалите вашу учетную запись и добавьте заново\nВаш flowpass'
            # Find row ten
            usernumber = row[10]
            telegram_telephone = str(int(usernumber))
            loop.run_until_complete(send_notification('+'+ telegram_telephone, message))
            return '{"status": "success"}'