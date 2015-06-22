
import sys
from framework.utility.JPCollections import JPListContains, JPListContainsList
reload(sys)
sys.setdefaultencoding('utf-8')
import os
from framework.utility.JPIO import JPMkTimeDir, JPMkDir, JPReadFile, JPWriteFile,\
    JPCutFile
from mhlib import PATH
from bin import JPPystache
import shutil
from framework.utility import JPTime
from framework.utility.JPConvert import JPConvert_Josn2Dict


def JPTanslateOneFile(template,config,filePath,targetPath):
    sqlContent=JPReadFile(filePath)
#     print config
    #default
    if config["fileName"].lower()=='default':
        p,f=os.path.split()
        config["fileName"]=os.stat(filePath)
#     config["description"]
#     config["creator"]
    if config["createDate"].lower()=='default':
        config["createDate"]=JPTime.getCurrentTime()
    config["sqlcontent"]=sqlContent
    
    targetStr=JPPystache.JPRenderDict(template, config)
    JPWriteFile(targetPath,targetStr)

def JPBakOneFile(path,targetPath):
    JPCutFile(path,targetPath)

#argvLength=len(sys.argv);
#get last param
if len(sys.argv)>0:
    lastParm=sys.argv[-1]
    #params
    templateStr=''
    configStr=''
    sqlScriptsDir=''
    targetDir=''
    bakDir=''
    isCutOriginFiles=True
    
    #print lastParm
    paramList=lastParm.split("-")
    if JPListContainsList(paramList,['default','config']):
        path= os.getcwd()
        #getTemplate
        templateStr=JPMkDir(path+"/Template")+"/SqlScriptGenerator.default"
        configStr=JPReadFile(path+"/Template/SqlScriptGenerator.config.default")
        sqlScriptsDir=JPMkDir(path+"/SqlScripts")
        targetDir=JPMkTimeDir(path+"/Target", "default")
        #find default config
    elif lastParm.lower()=="sqlscriptgenerator.py":
        print 'you must gvie a param'
    else:
        paramList=lastParm.split("-")
    
    #judge cut
    if JPListContains(paramList, 'offcut'):
        isCutOriginFiles=False
    #getTemplate
    #print templateStr
    templateStr=JPReadFile(templateStr);
    #print  templateStr
    #get config do nothing
    listfile=os.listdir(sqlScriptsDir)
    #print listfile
    for f in listfile:
        if f[4:] == '.sql' or f[-4:] == '.txt':
#             print configStr
            JPTanslateOneFile(templateStr,JPConvert_Josn2Dict(configStr),sqlScriptsDir+"/"+f,targetDir+"/"+JPTime.getCurrentTimeStamp()+f)
            if isCutOriginFiles:
                JPBakOneFile(sqlScriptsDir+"/"+f,targetDir+"/bak/"+f)
            
    
    
    