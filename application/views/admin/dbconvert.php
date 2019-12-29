{template admin_header}
<script language="JavaScript" >
function docheck(){
	if(!$("#txt").attr("checked") && !$("#mysql").attr("checked")){
		alert("请先选择转换方式");
		return false;
	}
	return true
}
</script>
<p class="map">数据库管理：数据转换</p>
<p class="sec_nav">数据库管理：
	<a href="index.php?admin_db-storage"><span>数据存储设置</span></a>
	<a href="index.php?admin_db-convert" class="on"><span>数据转换</span></a>
</p>
<h3 class="col-h4 m-t10">数据转换</h3>

<form action="index.php?admin_db-convert" method="post" onsubmit="return docheck();">
<table class="table">
	<tr width="300px">
		<td><span>词条历史版本数据转换</span>转换数据，会到导致网站访问速度变慢请选择空闲时间<br />（或凌晨以后）执行。操作前，建议先备份数据库。</td>
		<td>
		<label><input type="radio" class="radio"  name="db_convert" value="txt" id="txt" checked="checked"/> 转换为文本</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio"  class="radio" name="db_convert" value="mysql" id="mysql" /> 转换为Mysql</label>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<input class="inp_btn" name="dbconvertsubmit" type="submit" value="转 换" />
		</td>
	</tr>
</table>
</form>
{template admin_footer}