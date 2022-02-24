 if(typeof _GLOBAL == 'undefined')
 {
 	var _GLOBAL={}
 }
  
   _GLOBAL.mb_opened=false;
   _GLOBAL.IFNSFW_TEST = 1;
  if(_GLOBAL.IFNSFW_TEST)
  {
    _GLOBAL.TB_TEST  ='img/thumb.jpg' ;
    _GLOBAL.SQ_TEST  ='img/square.jpg';
    _GLOBAL.NSTB_CDN =''              ;
    _GLOBAL.NSSQ_CDN ='/square'              ;
  }
    else
    {

    _GLOBAL.TB_TEST  ='';
    _GLOBAL.SQ_TEST  ='';
    _GLOBAL.NSTB_CDN ='';
    _GLOBAL.NSSQ_CDN ='';
    }

    _GLOBAL.PIXEL1X1 =(location.href.match('tomonews') || location.href.match('tomoplace') )?0:1;



var cnf_1X1 ={};
cnf_1X1.params={
'HOME'                 :{'ch':'NEWS'             ,'sec':'HOMEPAGE'                                  ,'cate':'NEWS'         },                               
'NEWSFEED'             :{'ch':'NEWS'             ,'sec':'NEWSFEED'                                  ,'cate':'NEWS'         },                               
'US'                   :{'ch':'NEWS'             ,'sec':'US'                                        ,'cate':'NEWS'         },                         
'WORLD'                :{'ch':'NEWS'             ,'sec':'WORLD'                                     ,'cate':'NEWS'         },                            
'ASIA'                 :{'ch':'NEWS'             ,'sec':'ASIA'                                      ,'cate':'NEWS'         },                           
'SCI-TECH'             :{'ch':'SCI & TECH'       ,'sec':'SCI & TECH'                                ,'cate':'TECH'         },                                       
'SPORTS'               :{'ch':'SPORTS'           ,'sec':'SPORTS'                                    ,'cate':'SPORTS'       },                               
'ENTERTAINMENT'        :{'ch':'ENTERTAINMENT'    ,'sec':'ENTERTAINMENT'                             ,'cate':'ENTERTAINMENT'},                                             
'POLITICS'             :{'ch':'POLITICS'         ,'sec':'POLITICS'                                  ,'cate':'POLITICS'     },                                   
'GEEK'                 :{'ch':'SCI & TECH'       ,'sec':'GEEK'                                      ,'cate':'TECH'         },                                 
'TOMOGIRLS'            :{'ch':'TOMOGIRLS'        ,'sec':'TOMOGIRLS'                                 ,'cate':'DIVA'         },                                     
'SOCIETY'              :{'ch':'SOCIETY'          ,'sec':'SOCIETY'                                   ,'cate':'NEWS'         },                                 
'CHINESE'              :{'ch':'CHINESE'          ,'sec':'CHINESE'                                   ,'cate':'NEWS'         },                                 
'NO-COMMENT'           :{'ch':'NOCOMMENT'        ,'sec':'NOCOMMENT'                                 ,'cate':'NEWS'         },                                     
'NMA-ORIGINALS'        :{'ch':'NMAORIGINALS'     ,'sec':'NMAORIGINALS'                              ,'cate':'ANIMATION'    },                                           
'MOST-VIEWED'          :{'ch':'NEWS'             ,'sec':'MOSTHIT'                                   ,'cate':'NEWS'         },                              
'TOMOPLAY'             :{'ch':'DVCHANNEL'        ,'sec':'TOMOPLAY'                                  ,'cate':'NEWS'         },                                    
'NASTY OR NIIIICE'     :{'ch':'THEMES'           ,'sec':'NASTY OR NIIIICE'                          ,'cate':'NEWS'         },                                         
'WHAT THE FREAK?'      :{'ch':'THEMES'           ,'sec':'WHAT THE FREAK?'                           ,'cate':'HUMOR'        },                                        
'GOOD COP'             :{'ch':'THEMES'           ,'sec':'GOOD COP'                                  ,'cate':'NEWS'         },                                 
'BAD COP'              :{'ch':'THEMES'           ,'sec':'BAD COP'                                   ,'cate':'NEWS'         },                                
'CELEBRITY SHORTS'     :{'ch':'THEMES'           ,'sec':'CELEBRITY SHORTS'                          ,'cate':'CELEB'        },                                         
'WHAT THE FOUL?'       :{'ch':'THEMES'           ,'sec':'WHAT THE FOUL?'                            ,'cate':'SPORT'        },                                       
'AWW! ANIMALS!'        :{'ch':'THEMES'           ,'sec':'AWW! ANIMALS!'                             ,'cate':'ANIMAL'       },                                      
'DEFYING DEATH'        :{'ch':'THEMES'           ,'sec':'DEFYING DEATH'                             ,'cate':'NEWS'         },                                      
'GUN CRAZY'            :{'ch':'THEMES'           ,'sec':'GUN CRAZY'                                 ,'cate':'NEWS'         },                                  
'EVERYDAY HEROES'      :{'ch':'THEMES'           ,'sec':'EVERYDAY HEROES'                           ,'cate':'NEWS'         },                                        
'JUSTICE IS SERVED'    :{'ch':'THEMES'           ,'sec':'JUSTICE IS SERVED'                         ,'cate':'NEWS'         },                                          
'YOU IDIOT!'           :{'ch':'THEMES'           ,'sec':'YOU IDIOT!'                                ,'cate':'HUMOR'        },                                   
'POLICE STATE'         :{'ch':'THEMES'           ,'sec':'POLICE STATE'                              ,'cate':'NEWS'         },                                     
'PC POLICE'            :{'ch':'THEMES'           ,'sec':'PC POLICE'                                 ,'cate':'NEWS'         },                                  
'MAXIMUM SUFFRAGE'     :{'ch':'THEMES'           ,'sec':'MAXIMUM SUFFRAGE'                          ,'cate':'NEWS'         },                                         
'NSFW'                 :{'ch':'THEMES'           ,'sec':'NSFW'                                      ,'cate':'ADULT'        },                             
'TOPICS'               :{'ch':'TOPICS'           ,'sec':'?TOPIC TITLE?'                             ,'cate':'NEWS'         }                                                            

};
 