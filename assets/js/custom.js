$('form').submit(function() {
	$(this).find("button[type='submit']").prop('disabled',true);
	$(this).find("input[type='submit']").prop('disabled',true);
});
