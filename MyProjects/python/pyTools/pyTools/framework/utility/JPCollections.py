


def JPListContains(list,val,ignoreCase=True):
    for v in list:
        if ignoreCase:
            if v.lower()==val.lower():
                return True
        else:
            if v==val:
                return True
    return False

def JPListContainsList(list,valList,ignoreCase=True):
    for val in valList:
        if JPListContains(list, val, ignoreCase):
            return True
    return False