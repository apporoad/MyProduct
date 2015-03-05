module Ruby101
	class Book
		##construct
		def initialize(title,authors,price,tags)
			@title=title
			@authors=authors
			@price=price
			@tags=tags
		end
		
		#accessor
		attr_accessor :title, :authors,:price,:tags
	end
end

b=Ruby101::Book.new(
	"bookTitle",
	["dv","lxy","lily"],
	26.28,
	["ruby","code","artist"])

puts b.title
puts b.authors
puts b.price
puts b.tags

