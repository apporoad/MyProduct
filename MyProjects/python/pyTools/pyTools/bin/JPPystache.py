
import pystache
from framework.utility.JPConvert import JPIsDict, JPIsStr
from framework.utility.JPEnCode import JPSolveEnCode


#print pystache.render('Hi {{person}}!', {'person': 'Mom'});

def JPRenderDict(template,dictObj):
    if JPIsDict(dictObj)==False:
        return 'error dict type'
    if JPIsStr(template)==False:
        return 'error template type'
#     template=unicode(template, errors='replace')
    return pystache.render(template,dictObj)

