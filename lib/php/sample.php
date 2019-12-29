<?php
require_once "jssdk.php";
$jssdk = new JSSDK("appid", "appsecret");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <title>微信测试</title>
    <link href="http://www.ask2.cn/css/dist/css/zui.min.css" rel="stylesheet">

 <link rel="stylesheet" href="http://demo.open.weixin.qq.com/jssdk/css/style.css?ts=1420774989">
    <link href="http://www.ask2.cn/css/dist/css/main.css" rel="stylesheet">
    <!-- jQuery -->
<script src="http://www.ask2.cn/js/jquery-1.11.3.min.js" type="text/javascript"></script>
  
</head>
<body>
  
<body ontouchstart="">
<div class="wxapi_container">
    <div class="wxapi_index_container">
      <ul class="label_box lbox_close wxapi_index_list">
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-basic">基础接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-share">分享接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-image">图像接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-voice">音频接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-smart">智能接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-device">设备信息接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-location">地理位置接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-webview">界面操作接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-scan">微信扫一扫接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-shopping">微信小店接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-card">微信卡券接口</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-pay">微信支付接口</a></li>
      </ul>
    </div>
    <div class="lbox_close wxapi_form">
      <h3 id="menu-basic">基础接口</h3>
      <span class="desc">判断当前客户端是否支持指定JS接口</span>
      <button class="btn btn_primary" id="checkJsApi">checkJsApi</button>

      <h3 id="menu-share">分享接口</h3>
      <span class="desc">获取“分享到朋友圈”按钮点击状态及自定义分享内容接口</span>
      <button class="btn btn_primary" id="onMenuShareTimeline">onMenuShareTimeline</button>
      <span class="desc">获取“分享给朋友”按钮点击状态及自定义分享内容接口</span>
      <button class="btn btn_primary" id="onMenuShareAppMessage">onMenuShareAppMessage</button>
      <span class="desc">获取“分享到QQ”按钮点击状态及自定义分享内容接口</span>
      <button class="btn btn_primary" id="onMenuShareQQ">onMenuShareQQ</button>
      <span class="desc">获取“分享到腾讯微博”按钮点击状态及自定义分享内容接口</span>
      <button class="btn btn_primary" id="onMenuShareWeibo">onMenuShareWeibo</button>

      <h3 id="menu-image">图像接口</h3>
      <span class="desc">拍照或从手机相册中选图接口</span>
      <button class="btn btn_primary" id="chooseImage">chooseImage</button>
      <span class="desc">预览图片接口</span>
      <button class="btn btn_primary" id="previewImage">previewImage</button>
      <span class="desc">上传图片接口</span>
      <button class="btn btn_primary" id="uploadImage">uploadImage</button>
      <span class="desc">下载图片接口</span>
      <button class="btn btn_primary" id="downloadImage">downloadImage</button>

      <h3 id="menu-voice">音频接口</h3>
      <span class="desc">开始录音接口</span>
      <button class="btn btn_primary" id="startRecord">startRecord</button>
      <span class="desc">停止录音接口</span>
      <button class="btn btn_primary" id="stopRecord">stopRecord</button>
      <span class="desc">播放语音接口</span>
      <button class="btn btn_primary" id="playVoice">playVoice</button>
      <span class="desc">暂停播放接口</span>
      <button class="btn btn_primary" id="pauseVoice">pauseVoice</button>
      <span class="desc">停止播放接口</span>
      <button class="btn btn_primary" id="stopVoice">stopVoice</button>
      <span class="desc">上传语音接口</span>
      <button class="btn btn_primary" id="uploadVoice">uploadVoice</button>
      <span class="desc">下载语音接口</span>
      <button class="btn btn_primary" id="downloadVoice">downloadVoice</button>

      <h3 id="menu-smart">智能接口</h3>
      <span class="desc">识别音频并返回识别结果接口</span>
      <button class="btn btn_primary" id="translateVoice">translateVoice</button>

      <h3 id="menu-device">设备信息接口</h3>
      <span class="desc">获取网络状态接口</span>
      <button class="btn btn_primary" id="getNetworkType">getNetworkType</button>

      <h3 id="menu-location">地理位置接口</h3>
      <span class="desc">使用微信内置地图查看位置接口</span>
      <button class="btn btn_primary" id="openLocation">openLocation</button>
      <span class="desc">获取地理位置接口</span>
      <button class="btn btn_primary" id="getLocation">getLocation</button>

      <h3 id="menu-webview">界面操作接口</h3>
      <span class="desc">隐藏右上角菜单接口</span>
      <button class="btn btn_primary" id="hideOptionMenu">hideOptionMenu</button>
      <span class="desc">显示右上角菜单接口</span>
      <button class="btn btn_primary" id="showOptionMenu">showOptionMenu</button>
      <span class="desc">关闭当前网页窗口接口</span>
      <button class="btn btn_primary" id="closeWindow">closeWindow</button>
      <span class="desc">批量隐藏功能按钮接口</span>
      <button class="btn btn_primary" id="hideMenuItems">hideMenuItems</button>
      <span class="desc">批量显示功能按钮接口</span>
      <button class="btn btn_primary" id="showMenuItems">showMenuItems</button>
      <span class="desc">隐藏所有非基础按钮接口</span>
      <button class="btn btn_primary" id="hideAllNonBaseMenuItem">hideAllNonBaseMenuItem</button>
      <span class="desc">显示所有功能按钮接口</span>
      <button class="btn btn_primary" id="showAllNonBaseMenuItem">showAllNonBaseMenuItem</button>

      <h3 id="menu-scan">微信扫一扫</h3>
      <span class="desc">调起微信扫一扫接口</span>
      <button class="btn btn_primary" id="scanQRCode0">scanQRCode(微信处理结果)</button>
      <button class="btn btn_primary" id="scanQRCode1">scanQRCode(直接返回结果)</button>

      <h3 id="menu-shopping">微信小店接口</h3>
      <span class="desc">跳转微信商品页接口</span>
      <button class="btn btn_primary" id="openProductSpecificView">openProductSpecificView</button>

      <h3 id="menu-card">微信卡券接口</h3>
      <span class="desc">批量添加卡券接口</span>
      <button class="btn btn_primary" id="addCard">addCard</button>
      <span class="desc">调起适用于门店的卡券列表并获取用户选择列表</span>
      <button class="btn btn_primary" id="chooseCard">chooseCard</button>
      <span class="desc">查看微信卡包中的卡券接口</span>
      <button class="btn btn_primary" id="openCard">openCard</button>

      <h3 id="menu-pay">微信支付接口</h3>
      <span class="desc">发起一个微信支付请求</span>
      <button class="btn btn_primary" id="chooseWXPay">chooseWXPay</button>
    </div>
  </div>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"> </script>
