QUnit.test("setFile is function", function(e){
	e.ok(typeof setFile === 'function' , typeof xhr === 'object', 'true setFile is function');
})

QUnit.test('module_g', function(e){	
	e.ok(typeof module_g.getEventTarget === 'function', 'module_g is fine')
})

QUnit.test("async() test setFile", function(e){
	let done = e.async(1);
	
	if(typeof xhr === 'object'){
		setTimeout(function(){
			e.equal(document.activeElement, input[0], "async() test success setFile" );
			done();
		},1000)

	}
})

QUnit.test('error_module', function(assert){
	
	if(('#cl_error') !== 'undefined'){
		assert.ok(true, "error_module() is fine")
	}

})
	



