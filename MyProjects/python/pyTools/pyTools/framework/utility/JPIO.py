import os
import JPTime
from __builtin__ import file
from framework.utility.JPEnCode import JPSolveEnCode
import shutil

def JPMkDir(path):
    if os.path.isdir(path):
#         print "the path ["+path+"] already exists"
        None
    else:
        os.makedirs(path)
    return path
        
def JPMkTimeDir(path,leafDirName):
    newPath=path+'/'+JPTime.getCurrentTime('short')+leafDirName
    JPMkDir(newPath)
    return newPath

def JPReadFile(path):
    file=open(path,'r')
    try:
        content=file.read()
        print type(content)
    finally:
        file.close()
    content=JPSolveEnCode(content)
    print type(content)
    return content

def JPWriteFile(path,content):
    #judge dir
    dir,fn=os.path.split(path)
    JPMkDir(dir)
    file=open(path,'w+')
    file.write(JPSolveEnCode(content))
    file.close()
    
def JPCutFile(file,newFile):
    tdir,tf=os.path.split(newFile)
    JPMkDir(tdir)
    shutil.move(file, newFile)