<!--{template header}-->
<style>
<!--

.main-wrapper {
    margin-bottom: 40px;
    background: #fafafa;
    margin-top: 0px;
}
.signature{
color:#999;
}
.imgjiesu{
position: absolute;
    right: 10px;
    top: 13px;
    width: 45px;
    height: 35px;
}
.jinxingzhong{
position: absolute;
    right: 15px;
    top: 13px;
    width: 35px;
    height: 35px;
}
.details-contitle-box{
position:relative;
}

-->
</style>
<div class="scrollshow position-inf" style="display: none;">
   <div class="fix-hnav posd" style="display: block;">
    <p class="title" title="{$question['title']}">          {$question['title']}  </p>
    <div class="btns">
                                        <button type="button" class="btneditanswer" {if $user['uid']==0}  onclick="login()" {else} onclick="showeditor()" {/if} ><i class="fa fa-pencil"></i>写回答</button>
                              
                         <button type="button" {if $user['uid']} onclick="invateuseranswer({$question['id']})"  {else} onclick="login()" {/if}  class="btn-default-secondary details-share" >
                     <i class="fa fa-user-plus"></i>邀请回答</button>
                         {if $user['uid']}
                             {if $is_followed}
                        <input type="button" onclick="window.location.href='{url question/attentto/$question['id']}'" z-st="favorite" class="btn-default-secondary details-collection-btn collection js-not-fav js-project-fav" value="已收藏问题" data-on="1">
                        
                        {else}
                          <input type="button" onclick="window.location.href='{url question/attentto/$question['id']}'" z-st="favorite" class="btn-default-secondary details-collection-btn collection js-not-fav js-project-fav" value="收藏问题" data-on="0">
                        
                        {/if}
                           {else}
                           <input type="button" onclick="login()" z-st="favorite" class="btn-default-secondary details-collection-btn collection js-not-fav js-project-fav" value="收藏问题" data-on="0">
                        
                           {/if}
            </div>
  </div>
  </div>
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/common/commtag.css" />
  <!--{eval $adlist = $this->fromcache("adlist");}-->
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/greendetail.css?v1.1" />
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/widescreendetail.css?v1.1" />
               <!--广告位1-->
            <!--{if (isset($adlist['question_view']['inner1']) && trim($adlist['question_view']['inner1']))}-->
            
     <div class="advlong-bottom">
            <div class="advlong-default">
         
            {$adlist['question_view']['inner1']}
          
            </div>
        </div>
          <!--{/if}-->
  <!--{eval $adlist = $this->fromcache("adlist");}-->
  <div class="work-details-wrap border-bottom">
                <div class="work-details-box-wrap container">
                
   
                    <div class="left-details-head col-md-16">
                                              <div class="works-tag-wrap">
                       
                            
                              
                             <!--{if $taglist}-->
                                       <!--{loop $taglist $tag}-->

  <a href="{url tags/view/$tag['tagalias']}" title="{$tag['tagname']}" target="_blank" class="project-tag-14">{$tag['tagname']}</a>
                           
               
                <!--{/loop}--><!--{else}--><!--{/if}-->
                
                           
                        </div>
                        <div class="details-contitle-box">
                            <!--标题-->
                            <h2>
                            {$question['title']}    
                                   {if $question['shangjin']&&$question['status']==1}<img class="jinxingzhong" src="{SITE_URL}static/images/jinxingzhong.png"/> {/if}
                                     
                                    {if $question['shangjin']&&$question['status']==2}<img class="imgjiesu" src="{SITE_URL}static/images/yijiesu.png"/> {/if}
          
                                      {if $question['price']>0}    
                      <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="悬赏 {$question['price']}财富值，采纳后可获得"  class="icon_jifen"><i class="fa fa-database mar-r-03"></i>财富值{$question['price']}</span>
  {/if}
                
                             {if $question['shangjin']!=0}
                      <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="如果回答被采纳将获得 {$question['shangjin']}元，可提现" class="icon_hot"><i class="fa fa-hongbao mar-r-03"></i>悬赏$question['shangjin']元</span>

                    {/if}
                                 
                                  {if $question['hasvoice']!=0}
                      <span data-toggle="tooltip" data-placement="bottom" title=""  class="icon_green"><i class="fa fa-volume-up mar-r-03"></i>语音偷听</span>
                    {/if}
                                    
                                
                                      {if $question['askuid']>0}
                      <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="邀请{$question['askuser']['username']}回答"  class="icon_zise"><i class="fa fa-twitch mar-r-03"></i>邀请回答</span>
                  {/if}
                  {if $question['status']!=9}
                    {if $showtime}
                    <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="超过时间没有采纳，系统将自动分配最佳答案，没有回答赏金自动返回给作者"  class="time-item hide">
                    【<span id="day_show">0天</span>

	<strong id="hour_show">0时</strong>

	<strong id="minute_show">0分</strong>

	<strong id="second_show">0秒</strong>】
	</span>
	<script>

		setoutTime({$outtime});
		$(".time-item").removeClass("hide").css("color","#ea644a").show()

	</script>
                    {/if}
                        {/if}
                                





                            </h2>
                           
                            <!--发布时间-->
                            <p  class="title-time">
                              
                                <span>{$question['format_time']}</span>发布
                                    <span class="share-group">
        <a class="share-circle share-weixin" data-action="weixin-share" data-toggle="tooltip" data-original-title="分享到微信">
          <i class="fa fa-wechat"></i>
        </a>
        <a class="share-circle" data-toggle="tooltip" href="javascript:void((function(s,d,e,r,l,p,t,z,c){var%20f='http://v.t.sina.com.cn/share/share.php?appkey=1515056452',u=z||d.location,p=['&amp;url=',e(u),'&amp;title=',e(t||d.title),'&amp;source=',e(r),'&amp;sourceUrl=',e(l),'&amp;content=',c||'gb2312','&amp;pic=',e(p||'')].join('');function%20a(){if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=440,height=430,left=',(s.width-440)/2,',top=',(s.height-430)/2].join('')))u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();})(screen,document,encodeURIComponent,'','','{$setting['site_logo']}', '推荐 {$question['author']} 的问题《{$question['title']}》','{url question/view/$question[id]}','页面编码gb2312|utf-8默认gb2312'));" data-original-title="分享到微博">
          <i class="fa fa-weibo"></i>
        </a>

  <a  class="share-circle" data-toggle="tooltip"  target="_self" data-original-title="分享到qq" href="javascript:shareqq()"   title="分享到QQ"><i class="fa fa-qq"></i></a>



  <script type="text/javascript">
  //document.write(['<a class="share-circle" data-toggle="tooltip"  target="_self" data-original-title="分享到qq空间" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=',encodeURIComponent(location.href),'&title=',encodeURIComponent(document.title),'" target="_self"   title="分享到QQ空间"> <i class="fa fa-qq"></i><\/a>'].join(''));


  function shareqq()
  {
      var p = {
          url: location.href,/*获取URL，可加上来自分享到QQ标识，方便统计*/
          desc: " {eval    echo  clearhtml(htmlspecialchars_decode(htmlspecialchars_decode(replacewords($question['description']))),50);    }", 
          title : document.title,/*分享标题(可选)*/
          summary : document.title,/*分享描述(可选)*/
          pics : "{$question['author_avartar']}",/*分享图片(可选)*/
          flash : '', /*视频地址(可选)*/
          //commonClient : true, /*客户端嵌入标志*/
          site: "{$setting['site_name']}"/*分享来源 (可选) ，如：QQ分享*/
      };


      var s = [];
      for (var i in p) {
          s.push(i + '=' + encodeURIComponent(p[i] || ''));
      }
      var target_url = "http://connect.qq.com/widget/shareqq/iframe_index.html?" + s.join('&') ;
      window.open(target_url, 'qq',
              'height=520, width=720');
  }
  
  </script>
  
      </span>
                            </p>
                            <!--分类,版权,浏览数,评论数,推荐数-->
                            <div class="work-head-box">
                                <div class="head-left">
                                            <span class="head-index">
                                                <span><a href="{url new/default}" target="_blank">站内问答</a></span>
                                                <i>/</i>
                                                <span>
                                                   <a class="notebook" href="{url category/view/$question['cid']}" data-toggle="tooltip" data-html="true" data-original-title="问题归属分类">
 <span>{$question['category_name']}</span>
                </a>  
                                                </span>
                                              

                                            </span>
                                 
                                </div>
                                <div class="head-right">
                                            <span class="head-data-show">

                                            <a href="javascript:;" title="共{$question['views']}人气" class="see vertical-line">
                                                <i></i>{$question['views']}
                                            </a>
                                            <a href="javascript:;" title="共{$question['answers']}回答" class="news vertical-line">
                                                <i></i>{$question['answers']}
                                            </a>
                                            <a href="javascript:;" title="共 {$question['attentions']}收藏" class="recommend-show">
                                                <i></i> {$question['attentions']}
                                            </a>
                                            </span>
                                            
                                             <!--{if $user['grouptype']==1||$user['uid']==$question['authorid']}-->
                <!-- 如果是当前作者，加入编辑按钮 -->
                <a href="javascript:void(0)"  data-toggle="dropdown" class=" dropdown-toggle">操作 <i class="fa fa-angle-down mar-lr-05"></i> </a>
                 <ul class="dropdown-menu" role="menu">

  <!--{if $user['grouptype']==1}-->
     <li>

                    <a href="{url topicdata/pushindex/$question['id']/qid}" >
                      <span>顶置问题</span>
                    </a>
                      </li>

                     <li>

                    <a id="changecategory" data-toggle="modal" data-target="#catedialog" >
                    <span>移动分类</span>
                    </a>
                      </li>
                           <!--{/if}-->
                       <li>

                    <a href="{url question/edit/$question[id]}" >
                       <span>编辑问题</span>
                    </a>
                      </li>
                       {if $question['shangjin']==0}
                           <li>

                    <a id="delete_question">
                    <span>删除问题</span>
                    </a>
                      </li>
                        {/if}
                       <li>

                    <a id="close_question">
                       <span>关闭问题</span>
                    </a>
                      </li>
                        <li>

                    <a onclick="edittag();">
                       <span>编辑标签</span>
                    </a>
                      </li>

                             </ul>
                               <!--{/if}-->

                                </div>
                            </div>
                        </div>
                    </div>
                    




