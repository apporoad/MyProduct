#my app.rb
require 'sinatra'

get '/' do
	'hello world'
end

get '/test' do
	p=params['id']
	if p==1
		'answer1'
	elsif p==2
		'answer2'
	else
		'answer3'
	end
end
