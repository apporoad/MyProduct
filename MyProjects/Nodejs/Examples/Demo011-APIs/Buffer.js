/**
 * Created by Administrator on 14-12-30.
 */
var bin=new Buffer([0x48,0x65,0x6c,0x6c,0x6c]);

console.log(bin[2]);

var str=bin.toString('utf-8');

console.log(str);

//revert

var bin1=new Buffer('hello yd','utf-8');
console.log(bin1[0]);

// slice
var sub=bin.slice(2);
sub[0]=0x66;
console.log(bin);

//copy
var binC=new Buffer(bin.length);
bin.copy(binC);
binC[0]=0x87;
console.log(bin);
console.log(binC);
