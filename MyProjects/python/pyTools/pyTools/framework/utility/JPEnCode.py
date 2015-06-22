import chardet

def JPSolveEnCode(s,code=None):
    result=s
    if isinstance(s, unicode) :
        result=s
    else:
        info=chardet.detect(s)
        print info
        result=s
        print s
        if info["encoding"]=='utf-8':
            result= s.decode('utf-8', 'ignore')
        elif info["encoding"]=='ISO-8859-2': 
            result= s.decode('ISO-8859-2', 'ignore')
        elif info["encoding"]=='GB2312':
            result= s.decode('GB2312', 'ignore')
        elif info["encoding"]=='gbk':
            result= s.decode('gbk', 'ignore')
        elif info["encoding"]=='windows-1252':
            result= s.decode('utf-8-sig', 'ignore')
        elif info["encoding"].lower()=='utf-8-sig':
            result= s.decode('utf-8-sig', 'ignore')
        elif info["encoding"].lower()=='utf-16le':
            result= s.decode('utf-16le', 'ignore')
        elif info["encoding"].lower()=='utf-16be':
            result= s.decode('utf-16be', 'ignore')
    if code==None:
        return result.encode('utf-8','ignore')
    else:
        return result.encode(code,'ignore')
    