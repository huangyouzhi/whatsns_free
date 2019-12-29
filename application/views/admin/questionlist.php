<!--{template header}-->
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;问题管理</div>
</div>
<!--{if isset($message)}-->
<!--{eval $type=isset($type)?$type:'correctmsg'; }-->

<div class="alert alert-primary">{$message}</div>
<!--{/if}-->
<form action="index.php?admin_question/searchquestion{$setting['seo_suffix']}" method="post">
    <table class="table">
        <tbody>
            <tr class="header" ><td colspan="4">问题列表</td></tr>
            <tr class="altbg1"><td colspan="4">可以通过如下搜索条件，检索问题</td></tr>
            <tr>
                <td width="200"  class="altbg2">标题:<input class="txt form-control" name="srchtitle" {if isset($srchtitle)}value="{$srchtitle}" {/if}></td>
                <td  width="200" class="altbg2">提问者:<input class="txt form-control" name="srchauthor" {if isset($srchauthor)}value="{$srchauthor}" {/if}></td>
                <td  width="200" class="altbg2">状态:
                    <select class="form-control shortinput" name="srchstatus">
                        <option {if (isset($srchstatus) && '-1'==$srchstatus) } selected {/if} value="-1">--不限--</option>
                        <option value="1" {if (isset($srchstatus) && 1==$srchstatus) } selected {/if}>待解决</option>
                        <option value="2" {if (isset($srchstatus) && 2==$srchstatus) } selected {/if}>已解决</option>
                        <option value="6" {if (isset($srchstatus) && 6==$srchstatus) } selected {/if}>推荐问题</option>
                        <option value="9" {if (isset($srchstatus) && 9==$srchstatus) } selected {/if}>已关闭问题</option>
                    </select>
                </td>

            </tr>
            <tr>




             <td width="20%" ><label >
 注册日期:</label>
             <div class="input-group date form-date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" id="timestart" name="srchdatestart" value="{$srchdatestart}"  readonly="">
            <span class="input-group-addon"><span class="icon-remove"></span></span>
            <span class="input-group-addon"><span class="icon-calendar"></span></span>
          </div>
             </td>
              <td width="20%" >
               <label>
  到</label>
               <div class="input-group date form-date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16"  id="timeend" name="srchdateend" value="{$srchdateend}" readonly="">
            <span class="input-group-addon"><span class="icon-remove"></span></span>
            <span class="input-group-addon"><span class="icon-calendar"></span></span>
          </div>
              </td>

                <td  width="200" class="altbg2">分类:
                    <select class="form-control shortinput" name="srchcategory" id="srchcategory"><option value="0">--不限--</option>{$catetree}</select>
                </td>
            </tr>
            <tr>
              <td  rowspan="2" class="altbg2"><input name="submit" class="btn btn-info" type="submit" value="提 交"></td>
              </tr>
        </tbody>
    </table>
