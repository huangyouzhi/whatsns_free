<!--{template header}-->
<style>
.article .text a.check-text {
	
}

.article .text a.check-text:hover {
	color: #666;
	text-decoration: none
}

.article .text .art-payview {
	color: #ea644a;
	font-size: 15px;
}

.l-content .ws-qlist h4 a,.l-content .ws-nosolvelist h4 a {
	margin-left: 15px;
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	color: #0078b6;
}

.ask-q-list li {
	list-style: square;
	line-height: 26px;
	color: #D2D2D2;
	font-size: 12px;
	margin-left: 12px;
}

.ask-q-list li a {
	display: inline-block;
	vertical-align: middle;
	color: #666;
	font-size: 14px;
}

.l-content .ws-qlist h4 {
	color: #3280fc;
	font-size: 18px;
	line-height: 24px;
	padding: 12px 0 15px;
}

.l-content .ws-qlist {
	border-bottom: 1px solid #e9e9e9;
	padding-bottom: 24px;
	margin-right: 5px;
}

.l-content .ws-qlist .ask-q-list .gellipsis {
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	max-width: 21em;
}
.l-content .ws-nosolvelist h4{
color: #3280fc;
	font-size: 18px;
	line-height: 24px;
	padding: 12px 0 15px;
}
</style>
<div class="wrapper clearfix">
<div class="l-content">
		<div class="row ws-qlist">
		<!-- 包含没解决，已解决，解决已被推荐问题，根据发布时间排序 -->
			<div class="col col-md-12">
				<h4>
					最新问题 <a href="{url newpage/index}" class="ask-list-all"
						target="_blank">[全部]</a>
				</h4>
				<ul class="ask-q-list">
					{eval $newquestionlist=$this->getlistbysql("select id,title,time from ".$this->db->dbprefix."question where status in(1,2,6) order by time desc limit 0,10");}
					 					
					{loop $newquestionlist $question}
					<li><a class="gellipsis" href="{url question/view/$question['id']}">
							$question['title'] </a></li>
				    {/loop}

				</ul>
			</div>
			<!-- 包含没解决，已解决，解决已被推荐问题，且回答数大于等于2个，根据发布时间排序 -->
			<div class="col col-md-12">
					<h4>
					热门问题 <a href="{url newpage/index/4}" class="ask-list-all"
						target="_blank">[全部]</a>
				</h4>
				<ul class="ask-q-list">
					{eval $newquestionlist=$this->getlistbysql("select id,title,time from ".$this->db->dbprefix."question where status in(1,2,6) and answers>=2 order by time desc limit 0,10");}
					 					
					{loop $newquestionlist $question}
					<li><a class="gellipsis" href="{url question/view/$question['id']}">
							$question['title'] </a></li>
				    {/loop}

				</ul>
			</div>
			
		</div>
        <!-- 包含没被采纳得回答，其中包含回答数为0和不为0得问题 -->
           <div class="row ws-nosolvelist">
              <div class="col col-md-24">
              	<h4>
					等待帮助 <a href="{url newpage/index/5}" class="ask-list-all"
						target="_blank">[全部]</a>
				</h4>
				{eval $this->load->model ( 'question_model' );}
				{eval $questionlist = $this->question_model->list_by_cfield_cvalue_status ( '', 'all', 'all', 0, 15, 5 );}
				 <div id="list-container">
 
     <div class="stream-list question-stream">
      
          <!--{loop $questionlist $index $question}-->
      <section class="stream-list__item">
                <div class="qa-rank">
              {if $question['answers']==0}
                <div class="answers ml10 mr10">
                {$question['answers']}<small>回答</small></div>
                {else}
                {if $question['status']==2}
                <div class="answers answered solved ml10 mr10">
                 {$question['answers']}<small>解决</small></div>
                {else}
                
                <div class="answers answered ml10 mr10">
                {$question['answers']}<small>回答</small></div>
                {/if}
                {/if}
                <div class="views  viewsword0to99"><span> {$question['views']}</span><small>浏览</small></div>
                </div>        <div class="summary">
            <ul class="author list-inline">
                                                <li>
                                                
        {if $question['hidden']!=1}
                                            <a href="{url user/space/$question['authorid']}">    {$question['author']}
                 {if $question['author_has_vertify']!=false}<i class="fa fa-vimeo {if $question['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $question['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}</a>
                      {else}
                      匿名用户
                      {/if}
                        <span class="split"></span>
                        <a href="{url question/view/$question['id']}" class="askDate" >{$question['format_time']}</a>
                                   {if $question['shangjin']!=0}
                      <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="如果回答被采纳将获得 {$question['shangjin']}元，可提现" class="icon_hot" ><i class="fa fa-hongbao mar-r-03"></i>悬赏$question['shangjin']元</span>
                    {/if}
                    
                           {if $question['price']>0}
            <span class="icon_price" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="悬赏 {$question['price']}财富值，采纳后可获得"><i
	class="fa fa-database"></i>$question['price']</span>
	{/if}
	
                                    </li>
                                     {if $question['shangjin']&&$question['status']==1}<img class="jinxingzhong" src="{SITE_URL}static/images/jinxingzhong.png"/> {/if}
                                     
                                    {if $question['shangjin']&&$question['status']==2}<img class="imgjiesu" src="{SITE_URL}static/images/yijiesu.png"/> {/if}
          
            </ul>
            <h2 class="title"><a href="{url question/view/$question['id']}">{$question['title']} </a></h2>

                     <!--{if $question['tags']}-->
           <ul class="taglist--inline ib">
