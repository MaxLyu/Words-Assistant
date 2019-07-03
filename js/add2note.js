$(function(){
	var add2note = $("#add2note");
	var word = $("#word");
	var mark = $("#mark");
	add2note.click(function(){
		var fw = word.val();
		$.ajax({
			url: "php/add2note.php",　　　// 发送请求的地址
			data: {"keyword":fw},　　　　　// 发送到服务器的数据
			async: true,　　　　　　　　　　// 异步方式
			type: "post",　　　　　　// 请求方式
			dataType: "json",　　		// 服务器返回的数据类型，有 xml、html、text、json、jsonp、script 这几种类型，具体看情况使用
			success: function(data){　　// 回调函数，请求成功后调用
				if(data.result==true){
					mark.attr("class","fa fa-star");
				}
			}
		})
	})
})