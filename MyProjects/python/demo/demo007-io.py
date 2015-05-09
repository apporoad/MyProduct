obj=open("demo001.py",'r+');
print( "name of file:",obj.name);
print("colse status is " ,obj.closed);
print('opening mode is ',obj.mode);
#print('soft flag is ' , obj.softspace);

content =obj.read(10);
print('content is ',content);

obj.write("demo005 is good");

obj.close();