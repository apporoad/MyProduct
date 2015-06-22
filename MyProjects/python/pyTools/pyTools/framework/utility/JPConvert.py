import simplejson
from framework.utility.JPEnCode import JPSolveEnCode


def JPConvert_Josn2Dict(json_str):
#     print json_str
#     d=simplejson.loads(JPSolveEnCode(json_str, "utf-8"))
#     print d
#     return JPSolveEnCode(d, "gbk")
#     print json_str
    return eval(json_str)

def JPConvert_Dict2Json(dictObj):
    return simplejson.dumps(dictObj)





#type judge
def JPIsInt(obj):
    return isinstance(obj, int)

def JPIsStr(obj):
    return isinstance(obj, str)

def JPIsfloat(obj):
    return isinstance(obj, float)

def JPIsDict(obj):
    return isinstance(obj, dict)

def JPIsBool(obj):
    return isinstance(obj, bool)

def JPIsTuple(obj):
    return isinstance(obj, tuple)

def JPIsList(obj):
    return isinstance(obj, list)



