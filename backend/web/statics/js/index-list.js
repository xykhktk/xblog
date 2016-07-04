/**
 * Created by Administrator on 2016/4/12.
 */
$(function(){
	$("#delete-btn").click(function(){
		if(confirm('您确定要删除 ,这是不可恢复操作')){
			$("#dltForm").submit();
		}
	});

	$(".data_delete").click(function(){	//点击某一行的“删除”
		$("#dltForm").find('input[type=checkbox]').prop('checked' , false);	//清空所有的checkbox
		$(this).parent().parent().find('input[type=checkbox]').prop('checked' , true);//本行的checkbox设置为true
		$("#delete-btn").click();	//触发
	});
});