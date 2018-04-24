$(function(){
	$(document).on('click','.fc-day',function(){
		var date=$(this).attr('data-date');

		$.get('index.php?r=event/create',{'date':date},function(data){
		$('#modal').modal('show').find('#Modal-Content').html(data);
		});

	});
});

$(function(){
	$('#modalButton').click(function(){
		$('#modal').modal('show').find('#Modal-Content').load($(this).attr('value'));
	});
});