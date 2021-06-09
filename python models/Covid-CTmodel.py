import cv2
import numpy as np
import os
from keras.models import Sequential
from keras.layers import Conv2D, MaxPooling2D
from keras.layers import Activation, Dropout, Flatten, Dense
from keras import backend as K
import csv
import pickle
from keras.models import Sequential
from keras.layers import Dense, Dropout, Activation
from keras.optimizers import SGD
import pandas as pd
from sklearn.linear_model import LinearRegression
import pickle
from keras.models import load_model
import h5py
import keras
import sys
import tensorflow as tf

img_width, img_height = 224, 224

if K.image_data_format() == 'channels_first': 
  input_shape = (3, img_width, img_height) 
else: 
  input_shape = (img_width, img_height, 3) 


#covidtesting part
read_folder_name = "/content/drive/MyDrive/Dataset/CT_COVID"
with open('covidtest.csv', mode='w') as file:
      writer = csv.writer(file)
      x=(int)(349*0.3)  
      for j in range(x):
        imagecovidtest = os.listdir(read_folder_name )[j]
        writer.writerow([imagecovidtest,"1"])


#covidtranning part
      
read_folder_name1 = "/content/drive/MyDrive/Dataset/CT_COVID"

with open('covidtrain.csv', mode='w') as file:

    writer = csv.writer(file)

    n=(int)(349*0.3)
    y=349
    for j in range(y):
      while j>n:
        imagecovidtrain = os.listdir(read_folder_name )[j]
        writer.writerow([imagecovidtrain,"1"])
        break 




#noncovidtesting part
 
read_folder_name2 = "/content/drive/MyDrive/Dataset/CT_NonCOVID"


with open('noncovidtest.csv', mode='w') as file:

    writer = csv.writer(file)
    x=(int)(397*0.3)  
    for j in range(x):
      imagenoncovidtest = os.listdir(read_folder_name2 )[j]
      writer.writerow([imagenoncovidtest,"0"])




#noncovidtranning part
      
read_folder_name3 = "/content/drive/MyDrive/Dataset/CT_NonCOVID"

with open('noncovidtrain.csv', mode='w') as file:

    writer = csv.writer(file)

    n=(int)(397*0.3)
    y=397
    for j in range(y):
      while j>n:
        imagenoncovidtrain = os.listdir(read_folder_name3 )[j]
        writer.writerow([imagenoncovidtrain,"0"])
        break 



train_images = np.zeros((600, img_width, img_height, 3), dtype='uint8')
train_labels = np.zeros((600, 1), dtype='uint8')

for x in range(244):
  if x % 2 == 0:
    imgcovid = os.listdir("/content/drive/MyDrive/srs/covidtrain")
   # print(imgcovid[0])
    img = cv2.imread("/content/drive/MyDrive/srs/covidtrain/" + imgcovid[x])
   # print(img)
    img = cv2.medianBlur(img, 3)
    train_images[x] = cv2.resize(img, (224,224))
    train_labels[x]=1
   # print(train_images[x])
  else:
    imgnoncovid = os.listdir("/content/drive/MyDrive/srs/noncovidtrain")
    img = cv2.imread("/content/drive/MyDrive/srs/noncovidtrain/" + imgnoncovid[x])
    img = cv2.medianBlur(img, 3)
    train_images[x] = cv2.resize(img, (224,224))
    train_labels[x]=0 

    

#part2

test_labels = np.zeros((600, 1), dtype='uint8')
test_images = np.zeros((600, img_width, img_height, 3), dtype='uint8')

for z in range(104):
  if  z % 2 == 0:
    imagecovidtest = os.listdir("/content/drive/MyDrive/srs/covidtest")
    img2 = cv2.imread("/content/drive/MyDrive/srs/covidtest/" + imagecovidtest[z])
    img2 = cv2.medianBlur(img2, 3)
    test_images[z] = cv2.resize(img2, (224,224))
    test_labels[z]=1
    
  else:
    imgnoncovidtest = os.listdir("/content/drive/MyDrive/srs/noncovidtest")
    img2 = cv2.imread("/content/drive/MyDrive/srs/noncovidtest/" + imgnoncovidtest[z])
    img2 = cv2.medianBlur(img2, 3)
    test_images[z] = cv2.resize(img2, (224,224))
    test_labels[z]=0


model = Sequential() 
model.add(Conv2D(64, (3, 3),input_shape = input_shape)) 
model.add(Activation('relu')) 
model.add(MaxPooling2D(pool_size =(3, 3))) 

model.add(Conv2D(64, (3, 3))) 
model.add(Activation('relu')) 
model.add(MaxPooling2D(pool_size =(3, 3))) 

model.add(Conv2D(64, (3,3))) 
model.add(Activation('relu')) 
model.add(MaxPooling2D(pool_size =(3, 3))) 

model.add(Flatten()) 
model.add(Dense(64)) 
model.add(Activation('relu')) 
model.add(Dropout(0.5)) 
model.add(Dense(1)) 
model.add(Activation('sigmoid')) 

model.compile(loss ='binary_crossentropy', 
                optimizer ='rmsprop', 
              metrics =['accuracy']) 

results=model.fit(train_images, train_labels,epochs=2)

results1 = model.evaluate(test_images,test_labels, batch_size=100)
model.save('model.h5')
model.save_weights('model_weights.h5')


pred = model.predict(test_images)
print(pred)
max_predictions = tf.argmax(pred, axis=1)
#print(max_predictions)
print(tf.math.confusion_matrix(labels=test_labels, predictions=max_predictions))
