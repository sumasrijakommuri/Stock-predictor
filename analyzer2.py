#Software Engineering Project - Group 14
import json, urllib2, time
from datetime import datetime
from time import mktime
import sys

from ann import ANN


## ================================================================

def normalizePrice(price, minimum, maximum):
    return ((2*price - (maximum + minimum)) / (maximum - minimum))

def denormalizePrice(price, minimum, maximum):
    return (((price*(maximum-minimum))/2) + (maximum + minimum))/2

## ================================================================

def rollingWindow(seq, wSize):
    iteration = iter(seq)
    win = [iteration.next() for cnt in xrange(wSize)] # First window
    yield win
    for e in iteration: # Subsequent windows
        win[:-1] = win[1:]
        win[-1] = e
        yield win

def getMAverage(values, wSize):  #moving average
    mAverages = []
    
    for i in rollingWindow(values, wSize):
        mAverages.append(sum(i)/len(i))

    return mAverages

def getMins(values, wSize):
    mins = []

    for i in rollingWindow(values, wSize):
        mins.append(min(i))
            
    return mins

def getMaxs(values, wSize):
    maxs = []

    for i in rollingWindow(values, wSize):
        maxs.append(max(i))

    return maxs

## ================================================================

def getTimeSeriesValues(values, window):
    mAverages = getMAverage(values, window)
    mins = getMins(values, window)
    maxs = getMaxs(values, window)

    returnData = []

    # build items of the form [[average, minimum, maximum], normalized price]
    for i in range(0, len(mAverages)):
        inNode = [mAverages[i], mins[i], maxs[i]]
        price = normalizePrice(values[len(mAverages) - (i + 1)], mins[i], maxs[i])
        outNode = [price]
        tempItem = [inNode, outNode]
        returnData.append(tempItem)

    return returnData

## ================================================================

def getHistData(symbol):
    hist = []
    
    # login to API
    urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
    url = "http://api.kibot.com/?action=history&symbol=" + symbol + "&interval=daily&period=365&unadjusted=1&regularsession=1"
    apiData = urllib2.urlopen(url).read().split("\n")
    for line in apiData:
        if(len(line) > 0):
            temp = line.split(',')
            price = float(temp[1])
            hist.append(price)

    return hist

## ================================================================

def getTrainingData(stockSymbol):
    hist = getHistData(stockSymbol)

    # reverse it so we're using the most recent data first, ensure we only have 9 data points
    hist.reverse()
    del hist[9:]

    # get five 5-day moving averages, 5-day lows, and 5-day highs, associated with the closing price
    tData = getTimeSeriesValues(hist, 5) #training data

    return tData

def getPredictionData(symbol,flag):
	#print "1st"
	
	hist = getHistData(symbol)
	hist.reverse()
	#print historicalData
    # reverse it so we're using the most recent data first, then ensure we only have 5 data points
	global check
	check=flag
	
	if(check==0):
		del hist[5:]
	else:
		del hist[5:]
		hist[1]=hist[0]
		hist[2]=hist[1]
		hist[3]=hist[2]
		hist[4]=hist[3]
		hist[0]=new_value

	predData = getTimeSeriesValues(hist, 5)
	
	return predData[0][0]

## ================================================================

def analyzeSymbol(symbol):
	startTime = time.time()
	flag=0
	trainingData = getTrainingData(symbol)
    
	network = ANN(inNode = 3, hiddenNode = 3, outNode = 1)
        
	network.training(trainingData)
	
    # get rolling data for most recent day

	#network.training(trainingData)
	for i in range(0,5):
    # get rolling data for most recent day
		predictionData = getPredictionData(symbol,flag)
		returnPrice = network.test(predictionData)

    # de-normalize and return predicted stock price
		predictedStockPrice = denormalizePrice(returnPrice, predictionData[1], predictionData[2])
    
		print predictedStockPrice
		flag+=1
		global new_value
		new_value=predictedStockPrice
	
	return predictedStockPrice
	

## ================================================================

if __name__ == "__main__":
	analyzeSymbol(sys.argv[1])
