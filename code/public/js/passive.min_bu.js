function SOCIAL_BTNS(t) {
    function e() {
        window.prompt("Select all and press 'Copy'", location.href)
    }
    var i = 0,
        n = t.find(".btn_social"),
        o = t.find(".sc_item2");
    this.init = function() {
        n.click(function() {
            i ? ($(this).fadeIn("fast").css("display", "inline-block"), o.hide(), i = 0) : ($(this).hide(), o.fadeIn("fast").css("display", "inline-block"), i = 1)
        }), t.find(".sc_item.fb").click(function() {
            window.open("http://www.facebook.com/share.php?u=".concat(encodeURIComponent(location.href)))
        }), t.find(".sc_item.twr").click(function() {
            window.open("https://twitter.com/share?url=" + encodeURIComponent(location.href) + "&via=TomoNewsUS&text=" + _GLOBAL.vdo_title)
        }), t.find(".sc_item.email").click(function() {
            window.location.href = "mailto:?subject=" + _GLOBAL.vdo_title + "&body=" + encodeURIComponent(location.href)
        }), t.find(".sc_item.url").click(function() {
            e()
        }), t.find(".sc_item.gplus").click(function() {
            window.open("https://plus.google.com/share?url=" + encodeURIComponent(location.href))
        }), t.find(".sc_item.stum").click(function() {
            window.open("http://www.stumbleupon.com/submit?url=" + encodeURIComponent(location.href) + "&title=" + _GLOBAL.vdo_title)
        }), t.find(".sc_item.reddit").click(function() {
            window.open("http://reddit.com/submit?url=" + encodeURIComponent(location.href) + "&title=" + _GLOBAL.vdo_title)
        })
    }
}

function VIDEO() {
    var t = "off";
	
    this.init = function() {
        if ("off" == t) {
            t = "on";

			initializing_player();
            
        } else {
			//anvp.vdoplayer.stop();
			anvp.vdoplayer.unload();
			initializing_player();
        }
    } 
	
	anvp.listener = playerCallback;
		function playerCallback(event)	{
			var videoCompleted = 0;
			
			switch(event.name) {
				case "VIDEO_STARTED":
					_GLOBAL.old_ga != _GLOBAL.vdo_title + "-" + _GLOBAL.vdo_id && GT("TomoPlay_Desktop", "play", _GLOBAL.vdo_title + "-" + _GLOBAL.vdo_id), _GLOBAL.old_ga = _GLOBAL.vdo_title + "-" + _GLOBAL.vdo_id
					break;
			case "PLAYLIST_COMPLETED":
				//
				_tbns_pl.get_index() == _tbns_pl.get_number() - 1 || _tbns_pl.get_update_next_vdo_info()
				break;
		}	
	};
	
	this.set_playListen = function() {
       /* $("#vdoplayer").bind("playerplaycomplete", function(t, i) {
            var e = $("#vdoplayer").player("isAdvert");
            e || _tbns_pl.get_index() == _tbns_pl.get_number() - 1 || _tbns_pl.get_update_next_vdo_info()
        }),*/ 
		
		$("#vodx_playnext").click(function() {
            _tbns_pl.get_update_next_vdo_info()
			anvp.vdoplayer.playNext();
        });
		
		$("#vodx_playprev").click(function() {
            _tbns_pl.get_update_prev_vdo_info()
			anvp.vdoplayer.playPrevious();
        });
		
		
		$("#vdoplayer").hover(function() {
			console.log('hover')
            $("#vodx_title").fadeIn()
        },function() {
            $("#vodx_title").fadeOut()
        });
		
		
		/*$("#vdoplayer").bind("playerplay", function(t, i) {
            _GLOBAL.old_ga != _GLOBAL.vdo_title + "-" + _GLOBAL.vdo_id && GT("TomoPlay_Desktop", "play", _GLOBAL.vdo_title + "-" + _GLOBAL.vdo_id), _GLOBAL.old_ga = _GLOBAL.vdo_title + "-" + _GLOBAL.vdo_id
        })

		$("#vdoplayer").bind("playerplaycomplete", function(t, i) {
            //$("#vdoplayer").player("stop")
			anvp.vdoplayer.stop();
        });*/
		//console.log( anvp.vdoplayer.getState() );
    }
	
	function initializing_player(){
		
		var $_data = $('#initialize_player');
		$_data.remove();
		var _attr = '<script id="initialize_player" data-anvp=\'{"accessKey": "X8POa4zYBLKbwUqmWLHOUZ9OlGAM9VN3", "pInstance":"vdoplayer", "token": "default", "mcp":"MCP1", "video":"'+ _GLOBAL.vdo_id +'"}\' src="'+ _GLOBAL.anvato_player +'"></script>'
		$('body').append(_attr);
	}
}