<div class="top-author-card follow-box col-md-8">
    <div class="card-designer-list-details details-right-author-wrap card-media">

        <input type="hidden" name="creator" value="601779">
        <div class="avatar-container-80">
                   {if $question['hidden']!=1}
            <a href="{url user/space/$question['authorid']}" title="{$question['author']}" class="avatar" target="_blank">
                <img src="{$question['author_avartar']}" width="80" height="80" alt="">
            </a>
             {else}
                <a href="javascript:void(0);" title="匿名用户" class="avatar" >
                <img src="{SITE_URL}static/css/default/avatar.gif" width="80" height="80" alt="">
            </a>
                {/if}
        </div>
        <div class="author-info">
            <p class="author-info-title">
             {if $question['hidden']!=1}
             
                <a href="{url user/space/$question['authorid']}" title="{$question['author']}" class="title-content" target="_blank">
              {$question['author']}
                 {if $question['author_has_vertify']!=false}<i class="fa fa-vimeo {if $question['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $question['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}
                </a>
                
                {else}
                   <a href="javascript:void(0);" title="匿名用户" class="title-content" >
             匿名用户
                
                </a>
                {/if}


            </p>
              {if $question['hidden']==0}
                          <div class="position-info">
                <span>{if $question['user']['gender']==0}女{/if}{if $question['user']['gender']==1}男{/if}&nbsp;|&nbsp;{$question['user']['signature']}</span>
            </div>
            {else}
                      <div class="position-info">
                <span>保密&nbsp;|&nbsp;保密</span>
            </div>
               {/if}

              {if $question['hidden']==0}
            <div class="btn-area">
              
                        <div class="js-project-focus-btn">
                                   <!-- 关注用户按钮 -->
                 {if  $is_followedauthor}
                                <input type="button" title="已关注" id="attenttouser_{$question['authorid']}" onclick="attentto_user($question['authorid'])" class="btn-current attention btn-default-secondary following" value="已关注" >
                              {else}
                               <input type="button" title="添加关注" id="attenttouser_{$question['authorid']}" onclick="attentto_user($question['authorid'])" class="btn-current attention btn-default-main notfollow" value="关注">
                                {/if}
                        </div>
                           {if $user['uid']}
                        <a href="{url message/sendmessage/$question['authorid']}" title="发私信" class="btn-default-secondary btn-current private-letter">私信</a>
                    {else}
                       <a href="javascript:login()" title="发私信" class="btn-default-secondary btn-current private-letter">私信</a>
                     
                      {/if}
            </div>
             {/if}
        </div>
    </div>
