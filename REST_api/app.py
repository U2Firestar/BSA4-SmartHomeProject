from flask import Flask, request
from markupsafe import escape
import json

app = Flask(__name__)


# a Python object (dict):
# TODO make persistent in json file
resources = {
	"light1": 0,
	"light2": 30, 
	"light3": 100,
	"shutter1": 60,
	"shutter2": 80
}

@app.route('/resources',methods=['GET'])
def resources_get():
	# convert into JSON:
	x = json.dumps(resources)
	# the result is a JSON string:
	return x

@app.route('/resource/<item>',methods=['GET'])
def resourceX_get(item):
	if item in resources:
		return str(resources[item])
	else:
		return f"Can't find {escape(item)}."

@app.route('/resource/<item>',methods=['PUT'])
def resourceX_put(item):
	global resources
	if item in resources:
		# update resource:
		state = request.args.get("state")
		resources[item] = state
		return str(resources[item])
	else:
		# resource not found:
		return f"{escape(item)} not found."

@app.route('/resource/<item>',methods=['POST'])
def resourceX_post(item):
	global resources
	if item in resources:
		# set value to 0:
		resources[item] = 0
		return str(0)
	else:
		# add new resource:
		resources[item] = 0
		return str(0)

@app.route('/resource/<item>',methods=['DELETE'])
def resourceX_delete(item):
	global resources
	if item in resources:
		# remove entry with key <item>:
		del resources[item]; 
		return f"Removed {escape(item)}."
	else:
		return f"{escape(item)} not found."

if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)

