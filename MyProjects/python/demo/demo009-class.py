class Human:
    count=0

    def __init__(self,name):
        self.name=name;
        Human.count += 1;
    
    def showCount(self):
        print("humun count is",Human.count);
        return
    
    def showDetail(self):
        print("my name is ", self.name);
        return;
    
    
    

lily=Human("lily");
lily.showCount();
lily.showDetail();
lucy=Human("lucy");
lucy.showCount();
lucy.showDetail();