</div>

                </div>
                <div class="container ">
      
                 <div class="content-wrap">
          <div class="left-details-head" style="border:none">
                      <!-- 问题描述 -->
      {if $question['description']}
      
            
            <div class="show-content  ">
                  {eval    echo  replacewords($question['description']);    }
           
            </div>
            
            {/if}
                </div>
   <div class="details-con-other border-top"  {if !$question['description']} style="margin-top:0px;"  {/if}>
                <div class="">
                   
             
                    
                    <div class="three-link">
                      <span class="report"  {if $user['uid']} onclick="openinform({$question['id']},'{$question['title']}',0)" {else} onclick="login()" {/if}  id="report-modal"><a href="javascript:;">举报 </a></span>
                     
                       
                     
               
                      
                                                    {if $user['uid']}
                             {if $is_followed}
                        <input type="button" onclick="window.location.href='{url question/attentto/$question['id']}'" z-st="favorite" class="btn-default-secondary details-collection-btn collection js-not-fav js-project-fav" value="已收藏问题" data-on="1">
                        
                        {else}
                          <input type="button" onclick="window.location.href='{url question/attentto/$question['id']}'" z-st="favorite" class="btn-default-secondary details-collection-btn collection js-not-fav js-project-fav" value="收藏问题" data-on="0">
                        
                        {/if}
                           {else}
                           <input type="button" onclick="login()" z-st="favorite" class="btn-default-secondary details-collection-btn collection js-not-fav js-project-fav" value="收藏问题" data-on="0">
                        
                           {/if}
                      
                         <button type="button" class="btneditanswer" {if $user['uid']==0}  onclick="login()" {else} onclick="showeditor()" {/if} ><i class="fa fa-pencil"></i>写回答</button>
                      
                          <button type="button" {if $user['uid']} onclick="invateuseranswer({$question['id']})"  {else} onclick="login()" {/if}  class="btn-default-secondary details-share" >
                     <i class="fa fa-user-plus"></i>邀请回答</button>
                      
                    </div>
                </div>
            </div>
   
   </div>
                </div>
            </div>
<div class="container index" id="showanswerform">
<div class="row">
   <div class="col-md-17 main " style="padding:0px;">
   <div class="note ">
      <div class="post">
      <div class="comment-list">
    <div class="new-comment canwirteanswer" style="margin:0px 10px 10px 10px;">
       <div style="" class="answer-txtbox bb top-answer" id="answer-txtbox">
               <!--{if 9!=$question['status']  }-->
        {if $user['uid']!=0}
 <form class="new-comment" id="huidaform"  name="answerForm"  method="post" style="margin:10px;">
  <input type="hidden" value="{$question['id']}" id="ans_qid" name="qid">
   <input type="hidden" id="tokenkey" name="tokenkey" value='{$_SESSION["answertoken"]}'/>
                <input type="hidden" value="{$question['title']}" id="ans_title" name="title">


    <!--{template editor}-->
  <div class="write-function-block">
    

  <a class="btn btn-send" id="ajaxsubmitasnwer">发送</a>
  </div>
  
      <!--{if $setting['code_ask']&&$user['credit1']<$setting['jingyan']}-->
     <div class="write-function-block ">

 {template code}

 </div>
    <!--{/if}-->
  </form>
      {else}

            {/if}

              <!--{else}-->
               <div class="c-text alert alert-success-inverse"><i class="fa fa-info-circle mar-ly-1"></i>该问题目前已经被作者或者管理员关闭, 无法添加新回复</div>
                     <!--{/if}-->
    </div>
    
  
         </div>
   

    {if $question['answers']==0}
 
  
<div class="noreplaytext bb">
<center><div>暂时还没有回答，开始

<button type="button" {if $user['uid']==0}  onclick="login()" {else} onclick="showeditor()" {/if} class="writefirstanswer">写第一个回答</button>
</div></center>
</div>
    {/if}
