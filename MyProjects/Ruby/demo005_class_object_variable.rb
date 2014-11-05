class Demo005ClassObjectVariable
  # To change this template use File | Settings | File Templates.
  def initialize(name,age)
    @name=name
    @age=age
  end
end


person=Demo005ClassObjectVariable.new('lili',18)

puts person.inspect

puts person.to_s

