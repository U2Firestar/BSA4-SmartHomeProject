from flask import Flask, request
from flask_cors import CORS, cross_origin
from markupsafe import escape
import json
import re
import logging

logging.basicConfig(filename = 'logs/logger.log', level=logging.DEBUG, format=f'%(asctime)s %(levelname)s %(name)s %(threadName)s : %(message)s')


app = Flask(__name__)
CORS(app)

validItemName = re.compile("[A-Za-z0-9_-]+")


lights = {}
shutters = {}

try:
	with open('jsonDB/lights.json') as json_file:
		lights = json.load(json_file)
except FileNotFoundError:
	pass

try:
	with open('jsonDB/shutters.json') as json_file:
		shutters = json.load(json_file)
except FileNotFoundError:
	pass



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
@cross_origin()
def lightX_put(item):
	global lights
	if item in lights:
		# update light:
		state = request.args.get("state")
		try:
			lights[item] = int(state)
		except ValueError:
			lights[item] = 0
		write_lights()
		return str(lights[item])
	else:
		# resource not found:
		return f"{escape(item)} not found."

@app.route('/resource/lights/<item>',methods=['POST'])
@cross_origin()
def lightX_post(item):
	global lights
	# check if item name only contains letters and numbers:
	if validItemName.fullmatch(item) is not None:
		# adds the new item, if it did already exist value is set to 0:
		lights[item] = 0
		write_lights()
		return str(0)
	else:
		return "Invalid name."

@app.route('/resource/lights/<item>',methods=['DELETE'])
@cross_origin()
def lightX_delete(item):
	global lights
	if item in lights:
		# remove entry with key <item>:
		del lights[item];
		write_lights()
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
@cross_origin()
def shutterX_put(item):
	global shutters
	if item in shutters:
		# update resource:
		state = request.args.get("state")
		try:
			shutters[item] = int(state)
		except ValueError:
			shutters[item] = 0
		write_shutters()
		return str(shutters[item])
	else:
		# resource not found:
		return f"{escape(item)} not found."

@app.route('/resource/shutters/<item>',methods=['POST'])
@cross_origin()
def shutterX_post(item):
	global shutters
	# check if item name only contains letters and numbers:
	if validItemName.fullmatch(item) is not None:
		# adds the new item, if it did already exist value is set to 0:
		shutters[item] = 0
		write_shutters()
		return str(0)
	else:
		return "Invalid name."

@app.route('/resource/shutters/<item>',methods=['DELETE'])
@cross_origin()
def shutterX_delete(item):
	global shutters
	if item in shutters:
		# remove entry with key <item>:
		del shutters[item];
		write_shutters()
		return f"Removed {escape(item)}."
	else:
		return f"{escape(item)} not found."


def write_lights():
	with open('jsonDB/lights.json', 'w') as outfile:
		json.dump(lights, outfile, indent=4)

def write_shutters():
	#print("Writing shutters ... ")
	with open('jsonDB/shutters.json', 'w') as outfile:
		json.dump(shutters, outfile, indent=4)



if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)


