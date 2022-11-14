import urllib.request
from flask import render_template, request, jsonify, make_response
from core import app


@app.route('/index')
def index():
    return render_template('index.html')


@app.route('/getUrl', methods=['POST', 'GET'])
def getUrl():
    if request.method == 'POST':
        url1 = request.form['url1']
        o = urllib.request.urlopen(url1)
        s = o.read() 
        return make_response(jsonify(s[:50]), 200)
