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
$('#modal').on('show', function(e) {
    var modal = $(this);    
    modal.css('position', "fixed")
        .css('height','170px')
        .css('width', 'auto')
        .css('margin','0')
        .css('top', "3%") 
        .css('left', "3%")
        .css('right', "3%")
        .css('bottom', "3%");
    return this;
  });