<div id="comment-list" class="comment-list bb" style="margin:0px;margin-bottom:20px;{if $question['answers']==0}display:none;{/if}">

        <div id="normal-comment-list" class="normal-comment-list">
        <div>
        <div>
        <div class="top" id="comments">
        <span>{$question['answers']}条回答</span>

           <div class="pull-right">
       
           </div>
           </div>
           </div>
            <!--{if $bestanswer['id']>0}-->

               <div id="comment-{$bestanswer['id']}" class="comment">

            <div>
              {if $question['authorid']==$bestanswer['authorid']&&$question['hidden']==1}
            <div class="author">
            <a href="javascript:"  class="avatar">
            <img src="{SITE_URL}static/css/default/avatar.gif">
            </a>
            <div class="info">
            <a href="javascript:" class="name">
            匿名用户
            </a>
            <!---->
             <div class="meta">
             <span>1楼 · {$bestanswer['format_time']}.<span class="text-danger"><i class="fa fa-check"></i>采纳回答</span></span>
             </div>
             </div>
             </div>
                {else}
                           <div class="author">
            <a href="{url user/space/$bestanswer['authorid']}" target="_self" class="avatar">
            <img src="{$bestanswer['author_avartar']}">
            </a>
            <div class="info">
            <a href="{url user/space/$bestanswer['authorid']}" target="_self" class="name">
            {$bestanswer['author']}
             {if $bestanswer['author_has_vertify']!=false}<i class="fa fa-vimeo {if $bestanswer['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $bestanswer['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}
           {if $bestanswer['signature']} <span class="signature">- $bestanswer['signature']</span> {/if}
            </a>
            <!---->
             <div class="meta">
             <span>1楼 · {$bestanswer['format_time']}.<span class="text-danger"><i class="fa fa-check"></i>采纳回答</span></span>
             </div>
             </div>
             </div>

             {/if}
             <div class="comment-wrap art-content">
             <div class="answercontent" style="max-height:1000000px">
                {eval    echo replacewords($bestanswer['content']);    }

                 <div class="appendcontent">
                                <!--{loop $bestanswer['appends'] $append}-->
                                <div class="appendbox">
                                    <!--{if $append['authorid']==$bestanswer['authorid']}-->
                                    <h4 class="appendanswer font-12">回答:<span class="time">
                                    {$bestanswer['format_time']}</span></h4>
                                    <!--{else}-->
                                    <h4 class="appendask font-12">作者追问:<span class='time'>{$bestanswer['format_time']}</span></h4>
                                    <!--{/if}-->
                                       <div class="zhuiwentext">   {eval    echo replacewords($append['content']);    }
                                       </div>
                                <div class="clr"></div>
                                </div>
                                <!--{/loop}-->
                        </div>
            </div>
             
             <div class="tool-group">
                <a class="button_agree dianzan" id='{$bestanswer['id']}'><i class="fa fa-eject"></i> <span>{$bestanswer['supports']}人赞</span></a>
             <a class="icon_discuss jsslideshowcomment showcommentid" data-id="{$bestanswer['id']}" onclick="show_comment('{$bestanswer['id']}');"><i class="fa fa-cloud"></i> <span>  添加讨论({$bestanswer['comments']})</span></a>
            
                  <!--{if  1==$user['grouptype'] ||$user['uid']==$bestanswer['authorid']}-->

                       <a href="{url answer/append/$question['id']/$bestanswer['id']}" data-original-title="继续回答问题"  data-placement="bottom" title="" data-toggle="tooltip" ><i class="fa fa-edit"></i> <span>继续回答</span></a>

               <a href="{url question/editanswer/$bestanswer['id']}" data-original-title="修改自己答案"  data-placement="bottom" title="" data-toggle="tooltip" ><i class="fa fa-edit"></i> <span>编辑</span></a>
                 <!--{/if}-->
                <!--{if $user['uid']==$question['authorid']}-->

           <a data-placement="bottom" title="" data-toggle="tooltip" data-original-title="继续回答问题" href="{url answer/append/$question['id']/$bestanswer['id']}"><i class="fa fa-file-powerpoint-o"></i> <span>追问</span></a>


               <!--{/if}-->
        

               <a class="report" onclick="openinform({$question['id']},'{$question['title']}',{$bestanswer['id']})"><span>举报</span></a>
                <!---->
                </div>
                </div>
             
                </div>
                <div class="comments-mod "  style="display: none; float:none;padding-top:10px;" id="comment_{$bestanswer['id']}">
                    <div class="areabox clearfix">


                  <div class="input-group">
             <input type="text" placeholder="请输入评论内容，不少于5个字" AUTOCOMPLETE="off" class="comment-input form-control" name="content" />
                        <input type='hidden' value='0' name='replyauthor' />
              <span class="input-group-btn"><input type="button" value="评论"  class="btn btn-green" name="submit" onclick="addcomment({$bestanswer['id']});"/> </span>
            </div>

                    </div>
                    <ul class="my-comments-list nav">
                        <li class="loading">
                        <img src='{SITE_URL}static/css/default/loading.gif' align='absmiddle' />
                        &nbsp;加载中...
                        </li>
                    </ul>
                </div>
                </div>

                <!--{/if}-->
            <!--{if $answerlist==null&&$bestanswer==null}-->
            <div class="no-comment"></div>
             <!--{if 9!=$question['status']  }-->
              <div class="text">
            沙发正空，不想<a>发表一点想法</a>咩~
          </div>
              <!--{else}-->
               <div class="text">
           还没有人回答过~
          </div>
               <!--{/if}-->

              <!--{/if}-->
             
          <!--{loop $answerlist $nindex $answer}-->
         
            <div id="comment-{$answer['id']}" class="comment">
            <div>
              {if $question['authorid']==$answer['authorid']&&$question['hidden']==1}
            <div class="author">
            <a href="javascript:" class="avatar">
            <img src="{SITE_URL}static/css/default/avatar.gif">
            </a>
            <div class="info">
            <a href="javascript:"  class="name">
            匿名用户
            </a>
            <!---->
             <div class="meta">
             <span>{eval echo $nindex+2;}楼-- · {$answer['time']}</span>
             </div>
             </div>
             </div>
             {else}
                    <div class="author">
            <a href="{url user/space/$answer['authorid']}" target="_self" class="avatar">
            <img src="{$answer['author_avartar']}">
            </a>
            <div class="info">
            <a href="{url user/space/$answer['authorid']}" target="_self" class="name">
            {$answer['author']}
              {if $answer['author_has_vertify']!=false}<i class="fa fa-vimeo {if $answer['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $answer['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}
                {if $answer['signature']} <span class="signature">- $answer['signature']</span> {/if}
            </a>
            <!---->
             <div class="meta">
             <span>{eval echo $nindex+2;}楼-- · {$answer['time']}</span>
             </div>
             </div>
             </div>
             {/if}
             <div class="comment-wrap art-content">
             <div class="answercontent" style="max-height:1000000px">
                                 {eval    echo replacewords($answer['content']);    }

                 <div class="appendcontent">
                                <!--{loop $answer['appends'] $append}-->
                                <div class="appendbox">
                                    <!--{if $append['authorid']==$answer['authorid']}-->
                                    <h4 class="appendanswer font-12">回答:<span class="time">
                                    {$append['format_time']}</span></h4>
                                    <!--{else}-->
                                    <h4 class="appendask font-12">作者追问:<span class='time'>{$append['format_time']}</span></h4>
                                    <!--{/if}-->
                                       <div class="zhuiwentext ">   {eval    echo replacewords($append['content']);    }
                                       </div>
                                <div class="clr"></div>
                                </div>
                                <!--{/loop}-->
                        </div>
            </div>
       
             <div class="tool-group">
             <a class="button_agree dianzan" id='{$answer['id']}'><i class="fa fa-eject"></i> <span>{$answer['supports']}人赞</span></a>

                                                  <a class="icon_discuss jsslideshowcomment showcommentid" data-id="{$answer['id']}"   onclick="show_comment('{$answer['id']}');"><i class="fa fa-cloud"></i> <span>  添加讨论({$answer['comments']})</span></a>


                  <!--{if  1==$user['grouptype'] ||$user['uid']==$answer['authorid']}-->

                       <a href="{url answer/append/$question['id']/$answer['id']}" data-original-title="继续回答问题"  data-placement="bottom" title="" data-toggle="tooltip" ><i class="fa fa-edit"></i> <span>继续回答</span></a>

               <a href="{url question/editanswer/$answer['id']}" data-original-title="修改自己答案"  data-placement="bottom" title="" data-toggle="tooltip" ><i class="fa fa-edit"></i> <span>编辑</span></a>
                 <!--{/if}-->
                <!--{if $user['uid']==$question['authorid']}-->

           <a data-placement="bottom" title="" data-toggle="tooltip" data-original-title="追问回答者" href="{url answer/append/$question['id']/$answer['id']}"><i class="fa fa-file-powerpoint-o"></i> <span>追问</span></a>


               <!--{/if}-->

                    <!--{if $bestanswer['id']<=0}-->
         <!--{if 1==$user['grouptype'] ||$user['uid']==$question['authorid']}-->

                                <a data-placement="bottom" title="" data-toggle="tooltip" data-original-title="采纳满意回答"   href="javascript:void(0);" onclick="adoptanswer({$answer['id']});"><i class="fa fa-bookmark-o"></i> <span>采纳</span></a>
                                <!--{/if}-->
                             <!--{/if}-->
                
                <!--{if 1==$user['grouptype'] ||$user['uid']==$answer['authorid']}-->

    <a data-placement="bottom" title="" data-toggle="tooltip" data-original-title="删除回答"   href="javascript:void(0);" onclick="deleteanswer($answer['id'])"><i class="fa fa-trash-o"></i> <span>删除</span></a>
     <!--{/if}-->
               <a class="report" onclick="openinform({$question['id']},'{$question['title']}',{$answer['id']})"><span>举报</span></a>
                <!---->
                </div>
                </div>
                  
                </div>


                        <div class="comments-mod " style="display: none; float:none;padding-top:10px;" id="comment_{$answer['id']}">
                            <div class="areabox clearfix" >

                               <div class="input-group">
             <input type="text" placeholder="请输入评论内容，不少于5个字" AUTOCOMPLETE="off" class="comment-input form-control" name="content" />
                        <input type='hidden' value='0' name='replyauthor' />
              <span class="input-group-btn"><input type="button" value="评论"  class="btn btn-green" name="submit" onclick="addcomment({$answer['id']});"/> </span>
            </div>

                            </div>
                            <ul class="my-comments-list nav">
                                <li class="loading text-left"><img src='{SITE_URL}static/css/default/loading.gif' align='absmiddle' />&nbsp;加载中...</li>
                            </ul>
                        </div>

                </div>
 <!--{/loop}-->
  <div class="pages" >{$departstr}</div>
   
               </div>
               </div>
     <div>
        
                 
        </div>
               </div>
               {if $user['uid']>0&&$question['status']!=9&&$question['status']!=0}
                <script type="text/javascript">
 loadinneruserbyanswerincid("{$qid}");
 function loadinneruserbyanswerincid(_qid){
	  	var _url=g_site_url+"index.php?question/loadinavterbyanswerincid.html";
	  	data={qid:_qid}
	  	function success(result){
		 

		  
	  		$(".box_m_invatelist").html("");
	  		if(result.code==20000){
	  			 $("#dialog_invate .m_invateinfo span.m_i_view").attr("data-content",result.invateuserlist);
	  		
	  			   $(".m_i_persionnum").html(result.invatenum);
	                 $(".box_m_invatelist").html(result.message);
	                
	                 $(".m_invate_user").click(function(){
	              	   var _backnum=$(this).attr("data-back");
	              	   if(_backnum&&_backnum==1){
	              		   cancelinvateuser($(this),$(this).attr("data-qid"),$(this).attr("data-uid"),false);
	              	   }else{
	              		   invateuseranswerhome($(this),$(this).attr("data-qid"),$(this).attr("data-cid"),$(this).attr("data-uid"))
	              	   }
	              	 
	                 })
	  		}else{
	  		  
		  		$(".noanswers").hide();
	  			
	  		}
	  		  
	  		
	  	}
	  	ajaxpost(_url,data,success);
	  }
 </script>
    <div class="noanswers bb hanswer">
    <div class="maters">
        <p class="tit">您可以邀请下面用户，快速获得回答</p>

        <div class="box_m_invatelist"></div>
            <p class="invateload-more" onclick="invateuseranswer($qid)" >加载更多答主</p>
            </div>
    </div>
    {/if}
                      <!--{eval $attentionlist = $this->fromcache("attentionlist");}-->
               <div class="new-answer bb">
       <h3 class="title">一周热门 <a href="{url content/solve}" target="_blank" class="more">更多<font>&gt; </font></a></h3>
       <div class="inf-list">
          <ul class="clearfix">
                   
                      <!--{loop $attentionlist $index $solve}-->
   <li><a href="{url question/view/$solve['id']}" title="{$solve['title']}">{eval echo clearhtml($solve['title'],22);}</a></li>
              
     
           
                 
  <!--{/loop}-->
  
                      </ul>
       </div>
    </div>
    
               </div>
    </div>


