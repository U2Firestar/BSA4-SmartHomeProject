from flask import Flask, request
from markupsafe import escape
from flask import render_template

app = Flask(__name__)

light_on = True

#Vorschlag Anfang
global temp_states = [["/lights/light1", "/lights/light2",], [100, 0]]

#TODO: HTTP-METHODEN NOCH GENAUER ANSCHAUEN
@app.route('/lights/')
def all_lights_request():
	#Hier kommt das JSON
    return 'Hello World!'

@app.route('/lights/<string:item>')
def lights_request(item):
	x = item
	#Abgleich und Auswertung
    return 'Hello World!'

#Vorschlag Ende

@app.route('/')
def hello_world():
    return 'Hello World!'

@app.route("/home",methods=['GET'])
def home_index():
    return render_template('index.html')

@app.route('/home/temp',methods=['GET'])
def current_temp():
    #temp=round(sense.get_temperature(),2)
    temp = 22.35
    return str(temp)+"\n"

@app.route('/home/light',methods=['GET'])
def light_get():
	return render_template('kitchenlight_off.html')

@app.route("/home/shutters",methods=['GET'])
def shutters_get():
    return render_template('child.html')

@app.route('/home/light',methods=['POST'])
def light_post():
    global light_on
    state=request.args.get('state')
    print(state)
    if (state=="on"):
        return render_template('kitchenlight_on.html')
    else:
        return render_template('kitchenlight_off.html')

if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)