<script>
  wx.config({
      debug: false,
      appId: '<?php echo $signPackage["appId"];?>',
      timestamp: <?php echo $signPackage["timestamp"];?>,
      nonceStr: '<?php echo $signPackage["nonceStr"];?>',
      signature: '<?php echo $signPackage["signature"];?>',
      jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
      ]
  });
</script>
<script>
wx.ready(function () {
	  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
	  document.querySelector('#checkJsApi').onclick = function () {
	    wx.checkJsApi({
	      jsApiList: [
	        'getNetworkType',
	        'previewImage'
	      ],
	      success: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	  };
	  // 10 微信支付接口
	  // 10.1 发起一个支付请求
	  document.querySelector('#chooseWXPay').onclick = function () {
	    wx.chooseWXPay({
	    	appId: '<?php echo $signPackage["appId"];?>',
	    	 timestamp: <?php echo $signPackage["timestamp"];?>,
	    		      nonceStr: '<?php echo $signPackage["nonceStr"];?>',
	    		      "package" ： "prepay_id=u802345jgfjsdfgsdg888",     
	    	           "signType" ： "MD5",         //微信签名方式：     
	    	           "paySign" ： "70EA570631E4BB79628FBCA90534C63FF7FADD89" //微信签名 
	    });
	  };

	  // 2. 分享接口
	  // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
	  document.querySelector('#onMenuShareAppMessage').onclick = function () {
	    wx.onMenuShareAppMessage({
	      title: '互联网之子 方倍工作室',
	      desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
	      link: 'http://movie.douban.com/subject/25785114/',
	      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
	      trigger: function (res) {
	        alert('用户点击发送给朋友');
	      },
	      success: function (res) {
	        alert('已分享');
	      },
	      cancel: function (res) {
	        alert('已取消');
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	    alert('已注册获取“发送给朋友”状态事件');
	  };

	  // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
	  document.querySelector('#onMenuShareTimeline').onclick = function () {
	    wx.onMenuShareTimeline({
	      title: '互联网之子 方倍工作室',
	      link: 'http://movie.douban.com/subject/25785114/',
	      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
	      trigger: function (res) {
	        alert('用户点击分享到朋友圈');
	      },
	      success: function (res) {
	        alert('已分享');
	      },
	      cancel: function (res) {
	        alert('已取消');
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	    alert('已注册获取“分享到朋友圈”状态事件');
	  };

	  // 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
	  document.querySelector('#onMenuShareQQ').onclick = function () {
	    wx.onMenuShareQQ({
	      title: '互联网之子 方倍工作室',
	      desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
	      link: 'http://movie.douban.com/subject/25785114/',
	      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
	      trigger: function (res) {
	        alert('用户点击分享到QQ');
	      },
	      complete: function (res) {
	        alert(JSON.stringify(res));
	      },
	      success: function (res) {
	        alert('已分享');
	      },
	      cancel: function (res) {
	        alert('已取消');
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	    alert('已注册获取“分享到 QQ”状态事件');
	  };
	  
	  // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
	  document.querySelector('#onMenuShareWeibo').onclick = function () {
	    wx.onMenuShareWeibo({
	      title: '互联网之子 方倍工作室',
	      desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
	      link: 'http://movie.douban.com/subject/25785114/',
	      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
	      trigger: function (res) {
	        alert('用户点击分享到微博');
	      },
	      complete: function (res) {
	        alert(JSON.stringify(res));
	      },
	      success: function (res) {
	        alert('已分享');
	      },
	      cancel: function (res) {
	        alert('已取消');
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	    alert('已注册获取“分享到微博”状态事件');
	  };


	  // 3 智能接口
	  var voice = {
	    localId: '',
	    serverId: ''
	  };
	  // 3.1 识别音频并返回识别结果
	  document.querySelector('#translateVoice').onclick = function () {
	    if (voice.localId == '') {
	      alert('请先使用 startRecord 接口录制一段声音');
	      return;
	    }
	    wx.translateVoice({
	      localId: voice.localId,
	      complete: function (res) {
	        if (res.hasOwnProperty('translateResult')) {
	          alert('识别结果：' + res.translateResult);
	        } else {
	          alert('无法识别');
	        }
	      }
	    });
	  };

	  // 4 音频接口
	  // 4.2 开始录音
	  document.querySelector('#startRecord').onclick = function () {
	    wx.startRecord({
	      cancel: function () {
	        alert('用户拒绝授权录音');
	      }
	    });
	  };

	  // 4.3 停止录音
	  document.querySelector('#stopRecord').onclick = function () {
	    wx.stopRecord({
	      success: function (res) {
	        voice.localId = res.localId;
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	  };

	  // 4.4 监听录音自动停止
	  wx.onVoiceRecordEnd({
	    complete: function (res) {
	      voice.localId = res.localId;
	      alert('录音时间已超过一分钟');
	    }
	  });

	  // 4.5 播放音频
	  document.querySelector('#playVoice').onclick = function () {
	    if (voice.localId == '') {
	      alert('请先使用 startRecord 接口录制一段声音');
	      return;
	    }
	    wx.playVoice({
	      localId: voice.localId
	    });
	  };

	  // 4.6 暂停播放音频
	  document.querySelector('#pauseVoice').onclick = function () {
	    wx.pauseVoice({
	      localId: voice.localId
	    });
	  };

	  // 4.7 停止播放音频
	  document.querySelector('#stopVoice').onclick = function () {
	    wx.stopVoice({
	      localId: voice.localId
	    });
	  };

	  // 4.8 监听录音播放停止
	  wx.onVoicePlayEnd({
	    complete: function (res) {
	      alert('录音（' + res.localId + '）播放结束');
	    }
	  });

	  // 4.8 上传语音
	  document.querySelector('#uploadVoice').onclick = function () {
	    if (voice.localId == '') {
	      alert('请先使用 startRecord 接口录制一段声音');
	      return;
	    }
	    wx.uploadVoice({
	      localId: voice.localId,
	      success: function (res) {
	        alert('上传语音成功，serverId 为' + res.serverId);
	        voice.serverId = res.serverId;
	      }
	    });
	  };

	  // 4.9 下载语音
	  document.querySelector('#downloadVoice').onclick = function () {
	    if (voice.serverId == '') {
	      alert('请先使用 uploadVoice 上传声音');
	      return;
	    }
	    wx.downloadVoice({
	      serverId: voice.serverId,
	      success: function (res) {
	        alert('下载语音成功，localId 为' + res.localId);
	        voice.localId = res.localId;
	      }
	    });
	  };

	  // 5 图片接口
	  // 5.1 拍照、本地选图
	  var images = {
	    localId: [],
	    serverId: []
	  };
	  document.querySelector('#chooseImage').onclick = function () {
	    wx.chooseImage({
	      success: function (res) {
	        images.localId = res.localIds;
	        alert('已选择 ' + res.localIds.length + ' 张图片');
	      }
	    });
	  };

	  // 5.2 图片预览
	  document.querySelector('#previewImage').onclick = function () {
	    wx.previewImage({
	      current: 'http://img5.douban.com/view/photo/photo/public/p1353993776.jpg',
	      urls: [
	        'http://img3.douban.com/view/photo/photo/public/p2152117150.jpg',
	        'http://img5.douban.com/view/photo/photo/public/p1353993776.jpg',
	        'http://img3.douban.com/view/photo/photo/public/p2152134700.jpg'
	      ]
	    });
	  };

	  // 5.3 上传图片
	  document.querySelector('#uploadImage').onclick = function () {
	    if (images.localId.length == 0) {
	      alert('请先使用 chooseImage 接口选择图片');
	      return;
	    }
	    var i = 0, length = images.localId.length;
	    images.serverId = [];
	    function upload() {
	      wx.uploadImage({
	        localId: images.localId[i],
	        success: function (res) {
	          i++;
	          alert('已上传：' + i + '/' + length);
	          images.serverId.push(res.serverId);
	          if (i < length) {
	            upload();
	          }
	        },
	        fail: function (res) {
	          alert(JSON.stringify(res));
	        }
	      });
	    }
	    upload();
	  };

	  // 5.4 下载图片
	  document.querySelector('#downloadImage').onclick = function () {
	    if (images.serverId.length === 0) {
	      alert('请先使用 uploadImage 上传图片');
	      return;
	    }
	    var i = 0, length = images.serverId.length;
	    images.localId = [];
	    function download() {
	      wx.downloadImage({
	        serverId: images.serverId[i],
	        success: function (res) {
	          i++;
	          alert('已下载：' + i + '/' + length);
	          images.localId.push(res.localId);
	          if (i < length) {
	            download();
	          }
	        }
	      });
	    }
	    download();
	  };

	  // 6 设备信息接口
	  // 6.1 获取当前网络状态
	  document.querySelector('#getNetworkType').onclick = function () {
	    wx.getNetworkType({
	      success: function (res) {
	        alert(res.networkType);
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	  };

	  // 8 界面操作接口
	  // 8.1 隐藏右上角菜单
	  document.querySelector('#hideOptionMenu').onclick = function () {
	    wx.hideOptionMenu();
	  };

	  // 8.2 显示右上角菜单
	  document.querySelector('#showOptionMenu').onclick = function () {
	    wx.showOptionMenu();
	  };

	  // 8.3 批量隐藏菜单项
	  document.querySelector('#hideMenuItems').onclick = function () {
	    wx.hideMenuItems({
	      menuList: [
	        'menuItem:readMode', // 阅读模式
	        'menuItem:share:timeline', // 分享到朋友圈
	        'menuItem:copyUrl' // 复制链接
	      ],
	      success: function (res) {
	        alert('已隐藏“阅读模式”，“分享到朋友圈”，“复制链接”等按钮');
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	  };

	  // 8.4 批量显示菜单项
	  document.querySelector('#showMenuItems').onclick = function () {
	    wx.showMenuItems({
	      menuList: [
	        'menuItem:readMode', // 阅读模式
	        'menuItem:share:timeline', // 分享到朋友圈
	        'menuItem:copyUrl' // 复制链接
	      ],
	      success: function (res) {
	        alert('已显示“阅读模式”，“分享到朋友圈”，“复制链接”等按钮');
	      },
	      fail: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	  };

	  // 8.5 隐藏所有非基本菜单项
	  document.querySelector('#hideAllNonBaseMenuItem').onclick = function () {
	    wx.hideAllNonBaseMenuItem({
	      success: function () {
	        alert('已隐藏所有非基本菜单项');
	      }
	    });
	  };

	  // 8.6 显示所有被隐藏的非基本菜单项
	  document.querySelector('#showAllNonBaseMenuItem').onclick = function () {
	    wx.showAllNonBaseMenuItem({
	      success: function () {
	        alert('已显示所有非基本菜单项');
	      }
	    });
	  };

	  // 8.7 关闭当前窗口
	  document.querySelector('#closeWindow').onclick = function () {
	    wx.closeWindow();
	  };

	  // 9 微信原生接口
	  // 9.1.1 扫描二维码并返回结果
	  document.querySelector('#scanQRCode0').onclick = function () {
	    wx.scanQRCode({
	      desc: 'scanQRCode desc'
	    });
	  };
	  // 9.1.2 扫描二维码并返回结果
	  document.querySelector('#scanQRCode1').onclick = function () {
	    wx.scanQRCode({
	      needResult: 1,
	      desc: 'scanQRCode desc',
	      success: function (res) {
	        alert(JSON.stringify(res));
	      }
	    });
	  };

	

	  // 11.3  跳转微信商品页
	  document.querySelector('#openProductSpecificView').onclick = function () {
	    wx.openProductSpecificView({
	      productId: 'pDF3iY0ptap-mIIPYnsM5n8VtCR0'
	    });
	  };

	  // 12 微信卡券接口
	  // 12.1 添加卡券
	  document.querySelector('#addCard').onclick = function () {
	    wx.addCard({
	      cardList: [
	        {
	          cardId: 'pDF3iY9tv9zCGCj4jTXFOo1DxHdo',
	          cardExt: '{"code": "", "openid": "", "timestamp": "1418301401", "signature":"64e6a7cc85c6e84b726f2d1cbef1b36e9b0f9750"}'
	        },
	        {
	          cardId: 'pDF3iY9tv9zCGCj4jTXFOo1DxHdo',
	          cardExt: '{"code": "", "openid": "", "timestamp": "1418301401", "signature":"64e6a7cc85c6e84b726f2d1cbef1b36e9b0f9750"}'
	        }
	      ],
	      success: function (res) {
	        alert('已添加卡券：' + JSON.stringify(res.cardList));
	      }
	    });
	  };

	  // 12.2 选择卡券
	  document.querySelector('#chooseCard').onclick = function () {
	    wx.chooseCard({
	      cardSign: '97e9c5e58aab3bdf6fd6150e599d7e5806e5cb91',
	      timestamp: 1417504553,
	      nonceStr: 'k0hGdSXKZEj3Min5',
	      success: function (res) {
	        alert('已选择卡券：' + JSON.stringify(res.cardList));
	      }
	    });
	  };

	  // 12.3 查看卡券
	  document.querySelector('#openCard').onclick = function () {
	    alert('您没有该公众号的卡券无法打开卡券。');
	    wx.openCard({
	      cardList: [
	      ]
	    });
	  };

	  var shareData = {
	    title: '方倍工作室 微信JS-SDK DEMO',
	    desc: '微信JS-SDK,帮助第三方为用户提供更优质的移动web服务',
	    link: 'http://www.cnblogs.com/txw1958/',
	    imgUrl: 'http://mmbiz.qpic.cn/mmbiz/icTdbqWNOwNRt8Qia4lv7k3M9J1SKqKCImxJCt7j9rHYicKDI45jRPBxdzdyREWnk0ia0N5TMnMfth7SdxtzMvVgXg/0'
	  };
	  wx.onMenuShareAppMessage(shareData);
	  wx.onMenuShareTimeline(shareData);
	});

	wx.error(function (res) {
	  alert(res.errMsg);
	});


</script>
</html>
