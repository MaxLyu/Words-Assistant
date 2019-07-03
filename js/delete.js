$(function(){
	var word = $("#word");
	var del = $("#delete");
	function delclick(){
		var fw = word.val();
		if (confirm("确定要删除该单词？")){
			
			$.ajax(
			{
				url: "php/delete.php",　　　// 发送请求的地址
				data: {"keyword":fw},　　　　　　　　　　// 发送到服务器的数据
				
				async: true,　　　　　　　　　　// 异步方式
				type: "get",　　　　　　// 请求方式
				dataType: "json",　　		// 服务器返回的数据类型，有 xml、html、text、json、jsonp、script 这几种类型，具体看情况使用
				success: function(data){　　// 回调函数，请求成功后调用
					if(data.result==true){
						alert("删除成功!");
						window.location.href = "main.html";
					}else{
						alert("删除异常!");
					}

				}
				
			})
		}
		
	}
	del.click(delclick);
})