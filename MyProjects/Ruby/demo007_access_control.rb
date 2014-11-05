class Demo007_AccessControl
  # To change this template use File | Settings | File Templates.
end


class MyClass
  private
  def m1
  end
  protected
  def m2
  end
  public
  def m3
  end
end

class YourClass
  def m1
  end
  def m2
  end
  def m3
  end

  private  :m1
  public  :m2
  protected :m3
end