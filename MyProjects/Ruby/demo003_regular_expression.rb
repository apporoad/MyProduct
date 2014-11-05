class Demo003_RegularExpression
  # To change this template use File | Settings | File Templates.



end




#regularExpression

str='abaca'

if str =~ /[ab]*/
  puts str +' matches /[ab]*/'
else
  puts 'not matches'
end

#替换
puts str.sub(/a/,'.')

puts str.gsub(/a/,'*')