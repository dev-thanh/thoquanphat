$(document).ready(function(){
    $("#btntra").click(function(){
        //$("#wrapper").scrollTo(50 * $("#sodothuoc").val() - $("#wrapper").width() / 2, 0);
		$("#wrapper").mCustomScrollbar('scrollTo', 50 * $("#sodothuoc").val() - $("#wrapper").width() / 2);
    });

    $("#sodothuoc").keypress(function(e){
        var p = e.which;
        if(p==13){
            $("#btntra").trigger('click');
        }
    });

    //$(function () {
    //  $('#myTab a:first').tab('show');
    //})

    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
 
	$("#wrapper").mCustomScrollbar({
		axis:"x",
		advanced:{autoExpandHorizontalScroll:true}
	});
	
	$(".star-rating input[name=rating]").click(function(){
		var c_rate = $(this).val();
		$.ajax({
			url : 'index.php?c=loban&a=rating',
			data : {rate: c_rate, csrf_token: $("meta[property='csrf_token']").attr('content')},
			success: function(resp) {
				console.log(resp);
			}
		});
	});

});