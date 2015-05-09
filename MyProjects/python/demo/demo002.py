#strings
str1='good1';
str2="good2";
str3="""good3""";


print(str1 + " " +str2 +" " +str3);

# substr

var1="this is my world";
var2="that is your hello world";

print(var1[0]);
print(var2[2:10]);


#collections
list1=["one",2,'three',4,"""five"""];

print(list1[0]);
print(list1[1:3]);

# 
print(len(list1));
list1+= [10,11,"12"];
print(list1);
print(list1*2);

if 2 in list1:
    print("2 in list1");
else:
    print('2 not in list1');
    
for x in ['physics']* 4 : print(x);
    
