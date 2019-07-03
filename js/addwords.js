var word_error = $("#word-error");
var chara_error = $("#chara-error");
var inter_error = $("#inter-error");

var word = $("#word");
var chara = $("#chara");
var inter = $("#inter");

word_error.hide();                    // 把提示框隐藏起来
chara_error.hide();
inter_error.hide();
// 单词检验
function word_validate(){
	var w = word.val();
	if(w.trim() == ""){
		word_error.html("*单词不能为空");
		word_error.show();	
	}
	else word_error.hide();
}

function chara_validate(){
	var c = chara.val();
	if(c.trim() == ""){
		chara_error.html("*词性不能为空");
		chara_error.show();	
	}
	else chara_error.hide();
}

function inter_validate(){
	var i = inter.val();
	if(i.trim() == ""){
		inter_error.html("*词义不能为空");
		inter_error.show();	
	}
	else inter_error.hide();
}

word.blur(word_validate);
chara.blur(chara_validate);
inter.blur(inter_validate);