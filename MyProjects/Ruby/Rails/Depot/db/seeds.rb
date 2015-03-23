# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)
Product.delete_all

#so to create 
Product.create(:title=> 'apple',
	       :description=>
	%{
	<P>
		apple is a compute company and also its product's name
	</p>
	},
	:image_url=>'images/111.jpg',
	:price=>5000)