</div>

   </div>

   <div class="col-md-7  aside ">
   

   <div class="standing">
  <div class="positions bb" id="rankScroll">
      <h3 class="title">相关问答</h3>
      <ul>
      
  <!--{loop $solvelist $solve}-->
  {if $question['id']!=$solve['questionid']}
              <li class="no-video">
        <a href="{url question/view/$solve['questionid']}" title="{$solve['title']}" >   {$solve['title']} </a>
               <div class="num-ask">
               <a href="{url question/view/$solve['questionid']}"  class="anum"> {$solve['answers']} 个回答</a>
               </div>
              </li>
                 {/if}
                 
  <!--{/loop}-->
              </ul>
  </div>
  </div>
  {if  $topiclist}
     <div class="standing">
  <div class="positions bb" id="rankScroll">
      <h3 class="title">相关文章</h3>
      <ul>
      


    <!--{loop $topiclist $topic}-->
              <li class="no-video">
        <a href="{url topic/getone/$topic['articleid']}" title="{$topic['title']}" >  {$topic['title']}</a>
               <div class="num-ask">
               <a href="{url topic/getone/$topic['articleid']}" title="{$topic['title']}" class="anum"> {$topic['articles']} 个评论</a>
               </div>
              </li>
                <!--{/loop}-->
               

              </ul>
  </div>
  </div>
  {/if}

                               


            <!--广告位5-->
        <!--{if (isset($adlist['question_view']['right1']) && trim($adlist['question_view']['right1']))}-->

        <div class="right_ad">{$adlist['question_view']['right1']}</div>


        <!--{/if}-->
   </div>
</div>
</div>

<div class="modal fade" id="dialogadopt">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">采纳回答</h4>
    </div>
    <div class="modal-body">

     <form class="form-horizontal"  name="editanswerForm"  method="post" >
        <input type="hidden"  value="{$question['id']}" id="adopt_qid" name="qid"/>
        <input type="hidden" id="adopt_answer" value="0" name="aid"/>
        <table  class="table ">
            <tr valign="top">
                <td>向帮助了您的网友说句感谢的话吧!</td>
            </tr>
            <tr>
                <td>
                    <div class="inputbox mt15">
                        <textarea class="form-control" id="adopt_txtcontent"  name="content">非常感谢!</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td><button type="button" id="adoptbtn" class="btn btn-success" >确&nbsp;认</button></td>
            </tr>
        </table>
    </form>

    </div>

  </div>
</div>
</div>
<script>
if(typeof($(".work-show-box").find("img").attr("data-original"))!="undefined"){
	var imgurl=$(".work-show-box").find("img").attr("data-original");
	$(".work-show-box").find("img").attr("src",imgurl);
}
$(".work-show-box,.answercontent").find("img").attr("data-toggle","lightbox").attr("data-lightbox-group",Date.parse( new Date() ).toString());

