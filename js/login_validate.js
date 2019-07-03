$(function(){
	var username_error = $("#username-error");
    var user_error = $("#user-error");
    var username_input = $("#username-input");
    var password_input = $("#password-input");
    var user_error = $("#user-error");
    var submit = $("#submit");
	
    username_error.hide();                    // 把提示框隐藏起来
    user_error.hide();                                
    // 密码检验
    function password_validate(){
		var password = password_input.val();
        if(password == ""){
            user_error.html("密码不能为空");
            user_error.show();
            
        }
        else if(password_input.val().length>15){
            user_error.html("密码长度不能超过15");
            user_error.show();
            
        }
        else user_error.hide();
    }
    // 用户名检验
    function username_validate(){
        var username = username_input.val();
        if (username.trim() == "") {
            username_error.html("用户名不能为空");
            username_error.show();
            username_input.val("").focus();    
        }
        else  username_error.hide();
    }
    // 提交时检验
    function submit_validate(){
		var username = username_input.val();
		var password = password_input.val();

        var user = {"user": username, "pwd": password};
        if(username=="" || password==""){
            user_error.html("用户名或密码不能为空");
            user_error.show();
        }
        else{
            $.ajax(
				{
					url: "php/login.php",　　　// 发送请求的地址
					data: user,　　　　　　　　　　　　// 发送到服务器的数据
					beforeSend: function(){　　　　　// 在发送请求的之前将按钮的内容设置为 “登录中...”，有一个更好的体验
						submit.val("登录中...");
					},
					async:true,　　　　　　　　　　// 异步方式
					type: "post",　　　　　　// 请求方式
					dataType: "json",　　// 服务器返回的数据类型，有 xml、html、text、json、jsonp、script 这几种类型，具体看情况使用
					success: function(msg){　　// 回调函数，请求成功后调用
						if(msg.result == false){
							user_error.html("帐号或密码错误");
							user_error.show();
							submit.val("确认");
						}
						else if(msg.result == true){
							window.location.href = "main.html";　　　　// 验证成功后跳转页面
						}
					}
					
				}
            )
        }
        
    }
    username_input.blur(username_validate);        // 鼠标焦点从用户名移开触发的事件
    password_input.blur(password_validate);        // 鼠标移开密码输入框时触发的事件
    submit.click(submit_validate);                 // 单击提交按钮触发的事件
})