function copyToClipboard() {
    $("#sb_copy").zclip({
        path: _GLOBAL.base + "js/ZeroClipboard.swf",
        copy: $("#sb_copy_rtn").val()
    })
}

function copyToClipboard2() {
    $("#sb6").zclip({
        path: _GLOBAL.base + "js/ZeroClipboard.swf",
        copy: $("#sb_copy_rtn2").val()
    })
}

/*function VDO_SOCIAL_BOX() {
    this.init = function() {
        $("#shre_icon3").click(function() {
            $("#share_box2").appendTo("#social_top"), $("#share_box3").css("left", 50), $("#share_box3").show()
        }), $("#sb_close").click(function() {
            $("#share_box3").fadeOut("fast")
        })
    }
}*/

function TBNS_PL() {
    function t(t, i, e, a) {
        $_date=''; w = [], B = [], k = [], G = [], h = i, f = t, v = e, y = a,  $(y).find(".thumbnail_item").css("opacity", .5), n(f, M, S)
    }

    function i() {
        m(), $(".thumbnails_container.current").find(".btn_left").click(function() {
            parseInt($(y).css("left"));
            if (h > 1) {
                h--;
                var t = -x * (h - 1) - 17;
                TweenMax.to($(y), .5, {
                    left: t + "px"
                })
            }
            m()
        }), $(".thumbnails_container.current").find(".btn_right").click(function() {
            var t;
            A > h ? (h++, t = -x * (h - 1) - 17, TweenMax.to($(y), .5, {
                left: t + "px"
            })) : (h = 1, TweenMax.to($(y), 1, {
                left: "-17px"
            })), m()
        })
    }

    function e(t) {
        $getUrls = 'http://api.nm.anvato.net/v2/feed/KBJRKBD5PNUFPGRALF?filters[]=u_Next_Media_Clip_Id_s="'+t+'"'; 
		$.ajax({
            url: $getUrls,
            type: "post",
			dataType: "json",
            success: function(i) {
                //console.log(i.params.video_list.video.title);
				//var i = jQuery.parseJSON(i);
                var e = l().length > 0 ? "?" + l() : "",
                    n = i.docs[0].c_title_s;
                location.href = _GLOBAL.base + remove_punc(n) + "-" + t + e
            }
        })
    }

    function n(t, a, o) {
        $getUrls = "http://api.nm.anvato.net/v2/feed/" + t + '?start=' + ((a - 1) * o ) + "&count=" + o +'&sort=c_ts_publish_l+desc';
		$.ajax({
            url: $getUrls,
            type: "post",
           // dataType: "xml",
		   dataType: "json",
            success: function(t) {
                var a;
				var obj = t;
               
                try {
					 a = obj.docs.length > 0 ? obj.docs.length : 0;					
                } catch (o) {
					a = 0;
                }
				for (var r = 0; a > r; r++) {
					$tit = obj.docs[r].c_title_s; 
					$vid = obj.docs[r].obj_id; 
					$_date = new Date(obj.docs[r].c_ts_publish_l*1000), $_date = $_date.toISOString();
					B.push(escape($tit)); 
					G.push($vid);
					k.push(escape( obj.docs[r].u_Mobile_Description__Sub_head__s )); 
					var $thumb;
					thumbnail = obj.docs[r].thumbnails;
					
					for(var j = 0 ; j<thumbnail.length  ; j++){
						
						/*if( thumbnail[j]['role'] == 'square' && thumbnail[j]['width'] == '128'){  $thumb = thumbnail[j]['url']; break; 
						} else */if( thumbnail[j]['role']=='poster' ){  $thumb = thumbnail[j]['url']; break; }
						
					}
					
					$NSFW_v = false;
		
					if ( "NSFW" == obj.docs[r].u_NSFW_Tag_s) { $NSFW_v = true; } 
							
					if ( $NSFW_v && !_GLOBAL.NSFW ){
						w.push(_GLOBAL.base + _GLOBAL.TB_TEST);
					}else{
						w.push($thumb);
					}
				
					 v == $vid.toString() && (N = r + (M - 1) * S)
				}
				return -1 == N && "0" != v ?  void e(v) : ("0" == v && (N = 0), a > 0 ? (b = B.length, A = Math.ceil(b / 4)) : $(y).find(".thumbnail_item").css("opacity", 1), _(), 2 == M ? (T || (console.log('ini video'), L = new VIDEO, L.set_playListen(), d(B[N], k[N], G[N], N)), s(), i()) : console.log('no ini video'), (M = 2, n(f, M, S)), void O())
				
			},
			error: function(e){
				console.log(e)
			}
        }).done(function() {
			//return -1 == N && "0" != v ? void e(v) : ("0" == v && (N = 0), a > 0 ? (b = B.length, A = Math.ceil(b / 4)) : $(y).find(".thumbnail_item").css("opacity", 1), _(), 1 == M ? (T || (L = new VIDEO, L.set_playListen(), d(B[N], k[N], G[N], N)), s(), i()) : (M = 2, n(f, M, S)), void O())
		})
    }

    function a() {
        g == b - 1 || (g++, d(B[g], k[g], G[g], g), s())
    }

    function o() {
        g > 0 && (g--, d(B[g], k[g], G[g], g), s())
    }

    function s() {
        h = Math.ceil((g + 1) / 4);
        var t = -x * (h - 1) - 17;
        TweenMax.to($(y), .5, {
            left: t + "px"
        }), m()
    }

    function r() {
        $(y).find(".thumbnail_item").each(function() {
            var t = $(this).data("id");
            t == _GLOBAL.vdo_id ? ($(this).find(".playingtxt").show(), $(this).find(".thumbnail_img").css("opacity", .3), $(this).find(".thumbnail_title").animate({
                bottom: -77
            }, 300)) : ($(this).find(".playingtxt").hide(), $(this).find(".thumbnail_img").css("opacity", 1))
        })
    }

    function d(t, i, e, n) {
        $("#vdo_title").html(unescape(t)), $("#vdo_sub").html(unescape(i) + "&nbsp;"), $("#vdo_sub").append('<a href="#" target="_blank" id="readmore_lnk" onclick=""><div class="readmore">Read the Full Article Here</div></a>'), _GLOBAL.vdo_id = e, _GLOBAL.vdo_title = remove_punc(unescape(t)), _GLOBAL.plist_id = f, g = n, h = Math.ceil((g + 1) / 4), L.init(), T = e, r();
        var a = l().length > 0 ? "?" + l() : "";
        _GLOBAL.old_query == a && (a = ""), ____url.search(/tomo_us/i) >= 0 ? window.history.pushState("object or string", "title", "/tomo_us/tomoplay/" + f + "/" + h + "/" + _GLOBAL.vdo_id + a) : window.history.pushState("object or string", "title", "/tomoplay/" + f + "/" + h + "/" + _GLOBAL.vdo_id + a), _GLOBAL.old_query = a, $("#a_fb").attr("href", "javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('" + _GLOBAL.base + remove_punc(unescape(t)) + "-" + _GLOBAL.vdo_id + "')),'facebook share','width=520, height=320' ));GT('video' , 'clk' , 'SocialMediaShareTop_PC_clk')"), $("#a_tw").attr("href", "javascript: void(window.open('http://twitter.com/home/?status=" + c(t) + " " + _GLOBAL.base + remove_punc(unescape(t)) + "-" + _GLOBAL.vdo_id + " via @TomoNewsUS','twitter share','width=520, height=320' ));GT('video' , 'clk' , 'SocialMediaShareTop_PC_clk')");
        var o = _GLOBAL.base + remove_punc(unescape(t)) + "-" + e;
        $("#readmore_lnk").attr("href", o), $("#readmore_lnk").click(function() {
            GT("TomoPlay_Desktop", "clk", "TomoPlay_Desktop_ReadMore_clk")
        });
    }

    function l() {
        var t = window.location.search.substring(1);
        return t
    }

    function c(t) {
        return (t + "").replace(/[\\"']/g, "\\$&").replace(/\u0000/g, "\\0")
    }

    function u(t) {
        for (var i = 0; i < t.length; i++)
            if ("mobile" == t[i].ns && "description" == t[i].predicate) return t[i].value;
        return "0"
    }

    function _() {
        1 == M && $(y).find(".thumbnail_item").remove(),b = G.length;
        for (var t = (M - 1) * S; t < B.length; t++) $(y).append('<div class="thumbnail_item btn" data-id="' + G[t] + '"  data-title="' + B[t] + '"  data-desc="' + k[t] + '"   data-index="' + t + '" ><div class="thumbnail_img"><img width="100%" src="' + w[t] +'"></div><div class="thumbnail_title" style="bottom:-77px">' + unescape(B[t]) + '</div><div class="playingtxt invi"><img width="100%" data-src="' + _GLOBAL.base + 'img/playing.png">Playing Now</div></div>');
        2 == M && ($(y).find(".thumbnail_item").click(function() {
            var t = unescape($(this).data("title")),
                i = unescape($(this).data("desc")),
                e = $(this).data("id"),
                n = $(this).data("index");
            d(t, i, e, n)
        }), $(y).find(".thumbnail_item").hover(function() {
            var t = $(this).data("id");
            t != _GLOBAL.vdo_id && ($(this).find(".thumbnail_title").animate({
                bottom: "0"
            }, 300), $(this).find(".thumbnail_img").animate({
                opacity: ".2"
            }, 300))
        }, function() {
            var t = $(this).data("id");
            t != _GLOBAL.vdo_id && ($(this).find(".thumbnail_title").animate({
                bottom: -77
            }, 300), $(this).find(".thumbnail_img").animate({
                opacity: "1"
            }, 300))
        }))
    }

    function m() {
        1 == h ? $(".thumbnails_container.current").find(".btn_left").hide() : $(".thumbnails_container.current").find(".btn_left").show(), h == A ? ($(".thumbnails_container.current").find(".btn_right").data("id", "first"), $(".thumbnails_container.current").find(".btn_right").css("right", -20), p($(".thumbnails_container.current").find(".btn_right img"), _GLOBAL.base + "img/icon-refresh.png")) : ($(".thumbnails_container.current").find(".btn_right").show(), $(".thumbnails_container.current").find(".btn_right").data("id", "right"), $(".thumbnails_container.current").find(".btn_right").css("right", -10), p($(".thumbnails_container.current").find(".btn_right img"), _GLOBAL.base + "img/right_ico.png"))
    }

    function p(t, i) {
        t.attr("src", i)
    }
    var h, f, v, g, b, y, L, A, O, vid, w = [],
        B = [],
        G = [],
        k = [],
        T = 0,
        x = 984,
        S = 24,
        M = 1,
        N = -1;
    this.init = function(i, e, n, a, o) {
        $(y).find(".thumbnail_item").remove(), t(i, e, n, a), O = o, _vid = n
    }, this.get_page = function() {
        return h
    }, this.get_number = function() {
        return b
    }, this.get_index = function() {
        return g
    }, this.get_update_next_vdo_info = function() {
        a()
    }, this.get_update_prev_vdo_info = function() {
        o()
    }
}

function TBNS_PL_BOTTOM() {
    function t(t, i, n, a, o) {
        p = [], h = [], v = [], g = [], f = [], d = i, l = t, c = n, u = a, _ = o;
		$(u).find(".thumbnail_item").css("opacity", .5);
		e(l, L, y);
    }

    function i() {
        s(), $(_).find(".btn_left").click(function() {
            if (console.log("left"), d > 1) {
                d--;
                var t = -b * (d - 1) - 17;
                TweenMax.to($(u), .5, {
                    left: t + "px"
                })
            }
            s()
        }), $(_).find(".btn_right").click(function() {
            var t;
            m > d ? (d++, t = -b * (d - 1) - 17, TweenMax.to($(u), .5, {
                left: t + "px"
            })) : (d = 1, TweenMax.to($(u), 1, {
                left: "-17px"
            })), s()
        })
    }

    function e(t, o, s) {
        //$getUrls = "http://api.nmhk.movideo.com/rest/playlist/" + t + '/media?excludeTags=["keyword:name=testvideo"]&page=' + (o - 1) + "&pageSize=" + s + "&orderDesc=true&orderBy=creationdate&output=json&token=" + _token, 
		$getUrls = "http://api.nm.anvato.net/v2/feed/" + t + '?start=' + ((o - 1) * s ) + "&count=" + s + '&sort=c_ts_publish_l+desc';	
		
		$.ajax({
			url: $getUrls,
            type: "post",
            dataType: "json",
            success: function(t) {
                $(_).find(".bottom_loading").hide();
                var s;
				var obj = t;
				
                try {
					s = obj.docs.length > 0 ? obj.docs.length : 0 ;
					
				} catch (r) {
                    console.log(r);
					s = 0;
                }
				
				for (var c = 0; c < s; c++) {
						
					$tit = obj.docs[c].c_title_s; 
						
					$vid = obj.docs[c].obj_id; 
					$date = new Date(obj.docs[c].c_ts_publish_l*1000);
					$date = $.datepicker.formatDate('yy/mm/dd', $date);
					$cate_id = obj.docs[c].c_category_smv[0];
					$view = 0;
					thumbnail = obj.docs[c].thumbnails;
					
					var $thumb;
					for(var j = 0 ; j<thumbnail.length  ; j++){
						
						if( thumbnail[j]['role'] == 'square' && thumbnail[j]['width'] == '128'){  $thumb = thumbnail[j]['url']; break; 
						} else if( thumbnail[j]['role']=='poster' ){  $thumb = thumbnail[j]['url']; break; }
						
					}
					
					$NSFW_v = false;

					if ( "NSFW" == obj.docs[c].u_NSFW_Tag_s) { $NSFW_v = true; } 
							
					if ( $NSFW_v && !_GLOBAL.NSFW ){
						p.push(_GLOBAL.base + _GLOBAL.TB_TEST);
					}else{
						p.push($thumb);
					}
						
					g.push({
						title: $cate_id,
						date: $date,
						view: $view
					});
						
					h.push(escape($tit));
					f.push($vid);
					v.push(escape(obj.docs[c].u_Mobile_Headline_s )); 
						
				}
					
				s > 0 ? (number = s, m = Math.ceil(number / 4)) : $(u).find(".thumbnail_item").css("opacity", 1), a(), 1 == L ? (0 != s && (d = o), /*L = 2,e(l, L, y)*/i()) : i()
            }
        }).done(function() {
			/*$( "img.lazy" ).each(function() {
				var src = $(this).attr('data-original');
				$(this).attr('src',src);
				$(this).attr('data-original','');
				
			});*/
			
		})
    }

    function n(t) {
        for (var i = 0; i < t.length; i++)
            if ("mobile" == t[i].ns && "description" == t[i].predicate) return t[i].value;
        return "0"
    }

    function a() {
        1 == L && $(u).find(".thumbnail_item").remove();
							
        for (var t = (L - 1) * y; t < h.length; t++) {
            $cate_id = g[t].title, $date = g[t].date, $view = g[t].view, "4488" == $cate_id ? ($cate_id = "4489", $catename = $menuAry["4489"]) : $catename = o($cate_id);
            var i = '<div class="movlabelz"><div class="w' + $cate_id + ' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder">' + $catename + '</div><div class="ml2">' + $date + '</div><div class="cb"></div></div>';
            $(u).append('<div class="thumbnail_item btn" data-id="' + f[t] + '"  data-title="' + h[t] + '"  data-desc="' + v[t] + '" ><div class="thumbnail_img"><img width="100%" class="lazy" src="'+ p[t] +'"></div>' + i + '<div class="thumbnail_title" style=""><p>' + unescape(h[t]) + '</p></div></div>')
        }
        2 == L && $(u).find(".thumbnail_item").click(function() {
            c = $(this).data("id"), location.href = _GLOBAL.base + "tomoplay/" + l + "/" + d + "/" + c
        })
    }

    function o(t) {
        return $menuAry = [], $menuAry["4476"] = "U.S.", $menuAry["4477"] = "World", $menuAry["4478"] = "4478", $menuAry["4485"] = "Sci & Tech", $menuAry["4479"] = "Sports", $menuAry["4480"] = "Entertainment", $menuAry["4481"] = "Politics", $menuAry["4482"] = "Geek", $menuAry["4483"] = "TomoGirls", $menuAry["4484"] = "Society", $menuAry["4486"] = "Chinese", $menuAry["No Comment"] = "4487", $menuAry["4489"] = "Tomo Originals", $menuAry[t]
    }

    function s() {
        1 == d ? $(_).find(".btn_left").hide() : $(_).find(".btn_left").show(), d == m ? ($(_).find(".btn_right").data("id", "first"), $(_).find(".btn_right").css("right", -20), r($(_).find(".btn_right img"), _GLOBAL.base + "img/icon-refresh.png")) : ($(_).find(".btn_right").show(), $(_).find(".btn_right").data("id", "right"), $(_).find(".btn_right").css("right", -10), r($(_).find(".btn_right img"), _GLOBAL.base + "img/right_ico.png"))
    }

    function r(t, i) {
        t.attr("src", i)
    }
    var d, l, c, u, _, m, p = [],
        h = [],
        f = [],
        v = [],
        g = [],
        b = 984,
        y = 16,
        L = 1;
    this.init = function(i, e, n, a, o) {
        $(u).find(".thumbnail_item").remove();
		t(i, e, n, a, o);
    }
}