class Demo006_inheritance
  # To change this template use File | Settings | File Templates.
end

class Song
  def initialize(name,num)
    @name=name
    @num=num
  end
end

class MySong < Song
  def initialize(name,num,weight)
    super(name,num)
    @weight=weight
  end
end

mySong=MySong.new('toAlice',12,20)
puts mySong.inspect

#Attribute
class ChildSong < Song
  def initialize(name,num)
    super(name,num)
  end
  def name
    @name
  end
  def num
    @num
  end
end


childSong=ChildSong.new('oldSong',12)
puts childSong.name

class Good2Song < Song
  def initialize(name,num)
    super(name,num)
  end
  def name=(yourNewName)
    @name=yourNewName
  end
  def name
    @name
  end
end

song=Good2Song.new("goodSongInstance",12);
song.name="lyx"

puts song.name

#Class Variable
class Shape
  @@count=1
  def initialize()
    @@count+=1
  end

  def count
    @@count
  end
end

Shape.new
Shape.new
Shape.new

puts Shape.new().count

#Class Methods

class ClassMethod
  def ClassMethod.help()
    puts 'help'
  end
end

puts ClassMethod.help

#singleton

class SingletonClass
  private_class_method:new
  @@instance   =nil
  def getObject
      @@instance=new unless @@instance
  end
end