$("#adoptbtn").click(function(){
	  var data={
    			content:$("#adopt_txtcontent").val(),
    			qid:$("#adopt_qid").val(),
    			aid:$("#adopt_answer").val()

    	}

	$.ajax({
	    //提交数据的类型 POST GET
	    type:"POST",
	    //提交的网址
	    url:"{url question/ajaxadopt}",
	    //提交的数据
	    data:data,
	    //返回数据的格式
	    datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
	    //在请求之前调用的函数
	    beforeSend:function(){},
	    //成功返回之后调用的函数
	    success:function(data){
	    	var data=eval("("+data+")");
	       if(data.message=='ok'){
	    	   new $.zui.Messager('采纳成功!', {
	    		   type: 'success',
	    		   close: true,
	       	    placement: 'center' // 定义显示位置
	       	}).show();
	    	   setTimeout(function(){
	               window.location.reload();
	           },1500);
	       }else{
	    	   new $.zui.Messager(data.message, {
	        	   close: true,
	        	    placement: 'center' // 定义显示位置
	        	}).show();
	       }


	    }   ,
	    //调用执行后调用的函数
	    complete: function(XMLHttpRequest, textStatus){

	    },
	    //调用出错执行的函数
	    error: function(){
	        //请求出错处理
	    }
	 });
})

</script>
</div>
<!-- 编辑标签 -->

<div class="modal fade" id="dialog_tag">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">编辑标签</h4>
    </div>
    <div class="modal-body">

    <form onsubmit=" return checktagsubmit()" class="form-horizontal"  name="edittagForm"  action="{url question/edittag}" method="post" >
        <input type="hidden"  value="{$question['id']}" name="qid"/>

                <p>最多设置5个标签!</p>

                    <div class="inputbox mar-t-1">
                      <div class=" dongtai ">
          <div class="tags">
          {loop $taglist $tag}
             <div class="tag"><span tagid="{$tag['id']}">{$tag['tagname']}</span><i class="fa fa-close"></i></div>
             {/loop}
          </div>
            <input type="text" autocomplete="off"  data-toggle="tooltip" data-placement="bottom" title="" placeholder="检索标签，最多添加5个,添加标签更容易被回答" data-original-title="检索标签，最多添加5个" name="topic_tagset" value=""  class="txt_taginput" >
            <i class="fa fa-search"></i>
           <div class="tagsearch">
        
          
           </div>
            
          </div>
          
                        <input type="hidden"  class="form-control" id="qtags" name="qtags" value=""/>
                    </div>

            <div class="mar-t-1">

                <button type="submit" class="btn btn-success">保存</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </form>

    </div>

  </div>
</div>
</div>
 <!--{if 1==$user['grouptype'] && $user['uid']}-->
<div class="modal fade" id="catedialog">
<div class="modal-dialog modal-md" style="width: 460px; top: 50px;">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">修改分类</h4>
    </div>
    <div class="modal-body">

      <div id="dialogcate">
        <form class="form-horizontal"  name="editcategoryForm" action="{url question/movecategory}" method="post">
            <input type="hidden" name="qid" value="{$question['id']}" />
            <input type="hidden" name="category" id="categoryid" />
            <input type="hidden" name="selectcid1" id="selectcid1" value="{$question['cid1']}" />
            <input type="hidden" name="selectcid2" id="selectcid2" value="{$question['cid2']}" />
            <input type="hidden" name="selectcid3" id="selectcid3" value="{$question['cid3']}" />
            <table class="table ">
                <tr valign="top">
                    <td >
                        <select  id="category1" class="catselect" size="8" name="category1" ></select>
                    </td>
                    <td align="center" valign="middle" ><div style="display: none;" id="jiantou1">>></div></td>
                    <td >
                        <select  id="category2"  class="catselect" size="8" name="category2" style="display:none"></select>
                    </td>
                    <td align="center" valign="middle" ><div style="display: none;" id="jiantou2">>>&nbsp;</div></td>
                    <td >
                        <select id="category3"  class="catselect" size="8"  name="category3" style="display:none"></select>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">


                <span>
                    <input  type="submit" class="btn btn-success" value="确&nbsp;认" onclick="change_category();"/></span>
                    <span>
                    <button type="button" class="btn btn-default mar-lr-1" data-dismiss="modal">关闭</button>
                    </span>


                    </td>
                </tr>
            </table>
        </form>
    </div>

    </div>

  </div>
</div>
</div>
  <!--{/if}-->
<!-- 举报 -->
<div class="modal fade panel-report" id="dialog_inform">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">举报内容</h4>
    </div>
    <div class="modal-body">

<form id="rp_form" class="rp_form"  action="{url inform/add}" method="post">
<input value="" type="hidden" name="qid" id="myqid">
<input value="" type="hidden" name="aid" id="myaid">
<input value="" type="hidden" name="qtitle" id="myqtitle">
<div class="js-group-type group group-2">
<h4>检举类型</h4><ul>
<li class="js-report-con">
<label><input type="radio" name="group-type" value="1"><span>检举内容</span></label>
</li>
<li class="js-report-user">
<label><input type="radio" name="group-type" value="2"><span>检举用户</span></label>
</li>
</ul>
</div>
<div class="group group-2">
<h4>检举原因</h4><div class="list">
<ul>
<li>
<label class="reason-btn"><input type="radio" name="type" value="4"><span>广告推广</span></label>
</li>
<li>
<label class="reason-btn"><input type="radio" name="type" value="5"><span>恶意灌水</span></label>
</li>
<li>
<label class="reason-btn"><input type="radio" name="type" value="6"><span>回答内容与提问无关</span>
</label>
</li>
<li>
<label class="copy-ans-btn"><input type="radio" name="type" value="7"><span>抄袭答案</span></label>
</li>
<li>
<label class="reason-btn"><input type="radio" name="type" value="8"><span>其他</span></label>
</li>
</ul>
</div>
</div>
<div class="group group-3">
<h4>检举说明(必填)</h4>
<div class="textarea">
<ul class="anslist" style="display:none;line-height:20px;overflow:auto;height:171px;">
</ul>
<textarea name="content" maxlength="200" placeholder="请输入描述200个字以内">
</textarea>
</div>
</div>
    <div class="mar-t-1">

                <button type="submit" id="btninform" class="btn btn-success">提交</button>
                 <button type="button" class="btn btn-default mar-ly-1" data-dismiss="modal">关闭</button>
      </div>
