#Software Engineering Project - Bayesian
import numpy as npy
from numpy import linalg
from numpy import matrix
import sys
import math
import MySQLdb


#opening DB connection
con = MySQLdb.connect(host = "localhost", user = "root", passwd = "", db = "WebApps")
d = con.cursor(MySQLdb.cursors.DictCursor)

dn=[1,2,3,4,5,6,7,8,9,10] 

name = sys.argv[1]
tfinal = list()
m1_list = list()

#SQl Query to fetch all ask_prices
d.execute(" SELECT close as OPEN FROM tendays WHERE name='%s' ORDER BY open LIMIT 110" %(name))

train_data  = d.fetchall()
list(reversed(train_data))

N = 10
k=0
m1 = npy.zeros((10, 10), float)
m1_array = []
l=0

for i in xrange(d.rowcount):
    a = train_data[i]['OPEN']
    a = float(a)
	
    if((i % 10 == 0)and(i!=0)):
        tfinal.append(a)
        
    else:
        m1[l][k]=a    
        k += 1
        if(k==10):
            k=0
            l += 1

			
tfinal = npy.asarray(tfinal)



No_train_sets=10

m=2                 
M=m+1
a=0.005            
b=11.1              
rel_err=0


for i in range(len(tfinal)):
    rel_err=rel_err+tfinal[i]
    
d=11

def bayesian():

    for l in range(No_train_sets):         

        t = npy.zeros((N,1),float)
        fix = npy.zeros((M,1),float)
        sum_fixn = npy.zeros((M,1),float)
        sum_fixn_t = npy.zeros((M,1),float)
        global var
        for i in range(M):                 
            fix[i][0]=math.pow(d,i)
        

        for i in range(N):                 
            t[i][0]=m1[k][i]
            
        for j in range(N):
            for i in range(M):
                sum_fixn[i][0]=sum_fixn[i][0]+math.pow(dn[j],i)
                sum_fixn_t[i][0]=sum_fixn_t[i][0]+t[j][0]*math.pow(dn[j],i)
		S=npy.linalg.inv(a*npy.identity(M)+b*npy.dot(sum_fixn,fix.T))
		vari=npy.dot((fix.T),npy.dot(S,fix)) 
		vari=vari+ 1/b
	
	mean=b*npy.dot(fix.T,npy.dot(S,sum_fixn_t))
	predicted_value= mean+ (2.99*( math.sqrt(vari)))
	print("Based on Bayesian Analysis,the predicted value for next minute is ")
	#print predicted_value
	print predicted_value[0][0]
	print (".")
	return predicted_value


bayesian()
