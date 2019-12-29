<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Answer extends CI_Controller {
	var $whitelist;
	function __construct() {
		$this->whitelist = "deletecomment";//方法名英文逗号隔开
		parent::__construct ();
		$this->load->model ( 'answer_model' );
		$this->load->model ( 'answer_comment_model' );
		$this->load->model ( 'question_model' );
		$this->load->model ( 'message_model' );
		$this->load->model ( 'doing_model' );
	}

	/* 追问模块---追问 */

	function append() {
      
		$qid = intval ( $this->uri->segment ( 3 ) ) ? $this->uri->segment ( 3 ) : intval ( $this->input->post ( 'qid' ) );
		$aid = intval ( $this->uri->segment ( 4 ) ) ? $this->uri->segment ( 4 ) : intval ( $this->input->post ( 'aid' ) );
		$question = $this->question_model->get ( $qid );
		$answer = $this->answer_model->get ( $aid );
		if (! $question || ! $answer) {
			$this->message ( "回答内容不存在!" );
			exit ();
		}
		if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {
			if ($this->user ['active'] != 1) {
			
				$this->message ( "必须激活邮箱才能继续操作!" );
				exit ();
			}
		}
		$viewurl = urlmap ( 'question/view/' . $qid, 2 );
		if (null !== $this->input->post ( 'submit' )) {
			$title = $question ['title'];
			if ($this->user ['grouptype'] != 1) {
				if (strtolower ( trim ( $this->input->post ( 'code' ) ) ) != $this->user_model->get_code () && $this->setting ['jingyan'] <= 0) {
					$this->message ( $this->input->post ( 'state' ) . "验证码错误!", 'BACK' );
				}
			}
			$this->answer_model->append ( $answer ['id'], $this->user ['username'], $this->user ['uid'], $this->input->post ( 'content' ) );
			if ($answer ['authorid'] == $this->user ['uid']) { //继续回答
				$this->message_model->add ( $this->user ['username'], $this->user ['uid'], $question ['authorid'], $this->user ['username'] . '继续回答了您的问题:' . $question ['title'], $this->input->post ( 'content' ) . '<br /> <a href="' . url ( 'question/view/' . $qid, 1 ) . '">点击查看</a>' ,'answer');
				$this->doing_model->add ( $this->user ['uid'], $this->user ['username'], 7, $qid, $this->input->post ( 'content' ) );

				$quser = $this->user_model->get_by_uid ( $question ['authorid'] );
				global $setting;
				$mpurl = SITE_URL . $setting ['seo_prefix'] . $viewurl . $setting ['seo_suffix'];
				//回答的时候如果在微信里，就微信推送通知


				$wx = $this->fromcache ( 'cweixin' );

				if ($wx ['appsecret'] != '' && $wx ['appsecret'] != null && $wx ['winxintype'] != 2) {

					$appid = $wx ['appid'];
					$appsecret = $wx ['appsecret'];

					require FCPATH . '/lib/php/jssdk.php';
					$jssdk = new JSSDK ( $appid, $appsecret );

					if ($quser ['openid'] != '' && $quser ['openid'] != null) {
						$url = url( 'question/view/' . $qid);

						$text = "您的问题[$title]有新回答(对方继续回答)，<a href='$url'>请点击查看详情!</a>";
					
						$description = "具体点击查看详情";
						if (! $this->setting ['weixin_tpl_huida']) {
							$returnmesage = $jssdk->sendtexttouser ( $quser ['openid'], $text );
						} else {
							$question ['answers'] = intval ( $question ['answers'] ) + 1;
							$returnmesage = $jssdk->sendanswertpltouser ( $quser ['openid'], $this->setting ['weixin_tpl_huida'], $url, "您好，您的回答有新回复，请及时查看。", $title, $description, $question ['answers'] . "人", "点击查看详情，满意回复请选择最佳答案" );
						}

					}

				}
				//极光推送
				$url=url('question/view/' . $qid);
				jpushmsg("您的问题[$title]有新回答(对方继续回答)", $question ['authorid'],"对方继续回答",$url);
				
				//发送邮件通知
				$subject = "问题[".$title."]有新回答(对方继续回答)！";
				$message = $this->input->post ( 'content' ) . '<p>现在您可以点击<a swaped="true" target="_blank" href="' . $mpurl . '">查看最新回复</a>。</p>';
				if (isset ( $this->setting ['notify_mail'] ) && $this->setting ['notify_mail'] == '1') {
					sendmail ( $quser, $subject, $message );
				}
				
				//推送新回答通知给所有关注者
				$followerlist = $this->question_model->get_follower ( $qid );
				$emails=array();
				foreach ($followerlist as $follower){
					//获取回答者通知情况
					$myquser=$this->user_model->get_by_uid($follower['followerid']);
					
					if($myquser['fromsite']!=1&&$myquser['notify']['answer']==1&&$myquser['uid']!=$quser['uid']&&$myquser['uid']!=$this->user['uid']){
						
						array_push($emails, $myquser['email']);
					}
				}
				//如果关注者接受回答邮件提醒就发送邮件
				$subject = "您关注的问题[".$title."]有新回答！(网友继续回答)";
				$message = $this->input->post ( 'content' ). '<p>现在您可以点击<a swaped="true" target="_blank" href="' . url('question/view/' . $qid) . '">查看最新回复</a>。</p>';
             
				sendmutiemail( $emails, $subject, $message );
					

				
				$this->message ( '继续回答成功!', $viewurl );
			} else { //继续追问
				$this->message_model->add ( $this->user ['username'], $this->user ['uid'], $answer ['authorid'], $this->user ['username'] . '对您的回答进行了追问', $this->input->post ( 'content' ) . '<br /> <a href="' . url ( 'question/view/' . $qid, 1 ) . '">点击查看问题</a>','answer' );
				$this->doing_model->add ( $this->user ['uid'], $this->user ['username'], 6, $qid, $this->input->post ( 'content' ), $answer ['id'], $answer ['authorid'], $answer ['content'] );
				$auser = $this->user_model->get_by_uid ( $answer ['authorid'] );
				global $setting;
				$mpurl = SITE_URL . $setting ['seo_prefix'] . $viewurl . $setting ['seo_suffix'];
				$wx = $this->fromcache ( 'cweixin' );

				if ($wx ['appsecret'] != '' && $wx ['appsecret'] != null && $wx ['winxintype'] != 2) {

					$appid = $wx ['appid'];
					$appsecret = $wx ['appsecret'];

					require FCPATH . '/lib/php/jssdk.php';
					$jssdk = new JSSDK ( $appid, $appsecret );

					if ($auser ['openid'] != '' && $auser ['openid'] != null) {

						$url = SITE_URL . $this->setting ['seo_prefix'] . $viewurl . $this->setting ['seo_suffix'];
						$text = "您回答的问题[$title]有新回答(对方继续追问)，<a href='$url'>请点击查看详情!</a>";
					
						$description = "具体点击查看详情";
						if (! $this->setting ['weixin_tpl_huida']) {
							$returnmesage = $jssdk->sendtexttouser ( $auser ['openid'], $text );
						} else {
							$question ['answers'] = intval ( $question ['answers'] ) + 1;
							$returnmesage = $jssdk->sendanswertpltouser ( $auser ['openid'], $this->setting ['weixin_tpl_huida'], $url, "您好，您的回答作者有新追问，请及时查看。", $title, $description, $question ['answers'] . "人", "点击查看详情" );
						}

					}

				}
				//极光推送
				$url=url('question/view/' . $qid);
				jpushmsg("您回答的问题[$title]有新回答(对方继续追问)", $answer['authorid'],"对方继续追问",$url);
				
				//发送邮件通知
				$subject = "您回答的问题[".$title."]有新回答(对方继续追问)！";
				$message = $this->input->post ( 'content' ) . '<p>现在您可以点击<a swaped="true" target="_blank" href="' . $mpurl . '">查看最新回复</a>。</p>';

				if (isset ( $this->setting ['notify_mail'] ) && $this->setting ['notify_mail'] == '1') {
					sendmail ( $auser, $subject, $message );
				}
				//推送新回答通知给所有关注者
				$followerlist = $this->question_model->get_follower ( $qid );
				$emails=array();
				foreach ($followerlist as $follower){
					//获取回答者通知情况
					$myquser=$this->user_model->get_by_uid($follower['followerid']);
					
					if($myquser['fromsite']!=1&&$myquser['notify']['answer']==1&&$myquser['uid']!=$auser['uid']&&$myquser['uid']!=$this->user['uid']){
						array_push($emails, $myquser['email']);
					}
				}
				//如果关注者接受回答邮件提醒就发送邮件
				$subject = "您关注的问题[".$title."]有新回答！(网友继续回答)";
				$message = $this->input->post ( 'content' ). '<p>现在您可以点击<a swaped="true" target="_blank" href="' . url('question/view/' . $qid) . '">查看最新回复</a>。</p>';
				
				sendmutiemail( $emails, $subject, $message );
				$this->message ( '继续提问成功!', $viewurl );
			}
		}
		include template ( "appendanswer" );
	}

	
	function ajaxviewcomment() {
		
		$answerid = intval ( $this->uri->segment ( 3 ) );
		$commentlist = $this->answer_comment_model->get_by_aid ( $answerid, 0, 50 );
		$commentstr = '<li class="loading">暂无评论 :)</li>';
		$_answer=$this->db->get_where('answer',array('id'=>$answerid))->row_array();
		$qid=$_answer['qid'];
		$_question=$this->db->get_where('question',array('id'=>$qid))->row_array();
		if ($commentlist) {
			$commentstr = "";
			
			foreach ( $commentlist as $comment ) {
				$admin_control='';
				
				if($this->user ['groupid'] <=3||$this->user ['uid']==$comment['authorid']){
					$admin_control = '<span class="span-line">|</span><a href="javascript:void(0)" onclick="deletecomment({commentid},{answerid});">删除</a>' ;
					
				}
				
				$reply_control = ($this->user ['uid'] != $comment ['authorid']) ? '<span class="span-line">|</span><a href="javascript:void(0)" onclick="replycomment(' . $comment ['authorid'] . ',' . $comment ['aid'] . ');">回复</a>' : '';
				if ($admin_control) {
					$admin_control = str_replace ( "{commentid}", $comment ['id'], $admin_control );
					$admin_control = str_replace ( "{answerid}", $comment ['aid'], $admin_control );
				}
				if($_question['hidden']==1&&$comment ['authorid']==$_question['authorid']){
					$comment ['author']="匿名用户";
					$viewurl = '';
					$comment ['avatar']=SITE_URL."static/css/default/avatar.gif";
					$commentstr .= '<li><div class="other-comment am-margin-top-sm"><a id="comment_author_' . $comment ['authorid'] . '" class="pic"><img width="30" height="30" src="' . $comment ['avatar'] . '"></a><p  class="am-margin-0"><a  title="' . $comment ['author'] . '" >' . $comment ['author'] . '</a>：' . $comment ['content'] . '</p></div><div class="replybtn"><span class="times">' . $comment ['format_time'] . '</span>' . $reply_control . '' . $admin_control . '</div></li>';
					
				}else{
					$viewurl = url ( 'user/space/' . $comment ['authorid'] );
					$commentstr .= '<li><div class="other-comment am-margin-top-sm"><a id="comment_author_' . $comment ['authorid'] . '" href="' . $viewurl . '" title="' . $comment ['author'] . '"  class="pic"><img width="30" height="30" src="' . $comment ['avatar'] . '"  onmouseover="pop_user_on(this, \'' . $comment ['authorid'] . '\', \'\');"  onmouseout="pop_user_out();"></a><p  class="am-margin-0"><a href="' . $viewurl . '" title="' . $comment ['author'] . '" target="_blank">' . $comment ['author'] . '</a>：' . $comment ['content'] . '</p></div><div class="replybtn"><span class="times">' . $comment ['format_time'] . '</span>' . $reply_control . '' . $admin_control . '</div></li>';
					
				}
				
			}
		}
		exit ( $commentstr );
	}

	function addcomment() {
		if (null !== $this->input->post ( 'content' )) {
			$content = htmlspecialchars ( $this->input->post ( 'content' ) );
			$answerid = intval ( $this->input->post ( 'answerid' ) );
			$replyauthorid = intval ( $this->input->post ( 'replyauthor' ) );
			$answer = $this->answer_model->get ( $answerid );
			$question = $this->question_model->get ( $answer ['qid'] );
			if ($question ['status'] == 9) {
				exit ( '-2' );
			}
			if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {
				if ($this->user ['active'] != 1) {
					echo '必须激活邮箱才能评论!';
					exit ();
				}
			}
			$this->answer_comment_model->add ( $answerid, $content, $this->user ['uid'], $this->user ['username'] );
			if ($answer ['authorid'] != $this->user ['uid']) {
				//发送邮件通知
				$quser=$this->user_model->get_by_uid($answer ['authorid']);
				//如果作者开启文章评论邮件通知，且评论不是作者本人
				if($quser['notify']['comment']==1&&$quser['uid']!=$this->user ['uid']){
					$subject = "问题[".$question['title']."]的回答有新评论！[回答新评论通知]";
					$sendmessage = $answer['content']."<br><b>评论：$content</b>". '<p>现在您可以点击<a swaped="true" target="_blank" href="' .  url ( 'question/view/' . $answer ['qid'] ) . '">查看最新回答评论</a>。</p>';
					sendmail ( $quser, $subject, $sendmessage );					
				}				
				$this->message_model->add ( $this->user ['username'], $this->user ['uid'], $answer ['authorid'], '您的回答有了新评论', '您对于问题 "' . $answer ['title'] . '" 的回答 "' . $answer ['content'] . '" 有了新评论 "' . $content . '"<br /> <a href="' . url ( 'question/view/' . $answer ['qid'], 1 ) . '">点击查看</a>','questioncomment' );
			}
			if ($replyauthorid && $this->user ['uid'] != $replyauthorid) {
				//发送邮件通知
				$quser=$this->user_model->get_by_uid($replyauthorid);
				//如果作者开启文章评论邮件通知，且评论不是作者本人
				if($quser['notify']['comment_reply']==1&&$quser['uid']!=$this->user ['uid']){
					$subject = "问题[".$question['title']."]的回答有新评论！[评论回复通知]";
					$sendmessage =$answer['content']."<blockquote><b>评论回复：$content</b></blockquote>". '<p>现在您可以点击<a swaped="true" target="_blank" href="' .  url ( 'question/view/' . $answer ['qid'], 1 ) . '">查看最新评论回复</a>。</p>';
					sendmail ( $quser, $subject, $sendmessage );
					
				}
				
				$this->message_model->add ( $this->user ['username'], $this->user ['uid'], $replyauthorid, '您的评论有了新回复', '您对于问题 "' . $answer ['title'] . '" 的评论有了新回复"' . $content . '"<br /> <a href="' . url ( 'question/view/' . $answer ['qid'], 1 ) . '">点击查看</a>','questioncomment' );
			}
			$this->doing_model->add ( $this->user ['uid'], $this->user ['username'], 3, $answer ['qid'], $content, $answer ['id'], $answer ['authorid'], $answer ['content'] );
			exit ( '1' );
		}
	}

	function deletecomment() {
		if (null !== $this->input->post ( 'commentid' )) {
			
			$commentid = intval ( $this->input->post ( 'commentid' ) );
			$_comment=$this->db->get_where('answer_comment',array('id'=>$commentid))->row_array();
			if($this->user['groupid']>3){
				if($_comment['authorid']!=$this->user['uid']){
					exit ( '不能删除非自己的评论' );
				}
			}
			$answerid = intval ( $this->input->post ( 'answerid' ) );
			$this->answer_comment_model->remove ( $commentid, $answerid );
			exit ( '1' );
		}
	}

	function ajaxgetsupport() {
		$answerid = intval ( $this->uri->segment ( 3 ) );
		$answer = $this->answer_model->get ( $answerid );
		exit ( $answer ['supports'] );
	}

	function ajaxhassupport() {
		$answerid = intval ( $this->uri->segment ( 3 ) );
		$supports = $this->answer_model->get_support_by_sid_aid ( $this->user ['sid'], $answerid );
		$ret = $supports ? '1' : '-1';
		exit ( $ret );
	}

	function ajaxaddsupport() {
		$answerid = intval ( $this->uri->segment ( 3 ) );
		$answer = $this->answer_model->get ( $answerid );
		$this->answer_model->add_support ( $this->user ['sid'], $answerid, $answer ['authorid'] );
		$answer = $this->answer_model->get ( $answerid );
		if ($this->user ['uid']) {
			$this->doing_model->add ( $this->user ['uid'], $this->user ['username'], 5, $answer ['qid'], '', $answer ['id'], $answer ['authorid'], $answer ['content'] );
		}
		exit ( $answer ['supports'] );
	}

}

?>