</form>


    </div>

  </div>
</div>
</div>

<!-- 微信分享 -->
<div class="modal share-wechat animated" style="display: none;"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" data-dismiss="modal" class="close">×</button></div> <div class="modal-body"><h5>打开微信“扫一扫”，打开网页后点击屏幕右上角分享按钮</h5> <div data-url="{url question/view/$question['id']}" class="qrcode" title="{url question/view/$question['id']}"><canvas width="170" height="170" style="display: none;"></canvas>
<div id="qr_wxcode">
</div></div></div> <div class="modal-footer"></div></div></div></div>



 <!-- 邀请回答 -->

<div class="modal fade" id="dialog_invate" >
<div class="modal-dialog" style="width:700px;top:-30px;">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title"></h4>
       <div class="m_invateinfo">
              <span class="m_i_text""> 您已邀请<span class="m_i_persionnum">15</span>人回答</span>
       <span  data-toggle="popover" data-tip-class="popover-info" data-html="ture" data-placement="bottom" data-content="" title="我的邀请列表" class="m_i_view">查看邀请</span>

       <div class="m_i_warrper">
        <input data-qid="{$question['id']}" type="text" id="m_i_searchusertxt" class="m_i_search" placeholder="搜索你想邀请的人">
        <i class="fa fa-search"></i>
       </div>

       </div>
    </div>
    <div class="modal-body" >
     <!-- 邀请回答 -->
    <ul class="trigger-menu m_invate_tab" data-pjax-container="#list-container">
 <li class="active" data-qid="{$question['id']}" data-item="1"><a href="javascript:">擅长该话题的人</a></li>
<li class="" data-qid="{$question['id']}" data-item="2"><a href="javascript:"> 回答过该话题的人</a></li>
<li class="" data-qid="{$question['id']}" data-item="3"><a href="javascript:">我关注的人</a></li>

 </ul>
     <!-- 邀请回答列表 -->
       <div class="m_invatelist">
       </div>

    </div>

  </div>
</div>
</div>
  <script>
  $(".btnshowall").click(function(){
    $(".shortquestioncontent").toggle();
    $(".hidequestioncontent").toggle();
  });

//根据分类读取改分类下有回答的人
  function showeditor(){
$(".canwirteanswer").slideDown();
scrollTo(0,$('#showanswerform').offset().top-200);

$(".noreplaytext").hide();
  }

  <!--{if $setting['code_ask']}-->
  var needcode=1;
  <!--{else}-->
  var needcode=0;
    <!--{/if}-->
  var g_id = {$user['groupid']};
  var qid = {$question['id']};
  function listertext(){
  	 var _content=$("#anscontent").val();
  	 if(_content.length>0&&g_id!=1){

  		 $(".code_hint").show();
  	 }else{
  		 $(".code_hint").hide();
  	 }
  }
  {if $setting['mobile_localyuyin']==0}
  var mobile_localyuyin=0;
  {else}
  var mobile_localyuyin=1;
  {/if}
	//  var userAgent = window.navigator.userAgent.toLowerCase();
	//  $.browser.msie8 = $.browser.msie && /msie 8\.0/i.test(userAgent);
	 // if($.browser.msie8==true){
		//  var mobile_localyuyin=0;
	 // }
  var targetplay=null;
  function checktagsubmit(){
if(gettagsnum()<=0){
	alert("请设置标签");
	return false;
}
if(gettagsnum()>5){
    alert("最多添加5个标签");
    return false;
	}
	 var _tagstr=gettaglist();
	 $("#qtags").val(_tagstr);
	 
  }
  $(".txt_taginput").on(" input propertychange",function(){
		 var _txtval=$(this).val();
		 if(_txtval.length>1){
		
			 //检索标签信息
			 var _data={tagname:_txtval};
			 var _url="{url tags/ajaxsearch}";
			 function success(result){
				 console.log(result)
				 if(result.code==200){
					 console.log(_txtval)
					  $(".tagsearch").html("");
					for(var i=0;i<result.taglist.length;i++){
				
						 var _msg=result.taglist[i].tagname
						 
				           $(".tagsearch").append('<div class="tagitem" tagid="'+result.taglist[i].id+'">'+_msg+'</div>');
					}
					$(".tagsearch").show();
					$(".tagsearch .tagitem").click(function(){
						var _tagname=$.trim($(this).html());
						var _tagid=$.trim($(this).attr("tagid"));
						if(gettagsnum()>=5){
							alert("标签最多添加5个");
							return false;
						}
						if(checktag(_tagname)){
							alert("标签已存在");
							return false;
						}
						$(".dongtai .tags").append('<div class="tag"><span tagid="'+_tagid+'">'+_tagname+"</span><i class='fa fa-close'></i></div>");
						$(".dongtai .tags .tag  .fa-close").click(function(){
							$(this).parent().remove();
						});
						$(".tagsearch").html("");
						$(".tagsearch").hide();
						$(".txt_taginput").val("");
						});
			        
				 }
				 
			 }
			 ajaxpost(_url,_data,success);
		 }else{
				$(".tagsearch").html("");
				$(".tagsearch").hide();
		 }
	})
		function checktag(_tagname){
			var tagrepeat=false;
			$(".dongtai .tags .tag span").each(function(index,item){
				var _tagnametmp=$.trim($(this).html());
				if(_tagnametmp==_tagname){
					tagrepeat=true;
				}
			})
			return tagrepeat;
		}
		function gettaglist(){
			var taglist='';
			$(".dongtai .tags .tag span").each(function(index,item){
				var _tagnametmp=$.trim($(this).attr("tagid"));
				taglist=taglist+_tagnametmp+",";
				
			})
			taglist=taglist.substring(0,taglist.length-1);
		
			return taglist;
		}
		function gettagsnum(){
	      return $(".dongtai .tags .tag").length;
		}
		$(".tagsearch .tagitem").click(function(){
			var _tagname=$.trim($(this).html());
			if(gettagsnum()>=5){
				alert("标签最多添加5个");
				return false;
			}
			if(checktag(_tagname)){
				alert("标签已存在");
				return false;
			}
			$(".dongtai .tags").append('<div class="tag"><span>'+_tagname+"</span><i class='fa fa-close'></i></div>");
			$(".dongtai .tags .tag  .fa-close").click(function(){
				$(this).parent().remove();
			});
			$(".tagsearch").html("");
			$(".tagsearch").hide();
			$(".txt_taginput").val("");
			});
		$(".dongtai .tags .tag  .fa-close").click(function(){
			$(this).parent().remove();
		});
  $(".yuyinplay").click(function(){
  	targetplay=$(this);
  	var _serverid=targetplay.attr("id");
  	   if(_serverid == '') {
  			alert('语音文件丢失');
             return;
         }
  	   $(".wtip").html("免费偷听");
  	   targetplay.find(".wtip").html("播放中..");
  	   if(mobile_localyuyin==1){
  		 $(".htmlview").removeClass("hide");
		   $(".ieview").addClass("hide");

  		   var myAudio =targetplay.find("#voiceaudio")[0];
  	  	  // myAudio.pause();
  	  	   //myAudio.play();
  	  	   if(myAudio.paused){
  	  		   targetplay.find(".wtip").html("播放中..");
  	             myAudio.play();
  	         }else{
  	      	   targetplay.find(".wtip").html("暂停..");
  	             myAudio.pause();
  	         }
  	  	   function endfun(){ targetplay.find(".wtip").html("播放结束");alert("播放结束!")}
  	  	   var   is_playFinish = setInterval(function(){
  	             if( myAudio.ended){

  	          	   endfun();
  	  	                    window.clearInterval(is_playFinish);
  	             }
  	     }, 10);
  	   }else{

  		 $(".ieview").removeClass("hide");
  		   $(".htmlview").addClass("hide");
  	   }




  })
