<!--{template header}-->
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
  <div style="float:left;"><a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;添加新用户</div>
</div>
<!--{if isset($message)}-->
<!--{eval $type=isset($type)?$type:'correctmsg'; }-->
<table  class="table">
	<tr>
		<td class="{$type}">{$message}</td>
	</tr>
</table>
<!--{/if}-->
<form action="index.php?admin_user/add{$setting['seo_suffix']}" method="post">
			<table  class="table">
				<tr class="header">
					<td colspan="2">参数设置</td>
				</tr>
				<tr>
					<td class="altbg1" width="45%"><b>用户名:</b><br><span class="smalltxt">注册用户名</span></td>
					<td class="altbg2"><input type="text" name="addname" /></td>
				</tr>
				<tr>
					<td class="altbg1" width="45%"><b>密码:</b><br><span class="smalltxt">用户密码</span></td>
					<td class="altbg2"><input type="text" name="addpassword"></td>
				</tr>
				<tr>
					<td class="altbg1" width="45%"><b>Email:</b><br><span class="smalltxt">用户的真实email地址，可用于找回密码</span></td>
					<td class="altbg2"><input type="text" name="addemail"></td>
				</tr>
				<tr>
					<td class="altbg1" width="45%"><b>马甲用户:</b><br><span class="smalltxt">选择是，那么这个用户以后专门用来给网站做好事了(采集数据提问，回答，论坛发帖回帖)</span></td>
					<td class="altbg2">
						<input class="radio" id="majia"  type="radio" checked value="1" name="fromtype"><label for="majia">是</label>&nbsp;&nbsp;&nbsp;
						<input class="radio" id="majia"   type="radio"  value="0" name="fromtype"><label for="majia">否</label>
					</td>
				</tr>
			</table>
			<br />
			<center><input type="submit" class="button" name="submit" value="提 交"></center><br>
		</form>
<br />
<!--{template footer}-->