</form>
[共 <font color="green">{$rownum}</font> 个问题]
<form name="queslist" method="POST">
    <table class="table">
        <tr class="header">
            <td width="5%"><input class="checkbox" value="chkall" id="chkall" onclick="checkall('qid[]')" type="checkbox" name="chkall"><label for="chkall">全选</label></td>
            <td  width="30%">标题</td>
            <td  width="15%">提问者</td>
            <td  width="5%">悬赏</td>
            <td  width="10%">回答/查看</td>
            <td  width="5%">状态</td>
            <td  width="10%">IP</td>
            <td  width="12%">提问时间</td>
            <td  width="18%">已推荐</td>
        </tr>
        <!--{if isset($questionlist)} {loop $questionlist $question}-->
        <tr>
            <td class="altbg2">
                <input class="checkbox" type="checkbox" value="{$question['id']}" name="qid[]" >
            </td>
            <td class="altbg2" id="title_{$question['id']}">
          {if $question['shangjin']>0}<label class="label">悬赏{$question['shangjin']}元</label>{/if}  <a href="{url question/view/$question['id']}" target="_blank">{eval echo cutstr($question['title'],46,'');}</a></td>
            <td class="altbg2"><a href="{user/space/$question['authorid']}" target="_blank">{$question['author']}</a></td>
            <td class="altbg2"><font color="#FC6603">{$question['price']}</font></td>
            <td class="altbg2">{$question['answers']} / {$question['views']}</td>
            <td class="altbg2"><img src="{SITE_URL}static/css/admin/icn_{$question['status']}.gif"></td>
            <td class="altbg2">{$question['ip']}</td>
            <td class="altbg2">{$question['format_time']}</td>
            <td class="altbg2">{if $question['status']==6}<img src="{SITE_URL}static/css/admin/icn_6.gif">{else}否{/if}</td>
        </tr>
        <!--{eval $content=htmlspecialchars($question['description']);}-->
        <input type="hidden" id="cont_{$question['id']}" value="{$content}" >
        <!--{/loop}-->
        <!--{/if}-->

        <tr class="smalltxt">
            <td class="altbg2" colspan="9" align="right"><div class="pages">{$departstr}</div></td>
        </tr>

        <tr class="altbg1">
            <td colspan="9">
             <input name="ctrlcase" class="btn" type="button" onClick="buttoncontrol(9);" value="推送到百度">&nbsp;&nbsp;&nbsp;
                <input name="ctrlcase" class="btn" type="button" onClick="buttoncontrol(2);" value="推荐">&nbsp;&nbsp;&nbsp;
                <input name="ctrlcase" class="btn hide" type="button" onClick="buttoncontrol(7);" value="添加到专题">&nbsp;&nbsp;&nbsp;
                <input name="ctrlcase" class="btn" type="button" onClick="buttoncontrol(3);" value="取消推荐">&nbsp;&nbsp;&nbsp;
                <input name="ctrlcase" class="btn" type="button" onClick="movecate();" value="移动分类">&nbsp;&nbsp;&nbsp;
                <input name="ctrlcase" class="btn" type="button" onClick="buttoncontrol(4);" value="关闭问题">&nbsp;&nbsp;&nbsp;
               <input name="ctrlcase" class="btn" type="button" onClick="buttoncontrol(8);" value="设为已解决">&nbsp;&nbsp;&nbsp;
                <input name="ctrlcase" class="btn" type="button" onClick="buttoncontrol(5);" value="设为待解决">&nbsp;&nbsp;&nbsp;
                <input name="ctrlcase" class="btn" type="button" onClick="buttoncontrol(6);" value="删除">
            </td>
        </tr>
    </table>
</form>
<div class="modal fade" id="baidutui">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">百度推送提醒</h4>
    </div>
    <div class="modal-body">
      <p>确定推送？此项操作只有配置了百度推送api地址有效！</p>
    </div>
    <div class="modal-footer">
     <button type="button" id="btntui" class="btn btn-primary">确定推送</button>
     <button type="button"  class="btn btn-primary" onclick="window.location.href='index.php?admin_setting/seo{$setting['seo_suffix']}'">去配置百度推送api地址</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

    </div>
  </div>
</div>
</div>

<div id="dialog_topic" title="添加问题到专题" style="display: none">
    <form name="topicform"  action="index.php?admin_question/addtotopic{$setting['seo_suffix']}" method="post" >
        <input type="hidden" name="qids" value=""  id="topic_qid"/>
        <table border="0" cellpadding="0" cellspacing="0" width="470px">
            <tr>
                <td>
                    <div class="inputbox mt15" id="topic_select">

                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="submit" class="button  mt15" value="确&nbsp;认" /></td>
            </tr>
        </table>
    </form>
</div>
   <link rel="stylesheet" type="text/css" href="{SITE_URL}static/js/jquery-ui/soso/jquery-ui.css" />
<script type="text/javascript" src="{SITE_URL}static/js/jquery-ui/jquery-ui.js"></script>
<div id="dialog_category" title="移动分类" style="display: none">
    <form name="categoryform"  action="index.php?admin_question/movecategory{$setting['seo_suffix']}" method="post" >
        <input type="hidden" name="qids" value="" id="category_qid"/>
        <table class="table" width="470px">
            <tr>
                <td>
                    <div class="inputbox mt15">
                        <select name="category" size=1 style="width:240px" >{$catetree}</select>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="submit" class="button flright mt15" value="确&nbsp;认" /></td>
            </tr>
        </table>
    </form>
</div>

    <link href="{SITE_URL}static/css/dist/lib/datetimepicker/datetimepicker.min.css" rel="stylesheet">
  <script src="{SITE_URL}static/css/dist/lib/datetimepicker/datetimepicker.min.js"></script>
