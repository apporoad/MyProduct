# to start ruby in my own way
puts '你好吗,df2f2f'.length
puts 'rick'.index("i")
puts -1933.abs

class Demo001_start
  def        say_goodNight(name)
    result ="good night "+ name
    return result
  end
end

demo001=Demo001_start.new
puts demo001.say_goodNight("lili")


#array and hashes

array =[1,'32','abc']

array1=[2,array]

puts array1


map={
    'i1'=> 'my name is i',
    'a2'=>3,
    'b3'=>4
}

puts map.values
puts map.keys
