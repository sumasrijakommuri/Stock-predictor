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

def getMAverage(values, wSize): #moving averages
    mAverages = []
    
    for w in rollingWindow(values, wSize):
        mAverages.append(sum(w)/len(w))

    return mAverages

def getMinimums(values, wSize):
    mins = []

    for w in rollingWindow(values, wSize):
        mins.append(min(w))
            
    return mins

def getMaximums(values, wSize):
    maxs = []

    for w in rollingWindow(values, wSize):
        maxs.append(max(w))

    return maxs

## ================================================================

def getTimeSeriesValues(values, window):
    mAverages = getMAverage(values, window)
    mins = getMinimums(values, window)
    maxs = getMaximums(values, window)

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

def getHistoricalData(stockSymbol):
    historicalPrices = []
    
    # login to API
    urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
    url = "http://api.kibot.com/?action=history&symbol=" + stockSymbol + "&interval=daily&period=365&unadjusted=1&regularsession=1"
    apiData = urllib2.urlopen(url).read().split("\n")
    for line in apiData:
        if(len(line) > 0):
            tempLine = line.split(',')
            price = float(tempLine[1])
            historicalPrices.append(price)

    return historicalPrices

## ================================================================

def getTrainingData(stockSymbol):
    historicalData = getHistoricalData(stockSymbol)

    # reverse it so we're using the most recent data first, ensure we only have 9 data points
    historicalData.reverse()
    del historicalData[9:]

    # get five 5-day moving averages, 5-day lows, and 5-day highs, associated with the closing price
    trainingData = getTimeSeriesValues(historicalData, 5)

    return trainingData

def getPredictionData(stockSymbol):
    historicalData = getHistoricalData(stockSymbol)

    # reverse it so we're using the most recent data first, then ensure we only have 5 data points
    historicalData.reverse()
    del historicalData[5:]

    # get five 5-day moving averages, 5-day lows, and 5-day highs
    predictionData = getTimeSeriesValues(historicalData, 5)
    # remove associated closing price
    predictionData = predictionData[0][0]

    return predictionData

## ================================================================

def analyzeSymbol(stockSymbol):
    startTime = time.time()
    
    trainingData = getTrainingData(stockSymbol)
    
    network = ANN(inNode = 3, hiddenNode = 3, outNode = 1)

    network.training(trainingData)

    # get rolling data for most recent day
    predictionData = getPredictionData(stockSymbol)

    # get prediction
    returnPrice = network.test(predictionData)

    # de-normalize and return predicted stock price
    predictedStockPrice = denormalizePrice(returnPrice, predictionData[1], predictionData[2])

    # create return object, including the amount of time used to predict
    

    return predictedStockPrice

## ================================================================

if __name__ == "__main__":
    analyzeSymbol(sys.argv[1])