<script type="text/javascript">
$(".form-date").datetimepicker(
	    {
	        language:  "zh-CN",
	        weekStart: 1,
	        todayBtn:  1,
	        autoclose: 1,
	        todayHighlight: 1,
	        startView: 2,
	        minView: 2,
	        forceParse: 0,
	        format: "yyyy-mm-dd"
	    });
    function buttoncontrol(num) {
        if ($("input[name='qid[]']:checked").length == 0) {
            alert('你没有选择任何要操作的问题！');
            return false;
        } else {
            switch (num) {
            case 9:
            	$("#baidutui").modal("show");

            	$("#btntui").click(function(){
            		 document.queslist.action = "index.php?admin_question/baidutui{$setting['seo_suffix']}";
                     document.queslist.submit();
            	})

                break;
                case 2:
                    if (confirm('确定推荐？此项操作只对已解决问题有效！') == false) {
                        return false;
                    } else {
                        document.queslist.action = "index.php?admin_question/recommend{$setting['seo_suffix']}";
                        document.queslist.submit();
                    }
                    break;
                case 3:
                    document.queslist.action = "index.php?admin_question/inrecommend{$setting['seo_suffix']}";
                    document.queslist.submit();
                    break;
                case 4:
                    if (confirm('确定关闭问题,关闭问题一次只能选择一个？') == false) {
                        return false;
                    } else {
                    	if($("input[name='qid[]']:checked").length>1){
                    		alert("关闭问题一次只能选择一个");
                    		 return false;
                    	}
                        document.queslist.action = "index.php?admin_question/close{$setting['seo_suffix']}";
                        document.queslist.submit();
                    }

                    break;
                case 5:
                    if (confirm('确定设为待解决？此项操作只对已解决和未悬赏已关闭问题有效！') == false) {
                        return false;
                    } else {
                        document.queslist.action = "index.php?admin_question/nosolve{$setting['seo_suffix']}";
                        document.queslist.submit();
                    }

                    break;
                case 6:
                    if (confirm('确定删除问题？该操作不可返回！') == false) {
                        return false;
                    } else {
                        document.queslist.action = "index.php?admin_question/delete{$setting['seo_suffix']}";
                        document.queslist.submit();
                    }
                    break;
                case 7:
                    if ($("input[name='qid[]']:checked").length == 0) {
                        alert('你没有选择任何问题');
                        return false;
                    }
                    var qids = document.getElementsByName('qid[]');
                    var num = '', tag = '';
                    for (var i = 0; i < qids.length; i++) {
                        if (qids[i].checked == true) {
                            num += tag + qids[i].value;
                            tag = ",";
                        }
                    }
                    $.ajax({
                        type: "POST",
                        url: "{SITE_URL}index.php?admin_topic/ajaxgetselect{$setting['seo_suffix']}",
                        success: function(selectstr) {
                            $("#topic_select").html(selectstr);
                            $("#topic_qid").val(num);
                            $("#dialog_topic").dialog({
                                autoOpen: false,
                                width: 500,
                                modal: true,
                                resizable: false
                            });
                            $("#dialog_topic").dialog("open");
                        }
                    });
                    break;
                case 8:
                    if (confirm('确定设为已解决？此项操作只对有回答的问题有效！') == false) {
                        return false;
                    } else {
                        document.queslist.action = "index.php?admin_question/solve{$setting['seo_suffix']}";
                        document.queslist.submit();
                    }

                    break;
                default:
                    alert("非法操作！");
                    break;
            }
        }
    }
    function movecate() {
        if ($("input[name='qid[]']:checked").length == 0) {
            alert('你没有选择任何问题');
            return false;
        } else {
            var qids = document.getElementsByName('qid[]');
            var num = '', tag = '';
            for (var i = 0; i < qids.length; i++) {
                if (qids[i].checked == true) {
                    num += tag + qids[i].value;
                    tag = ",";
                }
            }
            $("#category_qid").val(num);
            $("#dialog_category").dialog({
                autoOpen: false,
                width: 500,
                modal: true,
                resizable: false
            });
            $("#dialog_category").dialog("open");
        }
    }
    {if $srchcategory}
    $(document).ready(function(){
        $("#srchcategory option").each(function(){
            if($(this).val()==$srchcategory){
                $(this).prop("selected","true");
            }
        });
    });
    {/if}
</script>

<!--{template footer}-->
