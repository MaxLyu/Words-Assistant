$(function(){
	var word = $("#word");
	var textdiv = $("#textdiv");
	var submitbut = $("#submit");
	var input = $("#answer");
	var istrue = $("#istrue");
	var c_answer = "";
	$.ajax({
		url: "php/text.php",　　　// 发送请求的地址
		async: false,　　　　　　　　　　// 异步方式
		type: "get",　　　　　　// 请求方式
		dataType: "json",　　		// 服务器返回的数据类型，有 xml、html、text、json、jsonp、script 这几种类型，具体看情况使用
		success: function(data){　　// 回调函数，请求成功后调用
			word.html(data[0]["word"]);
			c_answer = data[0]["interpretation"];
		}
	})
	
	submitbut.click(function(){
		var answer = input.val();
		if(answer==c_answer){
			istrue.attr("class","fa fa-check");
			istrue.css("color", "#78d341");
		}
		else{
			istrue.attr("class","fa fa-times");
			istrue.css("color", "red");
		}
	})
	
})