#Software Engineering - WebApps - Group 14
import math, random

random.seed(0)

#random number generation
def randomgen(x, y):
    return x + random.random()*(y - x)

def sigmoid(x):
    return math.tanh(x)

def d_sigmoid(x):
    return 1- x**2

def mat(A, B, x = 0):
    m = []
    for i in range(A):
        m.append([x]*B)
    return m

class ANN:
    def __init__(self,inNode,hiddenNode,outNode):
        self.inNode = inNode +1
        self.outNode = outNode
        self.hiddenNode = hiddenNode
        
        self.inAct = [1]*self.inNode
        self.outAct = [1]*self.outNode
        self.hiddenAct = [1]*self.hiddenNode
    
        self.inwt = mat(self.inNode, self.hiddenNode)
        self.outwt= mat(self.hiddenNode, self.outNode)
        
        for i in range(self.inNode):
            for j in range(self.hiddenNode):
                self.inwt[i][j] = randomgen(-0.2, 0.2)
        for j in range(self.hiddenNode):
            for k in range(self.outNode):
                self.outwt[j][k] = randomgen(-2.0, 2.0)
                
        self.li = mat(self.inNode, self.hiddenNode)
        self.lo = mat(self.hiddenNode, self.outNode)
                
    
    def change(self, inputs):
        if len(inputs)!=self.inNode - 1:
            raise ValueError('wrong number of inputs')
         #input         
        for i in range(self.inNode - 1):
            self.inAct[i] = inputs[i]
            
         #hidden   
        for i in range(self.hiddenNode):
            sum = 0
            for j in range(self.inNode):
                sum += self.inAct[j]*self.inwt[j][i]
            self.hiddenAct[i] = sigmoid(sum)
                
          #output      
        for i in range(self.outNode):
            sum = 0.0
            for j in range(self.hiddenNode):
                sum += self.hiddenAct[j] * self.outwt[j][i]
            self.outAct[i] = sigmoid(sum)
            
        return self.outAct[:]
        
    def backprop(self, exp, P, Q):
		
        if len(exp)!=self.outNode:
            raise ValueError('Number of target values is wrong!')
                
        outdel = [0]*self.outNode
        for i in range(self.outNode):
            error = exp[i] - self.outAct[i]
            outdel[i] = error * d_sigmoid(self.outAct[i])
            
        hiddendel = [0]*self.hiddenNode
        for i in range (self.hiddenNode):
            error = 0
            for j in range(self.outNode):
                error += outdel[j] * self.outwt[i][j]
            hiddendel[i] = d_sigmoid (self.hiddenAct[i])*error
                     
        for i in range(self.hiddenNode):
            for j in range(self.outNode):
                x = self.hiddenAct[i]*outdel[j]
                self.outwt[i][j] += self.lo[i][j]*Q + x*P
                self.lo[i][j] = x
                           
        for i in range(self.inNode):
            for j in range(self.hiddenNode):
                x = self.inAct[i]*hiddendel[j]
                self.inwt[i][j] += self.li[i][j] * Q + x * P
                self.li[i][j] = x
                           
            #error calculation
        error = 0
        for i in range(len(exp)):
            error += ((exp[i] - self.outAct[i])**2)/2;
        return error
        
    def test(self, inNode):
        return self.change(inNode)[0]
        
    def wts(self):
        print('Input weights are : ')
        for i in range(self.inNode):
            print(self.inwt[i])
        print()
        print('Output weights are : ')
        for j in range(self.hiddenNode):
            print(self.outwt[j])
                
    def training(self, pattern, i = 1000, N = 0.5, M = 0.1):
            
        for j in range(i):
            error = 0
            for p in pattern:
                inputs = p[0]
                exp = p[1]
                self.change(inputs)
                error += self.backprop(exp, N, M)
                
                          
                          
            
        


            
        
        
