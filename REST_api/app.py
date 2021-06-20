from flask import Flask, request
from markupsafe import escape
import json

app = Flask(__name__)


# a Python object (dict):
# TODO make persistent in json file
lights = {
	"light1": 0,
	"light2": 30, 
	"light3": 100
}

shutters = {
	"shutter1": 60,
	"shutter2": 80
}

# lights: ----------------------------------------------
# all lights: 
@app.route('/resource/lights',methods=['GET'])
def lights_get():
	# convert into JSON:
	x = json.dumps(lights)
	# the result is a JSON string:
	return x

# one specific light:
@app.route('/resource/lights/<item>',methods=['GET'])
def lightX_get(item):
	if item in lights:
		return str(lights[item])
	else:
		return f"Can't find {escape(item)}."

@app.route('/resource/lights/<item>',methods=['PUT'])
def lightX_put(item):
	global lights
	if item in lights:
		# update light:
		state = request.args.get("state")
		try:
			lights[item] = int(state)
		except ValueError:
			lights[item] = 0	
		return str(lights[item])
	else:
		# resource not found:
		return f"{escape(item)} not found."

@app.route('/resource/lights/<item>',methods=['POST'])
def lightX_post(item):
	global lights
	if item in lights:
		# set value to 0:
		lights[item] = 0
		return str(0)
	else:
		# add new resource:
		lights[item] = 0
		return str(0)

@app.route('/resource/lights/<item>',methods=['DELETE'])
def lightX_delete(item):
	global lights
	if item in lights:
		# remove entry with key <item>:
		del lights[item]; 
		return f"Removed {escape(item)}."
	else:
		return f"{escape(item)} not found."


# shutters: -------------------------------------------------
# all shutters: 
@app.route('/resource/shutters',methods=['GET'])
def shutters_get():
	# convert into JSON:
	x = json.dumps(shutters)
	# the result is a JSON string:
	return x

# one shutter: 
@app.route('/resource/shutters/<item>',methods=['GET'])
def shutterX_get(item):
	if item in shutters:
		return str(shutters[item])
	else:
		return f"Can't find {escape(item)}."

@app.route('/resource/shutters/<item>',methods=['PUT'])
def shutterX_put(item):
	global shutters
	if item in shutters:
		# update resource:
		state = request.args.get("state")
		try:
			shutters[item] = int(state)
		except ValueError:
			shutters[item] = 0
		return str(shutters[item])
	else:
		# resource not found:
		return f"{escape(item)} not found."

@app.route('/resource/shutters/<item>',methods=['POST'])
def shutterX_post(item):
	global shutters
	if item in shutters:
		# set value to 0:
		shutters[item] = 0
		return str(0)
	else:
		# add new resource:
		shutters[item] = 0
		return str(0)

@app.route('/resource/shutters/<item>',methods=['DELETE'])
def shutterX_delete(item):
	global shutters
	if item in shutters:
		# remove entry with key <item>:
		del shutters[item]; 
		return f"Removed {escape(item)}."
	else:
		return f"{escape(item)} not found."


if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)