function deleteanswer(current_aid){
	window.location.href=g_site_url + "index.php" + query + "question/deleteanswer/"+current_aid+"/$question['id']";

}
  function adoptanswer(aid) {

      $("#adopt_answer").val(aid);

      $('#dialogadopt').modal('show');
}
  //编辑标签
  function edittag() {
 	 $('#dialog_tag').modal('show');

 }
  if(typeof($(".show-content").find("img").attr("data-original"))!="undefined"){
		var imgurl=$(".show-content").find("img").attr("data-original");
		$(".show-content").find("img").attr("src",imgurl);
	}

	$(".show-content,.answercontent").find("img").attr("data-toggle","lightbox").attr("data-lightbox-group",Date.parse( new Date() ).toString());

  var category1 = {$categoryjs[category1]};
  var category2 = {$categoryjs[category2]};
  var category3 = {$categoryjs[category3]};
  var selectedcid = "{$question['cid1']},{$question['cid2']},{$question['cid2']}";
  //修改分类
  function change_category() {
      var category1 = $("#category1 option:selected").val();
              var category2 = $("#category2 option:selected").val();
              var category3 = $("#category3 option:selected").val();
              if (category1 > 0) {
      $("#categoryid").val(category1);
      }
      if (category2 > 0) {
      $("#categoryid").val(category2);
      }
      if (category3 > 0) {
      $("#categoryid").val(category3);
      }
      $("#catedialog").model("hide");
              $("form[name='editcategoryForm']").submit();
      }
  //投诉
  function openinform(qid ,qtitle,aid) {
	  $("#myqid").val(qid);
	  $("#myqtitle").val(qtitle);
	  $("#myaid").val(aid);
 	 $('#dialog_inform').modal('show');

 }
  $(".showcommentid").each(function(){
       var dataid=$(this).attr("data-id");
       show_comment(dataid);
  });
  function show_comment(answerid) {
      if ($("#comment_" + answerid).css("display") === "none") {
      load_comment(answerid);
              $("#comment_" + answerid).slideDown();
      } else {
      $("#comment_" + answerid).slideUp();
      }
      }
  //添加评论
  function addcomment(answerid) {
  var content = $("#comment_" + answerid + " input[name='content']").val();
  var replyauthor = $("#comment_" + answerid + " input[name='replyauthor']").val();
  if (g_uid == 0){
      login();
      return false;
  }
  if (bytes($.trim(content)) < 5){
  alert("评论内容不能少于5字");
          return false;
  }
  $.ajax({
  type: "POST",
          url: "{url answer/addcomment}",
          data: "content=" + content + "&answerid=" + answerid+"&replyauthor="+replyauthor,
          success: function(status) {
          if (status == '1') {
          $("#comment_" + answerid + " input[name='content']").val("");
                  load_comment(answerid);
          }else{
          	if(status == '-2'){
          		alert("问题已经关闭，无法评论");
          	}
          }
          }
  });
  }
  
  //删除评论
  function deletecomment(commentid, answerid) {
  if (!confirm("确认删除该评论?")) {
  return false;
  }
  $.ajax({
  type: "POST",
          url: "{url answer/deletecomment}",
          data: "commentid=" + commentid + "&answerid=" + answerid,
          success: function(status) {
          if (status == '1') {
          load_comment(answerid);
          }
          }
  });
  }
  //加载评论
  function load_comment(answerid){
  $.ajax({
  type: "GET",
          cache:false,
          url: "{SITE_URL}index.php?answer/ajaxviewcomment/" + answerid,
          success: function(comments) {
          $("#comment_" + answerid + " .my-comments-list").html(comments);
          }
  });
  }

  function replycomment(commentauthorid,answerid){
      var comment_author = $("#comment_author_"+commentauthorid).attr("title");
      $("#comment_"+answerid+" .comment-input").focus();
      $("#comment_"+answerid+" .comment-input").val("回复 "+comment_author+" :");
      $("#comment_" + answerid + " input[name='replyauthor']").val(commentauthorid);
  }
	$(function(){
		  initcategory(category1);
          fillcategory(category2, $("#category1 option:selected").val(), "category2");
          fillcategory(category3, $("#category2 option:selected").val(), "category3");
        	var qrurl="{url question/view/$question['id']}";
		//微信二维码生成
		$('#qr_wxcode').qrcode(qrurl);
	     //显示微信二维码
	     $(".share-weixin").click(function(){
	    	 $(".share-wechat").show();
	     });
	     //关闭微信二维码
	     $(".close").click(function(){
	    	 $(".share-wechat").hide();
	    	 $(".pay-money").hide();
	     });
	  
	     $(".button_agree").click(function(){
             var supportobj = $(this);
                     var answerid = $(this).attr("id");
                     $.ajax({
                     type: "GET",
                             url:"{SITE_URL}index.php?answer/ajaxhassupport/" + answerid,
                             cache: false,
                             success: function(hassupport){
                             if (hassupport != '1'){






                                     $.ajax({
                                     type: "GET",
                                             cache:false,
                                             url: "{SITE_URL}index.php?answer/ajaxaddsupport/" + answerid,
                                             success: function(comments) {

                                             supportobj.find("span").html(comments+"人赞");
                                             }
                                     });
                             }else{
                            	 alert("您已经赞过");
                             }
                             }
                     });
             });

	})


                </script>
<!--{template footer}-->