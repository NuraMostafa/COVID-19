from flask import Flask, jsonify, request, flash
from werkzeug.utils import secure_filename
from cnnct import classify
app = Flask(__name__)


@app.route('/uploadText', methods=['POST'])
def uploadText():
    text = request.form['mytext']
    print(text)
    return text


@app.route('/uploadImage', methods=['POST'])
def upload_file():
    file = request.files['file']
    route = "rgb_img.jpg"
    file.save(route)
    return 'recieved'


@app.route('/uploadVideo', methods=['POST'])
def uploadVideo():
    file = request.files['file']
    route = "video.mp4"
    file.save(route)
    return 'recieved'


@app.route('/uploadImageAndText', methods=['POST'])
def uploadImageAndText():
    file = request.files['file']
    text = request.form['mytext']
    route = "rgb_img.jpg"
    file.save(route)
    print(text)
    return text


@app.route('/uploadImages', methods=['POST'])
def uploadImages():
    for fileName in request.files:
        file = request.files[fileName]
        file.save("images/" + fileName + ".jpg")
    return 'recieved'


if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5000, debug=True)

