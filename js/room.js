// JavaScript Document



	$(function(){
		// 用來顯示大圖片用
		var $block = $('.room'), 
			$a = $block.find('a'), 
			$showImage = $('#show-image');
		
		// 當滑鼠移到 .room 中的某一個超連結時
		$a.mouseover(function(){
			var $this = $(this).addClass('on').siblings('.on').removeClass('on').end(), 
				_src = $this.attr('href');
			// 如果現在大圖跟目前要顯示的圖不是同一張時
			if($showImage.attr('src') != _src){
				$showImage.hide().attr('src', _src).stop(false, true).fadeTo(400, 1);
			}

			return false;
		}).click(function(){
			// 如果超連結被點擊時, 取消連結動作
			return false;
		});
		
		$showImage.add($a).hover(function(){
			// 當滑鼠移入時, 停止計時器
			clearTimeout(timer);
		}, function(){
			// 當滑鼠移出時, 啟動計時器
			timer = setTimeout(auto, speed);
		});
		
		// 用 speed 表示切換輪播的速度
		var timer, speed = 3000;
		
		// 用來自動輪播使用
		function auto(){
			var _index = $a.filter('.on').index();
			_index = (_index + 1) % $a.length;
			$a.eq(_index).mouseover();
			timer = setTimeout(auto, speed);
		}
		
		// 啟動計時器
		timer = setTimeout(auto, speed);
	});
