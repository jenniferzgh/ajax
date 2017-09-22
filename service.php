<?php
header("Content-Type:text/plain;charset=utf-8");//决定服务端响应过来的格式是什么（plain代表格式是纯文本json表示字符串），编码格式是什么


//定义一个多维数组
$staff=array(
array("name"=>"曾贵花","number"=>"201610110008","sex"=>"女","job"=>"学生"),
array("name"=>"许泳仪","number"=>"201610110005","sex"=>"女","job"=>"学生"),
array("name"=>"叉叉","number"=>"201510095046","sex"=>"女","job"=>"学生")
);


//判断是get请求还是post请求
if($_SERVER["REQUEST_METHOD"]=="GET"){search();}//$_SERVER["REQUEST_METHOD"]返回访问页面使用的请求方法
else if($_SERVER["REQUEST_METHOD"]=="POST"){create();}//$_SERVER超全局变量，在一个脚本的全部作用域都可以用，不需要使用golbal字眼



function search(){
	
	if(!isset($_GET["number"])||empty($_GET["number"])){   //检查是否有员工编号的参数(是否为空)
	        echo"参数错误";                                  //超全局变量$_GET和$_POST用来收集表单数据
	        	return;}                                      //isset检测变量是否设置，empty判断是否为空	



	global $staff;                //函数之外声明的变量，拥有golbal作用域，只能在函数外访问，在函数内访问全局变量要用golbal关键词
	$number=$_GET["number"];     //检查是否有员工编号（是否有该号码对应的员工）
	$result="没有找到员工";
	


	foreach($staff as $value){  //遍历$staff多维数组
		if($value["number"]==$number){  //是否存在号码对应的员工
			$result="找到员工：员工编号：".$value["number"].",
			员工姓名：".$value["name"].",员工性别：".$value["sex"]."
			员工职位：".$value["job"];
			break;}
		}
		echo $result;  
	}
	

//创建员工
function create(){
			if(!isset($_GET['name'])||empty($_GET['name'])     //判断信息是否编写完全
			||!isset($_GET['number'])||empty($_GET['number'])
			||!isset($_GET['sex'])||empty($_GET['sex'])
			||!isset($_GET['job'])||empty($_GET['job']))
			{
				echo "参数错误，员工信息填写不全";
				return;
			}
	echo "员工：".$_POST["name"]."信息保存成功";
}
?>