let postcss = require('postcss');
let cssvariables = require('postcss-css-variables');
 
let fs = require('fs');
 
let mycss = fs.readFileSync('main.css', 'utf8');
 
// Process your CSS with postcss-css-variables
let output = postcss([
        cssvariables(/*options*/)
    ])
    .process(mycss)
    .css;

fs.writeFileSync('post-main.css', output, 'utf8')
console.log('Done');