<!--{loop $question['tags'] $tag}-->
<li class="tagPopup authorinfo">
                        <a class="tag" href="{url tags/view/$tag['tagalias']}" >
                                                       {$tag['tagname']}
                        </a>
                    </li>
                    

                           
                <!--{/loop}-->
                 </ul>
                <!--{else}--><!--{/if}-->
                                            </div>
    </section>
        <!--{/loop}-->
      </div>
        
      </div>
      
              </div>
           </div>
	</div>
      <!-- l-content end -->
  <div class="r-aside">
{if $user['uid']==0} 
  <div class="no-login bb">
         <div class="title">
           <h5>{$setting['site_name']}</h5>
           <p>欢迎加入我们成为社区一员</p>
         </div>
         <p class="inst">您还没有登录，点击 <a href="javascript:login()">登录</a></p>
     </div>
      {else}
            <div class="user-info bb">
         <div class="user">
             <div class="figure"><a href="{url user/default}" target="_blank"><img src="{$user['avatar']}" alt=""></a></div>
             <p class="f-title">欢迎您，{$user['username']}</p>
         </div>
          <p class="inst">您已获得&nbsp;<span class="s1">{$user['supports']}</span>赞</p>
          
          <p class="inst">采纳率&nbsp;<span class="s1">{eval echo $this->user_model->adoptpercent ( $this->user );}</span>%</p>
           {if $setting['openwxpay']==1}
          <p class="inst">拥有现金&nbsp;<span class="s1">{eval echo doubleval($user['jine']/100);}</span>元</p>
            {/if}
           <p class="inst">拥有&nbsp;<span class="s1">{$user['credit2']}财富值</span></p>
       
        <div class="show">
                       <a href="{url user/ask}" target="_blank"><span class="mypro">我的提问<br><font>{eval echo  returnarraynum ( $this->db->query ( getwheresql ( 'question', 'authorid=' . $this->user ['uid'] . $this->question_model->statustable [$status], $this->db->dbprefix ) )->row_array () ) ;}</font></span></a>
             <a href="{url user/answer}" target="_blank"><span>我的回答<br><font>{eval echo returnarraynum ( $this->db->query ( getwheresql ( 'answer', 'authorid=' . $this->user ['uid'] . $this->answer_model->statustable [$status], $this->db->dbprefix ) )->row_array () );}</font></span></a>
	   </div>
      </div>
      
           {/if}
      <div class="no-login bb">
         <div class="btns">
            <a target="_blank" href="{url question/add}"><i class="fa fa-pencil"></i><span class="my-ask">&nbsp;我要提问</span></a>
            <a target="_blank" href="{url newpage/index/5}"><i class="fa fa-pencil"></i><span class="my-answer">&nbsp;我要回答</span></a>
         </div>
     </div>
       {if $user['uid']!=0} 
      <div class="problems bb">
               <p class="iconshoucang"><i class="fa"></i>我收藏的问题&nbsp;:<a target="_blank" href="{url user/attention/question}"><font>{eval echo $this->user_model->rownum_attention_question ( $this->user ['uid'] );}</font></a></p>
        <p class="iconinvateme"><i class="fa"></i>邀请我回答的问题&nbsp;:<a href="{url user/invateme}" target="_blank"><font>{eval echo returnarraynum ( $this->db->query ( getwheresql ( 'question', " askuid=" . $user['uid'], $this->db->dbprefix ) )->row_array () );}</font></a></p>
       <p class="iconwenzhang"><i class="fa"></i><a target="_blank" href="{url topic/userxinzhi/$user['uid']}">我的文章</a></p>
            {if $setting['recharge_open']==1}   
        <p class="iconcaifu"><i class="fa"></i><a target="_blank" href="{url gift/default}">财富值兑换</a></p>
                 {/if}
            {if $setting['openwxpay']==1}
        <p class="iconjiaoyi"><i class="fa"></i><a target="_blank" href="{url user/userzhangdan}">交易明细</a></p>
        {/if}
      </div>
         {/if}
    
          <div style="margin-top:10px;" class="recommend bb">
         <h3 class="title">为你推荐</h3>
         <ul class="r-list">
                      <!--{eval $topiclist=$this->fromcache('hottopiclist');}-->
                 <!--{loop $topiclist $nindex $topic}-->
                                          
           <li>
              <i></i><a target="_blank" href="{url topic/getone/$topic['id']}" class="tit" title="{$topic['title']}">{$topic['title']}</a>
                         </li>
                    <!--{/loop}-->
           
                    
         </ul>
     </div> <!-- recommend end -->
               <div class="experts bb">
        <h3 class="title">问答专家 <a target="_blank" href="{url expert/default}" class="more">更多<font> &gt;&gt; </font></a></h3>
        <ul class="exp-list">
             <!--{eval $expertlist=$this->fromcache('expertlist');}-->
                <!--{loop $expertlist $index $expert}-->
                {if $index<3}
                      <li>
              <div class="e-info clearfix">
                 <div class="figure"><a target="_blank" href="{url user/space/$expert['uid']}"><img src="{$expert['avatar']}" alt=""></a></div>
                 <div class="other">
                   <p class="name"><a target="_blank" href="{url user/space/$expert['uid']}">{$expert['username']}{if
$expert['author_has_vertify']!=false}<i class="fa fa-vimeo v_person   " ></i><span>认证专家</span>{/if}</a></p>
                   <p class="inst">回答数量 : {$expert['answers']}个</p>
                   <p class="inst">获赞数 : {$expert['supports']}个</p>
                 </div>
              </div>
              <p class="article"></p>
           </li>
           {/if}
          <!--{/loop}-->             
                {if !$user['author_has_vertify']}    
           <a target="_blank" {if $user['uid']==0} href="javascript:login()" {else} href="{url user/vertify}" {/if} ><li><span class="renz">申请认证</span></li></a>
       {/if}
        </ul>
     </div>
   <!-- 最近30天得精彩回答 点赞数>=1 -->
		<div class="recommend bb hot-pro">
			<h3 class="title">精彩回答</h3>
			<ul class="r-list">
					{eval $time=strtotime("-30 day",time()); $answerlist=$this->getlistbysql("select id,qid,title,time from ".$this->db->dbprefix."answer where supports>=1 and time>$time order by time desc limit 0,10");}
					 					
					{loop $answerlist $question}
					<li><a class="gellipsis" href="{url question/answer/$question['qid']/$question['id']}">
							$question['title'] </a></li>
				    {/loop}
			</ul>
		</div>
         

  </div><!-- r-aside end -->
</div>
{if $setting['weixin_logo']}
<div class="side-weixin-box">
  <div class="weixin-box-c"> 
    <div class="close" onclick="this.parentNode.parentNode.style.display='none';"></div>
    <div class="content"> 
      <p>关注问答微信公众号</p>
      <img src="{$setting['weixin_logo']}" alt="扫一扫，关注我们" width="111" height="111"> 
      
    </div> 
  </div>
</div>
{/if}

    <!--{template footer}-->