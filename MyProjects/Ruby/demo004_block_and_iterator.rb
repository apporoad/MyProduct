class Demo004_BlockAndIterator
  # To change this template use File | Settings | File Templates.
end


def myOwnMethod(name)
  yield(name)
  yield(name)
end


myOwnMethod('lily'){|name| puts name+': A'}


array=[1,'23','nameTest',"dest"]

array.each{|name| puts name}