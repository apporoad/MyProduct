class Demo008_ArrayHashIterator
  # To change this template use File | Settings | File Templates.
end

array =['dog',"cat",1,2.34,"call","dd"]

puts 'array.class:'+array.class.to_s
puts 'array.length'+array.length.to_s

puts 'array[1]:'+array[1].to_s
puts 'array[100]:'+array[100].to_s
puts 'array[-1]:'+array[-1]
puts 'array[-10]:'+array[-10].to_s
puts 'array[1,2]:'+array[1,2].to_s
puts 'array[-2,2]:'+array[-2,2].to_s
puts 'array[1..2]:'+array[1..2].to_s
puts 'array[-1..3]:'+array[-1..3].to_s

#iterators
puts '***********************************************'
for i in 0...array.length
  puts array[i]
end
puts '***********************************************'

puts array.find{|name| name=='call'}
