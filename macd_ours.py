#Software Engineering Project - Group 14
import sys
import numpy
import decimal
import os
from sklearn import *
from scipy.stats import norm
from sklearn import svm
import math
import MySQLdb
import pymysql.cursors
import pymysql
import json, urllib2, time

def get_macd(stockname):
    historicalPrices = []
    
    # login to API
    urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
    url = "http://api.kibot.com/?action=history&symbol=" + stockname + "&interval=daily&period=365&unadjusted=1&regularsession=1"
    apiData = urllib2.urlopen(url).read().split("\n")
    for line in apiData:
		if(len(line)>0):
		   tempLine=line.split(',')
		   price=float(tempLine[2])
		   historicalPrices.append(price)
		
	
    print sum(historicalPrices)/float(len(historicalPrices))
    return sum(historicalPrices)/float(len(historicalPrices))

## ================================================================

if __name__ == "__main__":
    get_macd(sys.argv[1])