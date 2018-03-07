$(function(){
	$('#modalButton').click(function(){
		$('#modal').modal('show').find('#Modal-Content').load($(this).attr('value'));
	});
});