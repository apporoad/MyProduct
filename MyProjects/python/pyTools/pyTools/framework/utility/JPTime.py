import datetime
import time

def getCurrentTime(resutType=None):
    now=datetime.datetime.now();
    if resutType==None:
        return now.strftime("%Y-%m-%d %H:%M:%S")
    elif resutType=="short":
        return now.strftime("%Y%m%d%H%M%S")
    else:
        return now.strftime(resutType)


def getCurrentTimeStamp():
    return str(time.time())

#print getCurrentTime("short")