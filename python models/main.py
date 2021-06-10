from flask import Flask, jsonify, request, flash
# from sklearn. import predict
from sklearn.ensemble import RandomForestClassifier
from werkzeug.utils import secure_filename

app = Flask(__name__)


@app.route('/uploadText', methods=['POST'])
def uploadText():
    text = request.form['CPR']
    textFer = request.form['Ferritin']
    textLDH = request.form['LDH']
    textALT = request.form['ALT']
    textCBC = request.form['CBC']
    textDD = request.form['DDimer']
    textAST = request.form['AST']

   /* text1 = str(text)
    text2 = str(textFer)
    text3 = str(textLDH)
    text4 = str(textALT)
    text5 = str(textCBC)
    text6 = str(textDD)
    text7 = str(textAST)*/

    # textt = str(150)
    # print(text)
    # if text >= textCRP and textt >= textFer:
    #  return "Negative"
    # else:
    #  return  "Positive"

    prediction = predict(text1, text2, text3, text4, text5, text6, text7)

    return prediction


@app.route('/uploadImage', methods=['POST'])
def uploadImage():
    image = request.files['image']
    # prediction = predict(image)
    route = "rgb_img.jpg"
    image.save(route)
    return "recieved"


if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5000, debug=True)
