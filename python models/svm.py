


# Commented out IPython magic to ensure Python compatibility.
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
# %matplotlib inline



bankdata = pd.read_csv("/content/COVID-19.csv")

bankdata.shape

bankdata.head()

X = bankdata.drop('Label', axis=1)
y = bankdata['Label']

from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.25)

from sklearn.svm import SVC
svclassifier = SVC(kernel='linear')
svclassifier.fit(X_train, y_train)

y_pred = svclassifier.predict(X_test)

from sklearn.metrics import classification_report, confusion_matrix
print(confusion_matrix(y_test,y_pred))
print(classification_report(y_test,y_pred))


#####################
import pickle
import cv2
import numpy as np
import keras
import sys
import os
text_field = "/content/wahedbs.csv"
file_name = "SVM.pkl"
with open(file_name, "wb") as open_file:
    pickle.dump(svclassifier, open_file)
loaded_model = pickle.load(open(file_name, 'rb'))
result1 = loaded_model.score(X_test, y_test)
text=np.array(135, dtype=None)
text[0]=  pd.read_csv(text_field)
#how can we read textfield?????????????????????????????
predict_result = result1.predict(text)
if predict_result_max[0] == 0:
    result = predict_result
    for i in range(len(result[0])):
        print(",")
        print(result[0][i])
