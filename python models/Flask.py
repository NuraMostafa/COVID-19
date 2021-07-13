from flask import Flask, jsonify, request, flash, render_template
from werkzeug.utils import secure_filename
from cnnct import classify
from pneumonia import classifypneumonia
from SVM import classifytests
import csv
from jinja2 import Template
app = Flask(__name__,template_folder='templates')


@app.route('/uploadText', methods=['POST'])
def uploadText():
    CRP = request.form['CPR']
    Ferritin = request.form['Ferritin']
    LDH = request.form['LDH']
    ALT = request.form['ALT']
    CBC = request.form['CBC']
    DDimer=request.form['DDimer']
    AST = request.form['AST']
    header = ['CRP', 'Ferritin', 'LDH', 'ALT','CBC','DDimer','AST']
    data = [CRP,Ferritin,LDH,ALT,CBC,DDimer,AST]
    with open('bloodtests.csv', 'w', encoding='UTF8') as f:
        writer = csv.writer(f)
        writer.writerow(header)
        writer.writerow(data)
    predicttests=classifytests('bloodtests.csv')
    return render_template('result.php', myresult=predicttests)


# import csv
#
# header = ['name', 'area', 'country_code2', 'country_code3']
# data = ['Afghanistan', 652090, 'AF', 'AFG']
#
# with open('countries.csv', 'w', encoding='UTF8') as f:
#     writer = csv.writer(f)
#
#     # write the header
#     writer.writerow(header)
#
#     # write the data
#     writer.writerow(data)


@app.route('/uploadImage', methods=['POST'])
def upload_file():
    file = request.files['image']
    route = "rgb_img.jpg"
    file.save(route)
    predictresult=classify(route)
    predictresult2=classifypneumonia(route)
    if predictresult =="Positive Covid":
        return render_template('result.php', myresult=predictresult)
    else:
        return render_template('result.php', myresult=predictresult2)



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

