var program = require('commander')

program.version('0.0.1')
	.option('-p, --peppers','add peppers')
	.parse(process.argv);

	if(program.peppers) console.log('  -- peppers');

console.log('over');
