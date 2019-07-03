$(function(){
var word_error = $("#word-error");
var word = $("#word");
var ways = $("#ways");
var submit = $("#submit");
var result = $("#search_result");
var result_others = $("#result-others");
var hidden_button = $("#hidden-button");
var result_word = $("#result-word");

hidden_button.hide();
result.hide();
// 提交时检验
function submit_validate(){
	var fw = word.val();
	var way = ways.val()
	var params = {"word": fw, "ways": way};
	if(fw==""){
		word_error.html("您的输入为空");
	}
	else{
		$.ajax(
			{
				url: "php/findwords.php",　　　// 发送请求的地址
				data: params,　　　　　　　　　　　　// 发送到服务器的数据
				beforeSend: function(){　　　　　
					submit.val("    查  询  中...   ");
				},
				async: false,　　　　　　　　　　// 异步方式
				type: "get",　　　　　　// 请求方式
				dataType: "json",　　		// 服务器返回的数据类型，有 xml、html、text、json、jsonp、script 这几种类型，具体看情况使用
				success: function(data){　　// 回调函数，请求成功后调用
					// data = JSON.stringify(data);
					var con="";
					if(data==""){
						word_error.html(" 找不到此单词");
						word_error.show();
						submit.val("     翻  译     ");
					}else{
						word_error.hide();
						result.show();
						con+="<p style='color:gray'>"+data[0]["pronounction"]+"</p><span>"
							+data[0]["interpretation"]+"</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:gray'>"
							+data[0]["chara"]+"</span></br>"+"</br><p>"+data[0]["engexpl"]+"</p><p>"+data[0]["chsexpl"]+"</p>";
						submit.val("     翻  译     ");
						hidden_button.show();
					}
					console.log(con);
					result_word.html(data[0]["word"]);
					result_others.html(con);

				}
				
			}
		)
	}
	
}

submit.click(submit_validate);
})