<?php
require_once(dirname(__FILE__) . '/app.php');
require_once(dirname(__FILE__) . '/MailChimp.php');

$string = "
yaodongy1018@gmail.com,yifeigao@yeah.net,angela-yi123@hotmail.com,jackexplorer1958@yahoo.ca,gchuanzhang@gmail.com,applejonsi@hotmail.com,echo_lolita@hotmail.com,liuhailun511@163.com,Nicole_Yu1234@hotmail.com,yeziyu@msn.com,xiatian1989@gmail.com,stillfantasy2006@hotmail.com,qiuyuliang20042005@hotmail.com,tracyjingwu@hotmail.com,kejiaoyan@gmail.com,jianghaoranubc@yahoo.cn,yuan-0905@hotmail.com,jackson_ro@hotmail.com,pinky-boy-26@hotmail.com,ophelia_1202@hotmail.com,zhenglin0919@hotmail.com,ashleywang23@yahoo.com,kiddyyy@gmail.com,rxe1992@hotmail.com,zhxc123456789@hotmail.com,cwz_1992@hotmail.com,faafaa0129@gmail.com,martin1757@hotmail.com,linda_liduo@msn.com,kevin880308@hotmail.com,supersurgei@hahoo.ca,shuyiwang@live.cn,yunyunzai@hotmail.com,lzyvan@hotmail.com,xwang012@hotmail.com,sophiadeng@hotmail.com,phonecall77@hotmail.com,colin1898@gmail.com,chuanxin623@gmail.com,kopad@live.cn,amylwing@gmail.com,aligancool@hotmail.com,princessnrj@hotmail.com,dxxi@hotmail.com,zhuwangyi0@hotmail.com,crabx@live.cn,li_oh_happy@hotmail.com,jay_smoon@hotmail.com,rong.yu.880704@gmail.com,henryliu501@msn.com,soniquez@163.com,datouzhangyichi@hotmail.com,snowflakejan@hotmail.com,liutianqi19921109@hotmail.com,geniustang@msn.com,jonleung91@gmail.com,yezichun@gmail.com,frankweishaocong@hotmail.com,bbcdebora@hotmail.com,jzhai@sfu.ca,siyang323@gmail.com,stan12@interchange.ubc.ca,david_adventurer@hotmail.com,chingyuan.hou@gmail.com,charlene_ly1314@hotmail.com,yla75@sfu.ca,lumberjack_aoe@hotmail.com,frank19891124300@hotmail.com,fangty123@hotmail.com,charlene127cheng@hotmail.com,zyan1988@gmail.com,Renovatio1989@yahoo.co.jp,narcissusjohnny@hotmail.com,Kelly.m.he@gmail.com,cnjt1987@hotmail.com,zhu_yanqiao@hotmail.com,dijing112@gmail.com,tea_bag1314@hotmail.com,rogerzhang18@hotmail.com,yuanxi28000@hotmail.com,alice.cai9077@hotmail.com,warren-zhao@hotmail.com,carlxing91@msn.com,zhulilucy@hotmail.com,tsdthr@yahoo.cn,dumajin@hotmail.com,bolinshing@msn.com,jackzheng@hotmail.com,michaellilong@hotmail.com,Yichen89@msn.com,cyf3361@gmail.com,alicewangmengjie007@hotmail.com,fansmiling@sina.com.cn,heaven19901937@hotmail.com,leemh1220@hotmail.com,cherryhjt@gmail.com,irishu@live.ca,mqfu89@gmail.com,wendycheng89@gmail.com,dovglas76lam@hotmail.com,rrzhang001@yahoo.ca,Kongcheng18@hotmail.com,xijingzhu66@hotmail.com,lishuo.kevin@hotmail.com,ssimo1218@hotmail.com,lsnliu12@hotmail.com,qian880925@hotmail.com,kathy_0803@hotmail.com,fswujin0102@hotmail.com,llmt2010@interchange.ubc.ca,riisezhang@gmail.com,mmeili-89@hotmail.com,tiffanychoy92@hotmail.com,chelseywenruiguo@hotmail.com,ericwxd@gmail.com,yxh_91@hotmail.com,mengshu_6@hotmail.com,alex4206@gmail.com,liangkaili1124@hotmail.com,dongjie101@hotmail.com,albertycxiao@hotmail.com,shitianyuan2009@hotmail.com,beier0816@hotmail.com,andreawu144@hotmail.com,tangyujie312@gmail.com,louisyu2010@hotmail.com,michelleyan66@hotmail.com,katharine_yi@hotmail.com,z_y_x001@hotmail.com,zxbdstt@hotmail.com,tidybear2@gmail.com,missturtle_go@hotmail.com,shiwenwendy@hotmail.com,chenli0525@hotmail.com,zhangxiaoyan2010a@yahoo.cn,steven.6721@hotmail.com,s752855@hotmail.com,szhang1718@hotmail.com,dreamingmysheep@hotmail.com,biqiaoran@hotmail.com,requieml@hotmail.com,colbykot@hotmail.com,China-LYH@hotmail.com,lesliejack711@hotmail.com,jack.liufan@hotmail.com,apriljinzi@hotmail.com,terrychenlin@yahoo.com,what1what2what3@hotmail.com,yjx6672@hotmail.com,yang-yijie@163.com,ericxwd@gmail.com,valislcz@gmail.com,maryliuym@hotmail.com,thatcrazyman@hotmail.com,netxb1985@hotmail.com,BillSuiBeijing@hotmail.com,rpxue@hotmail.com,wuchumeng@gmail.com,lisawang90@gmail.com,gfashe69@hotmail.com,kimishenjw@hotmail.com,angelmo7111@hotmail.com,jlajla711711@hotmail.com,purple831cn@hotmail.com,faa0129@hotmail.com,yz1992yz@hotmail.com,Peter_Zhangyuqian@hotmail.com,qixuan92@hotmail.com,ninth_revolver@hotmail.com,lammichael@hotmail.com,qiuqiuyuli@hotmail.com,qiujingming@hotmail.com,landbeneathhe11@hotmail.com,hsc1117@126.com,zyf830104@gmail.com,stanly.huangshan@gmail.com,tjbarss@hotmail.com,Johnqi2009@gmail.com,clong@chbe.ubc.ca,hugochanhle@hotmail.com,tnovaz@yahoo.ca,mayatassel@hotmail.com,sunjiqing1@hotmail.com,ff00luke@hotmail.com,austinliuyang@gmail.com,hansen.jiang@hotmail.com,cindywanhsingchen@hotmail.com,yonghengnina@gmail.com,tina_yang722@hotmail.com,kakei0128@hotmail.com,dereksun711@hotmail.com,cute_lemon123@hotmail.com,alice5100@hotmail.com,carlton727@hotmail.com,happyamy711@gmail.com,jing_vela@hotmail.com,peter@uegame.com,louyun1989@hotmail.com,liusiwen1988@hotmail.com,chrissie198911@hotmail.com,yuxiuhaha@hotmail.com,katherine_yi@hotmail.com,cowansta@hotmail.com,anziweia@hotmail.com,mwang0126@gmail.com,anthonyli1986@hotmail.com,danni_li@hotmail.com,xiaokr06@hotmail.com,puppetrylk@hotmail.com,symonds0124@hotmail.com,ray.yilei@gimail.com,andie0803@hotmail.com,jamesfcpena@hotmail.com,shiningmaggie@hotmail.com,yao.meng.ym@gmail.com,anubis_bai@hotmail.com,mary_leehom@yahoo.com.cn,maggiey@interchange.ubc.ca,lxldingding@hotmail.com,aaronhao@interchange.ubc.ca,xunjgao@hotmail.com,zoujih63@msn.com,liujialin.liu@gmail.com,shanyang0628@gmail.com,hiyawu2001@hotmail.com,kelwinnnnn@hotmail.com,ma-jiaojiao@hotmail.com,JK561W@hotmail.com,vincent_jsz_35@hotmail.com,supersuperhan@hotmail.com,waiemily12@hotmail.com,kinoyuting@hotmail.com,kuan801108@hotmail.com,bbqwudi@hotmail.com,amosangjiajun@gmail.com,yuwen790322@hotmail.com,missamelon@gmail.com,sulin5friends@hotmail.com,lokaiman@hotmail.com,ziziwa1207@hotmail.com,angelang27@hotmail.com,rachael_0213@hotmail.com,pfpsabre@gmail.com,nino.xu@gmail.com,nickatcsa@gmail.com,hirai_rei@live.ca,liyimei_rain@hotmail.com,boxiangj@gmail.com,peterfan01@hotmail.com,rogerzhai86@hotmail.com,peelnicholas@Hotmail.com,you_xiang@msn.com,karenwu91@hotmail.com,srayleigh@gmail.com,wry1012@hotmail.com,bbqbbc168@hotmail.com,hammerde@hotmail.com,seniqwa@hotmail.com,lucia.lu.yu@gmail.com,xie_helen71@hotmail.com,luamiinnes1379@hotmail.com,huangrr1980@hotmail.com,dom_wong@hotmail.com,tony_1990_810@hotmail.com,fangyuntao2005@yahoo.ca,493216598@qq.com,qinmengyuan1@126.com,miffysuen@hotmail.com,gpm196@hotmail.com,jacklikewawa@hotmail.com,Mengwei529@hotmail.com,senk0326@hotmail.com,635074820@qq.com,loveless--me@hotmail.com,renren33_ai_ken@yahoo.com,naw_10@yahoo.com,eyetuncxlover@gmail.com,eieiuhooh@hotmail.com,Aprilkong91111@hotmail.com,jelly0619@yahoo.com.cn,leibingou@hotmail.com,queyichen@hotmail.com,lollight@hotmail.com,ma_tian_zi@sina.com,alexjohn1202@hotmail.com,xiapaonil@126.com,williamguoxiao@yahoo.ca,guardianandrew@hotmail.com,qjx007@gmail.com,gn00741590@hotmail.com,roychoa@hotmail.com,421358497@qq.com,yam_wing_yin@hotmail.com,kctk.langara@gamil.com,liangpaul@live.cn,mattpisgod@hotmail.com,cooldog636@163.com,yilezhou@gmail.com,jimmy_syb@hotmail.com,jtl_4ever@hotmail.com,terrylee787@gmail.com,a3346888@163.com,joyqin@live.cn,kevin100168554@hotmail.com,411849718@qq.com,tequieno@yahoo.com.cn,markchen0187@hotmail.com,698504056@ntu.edu.tw,marslionzl@gmail.com,bryankimking@hotmail.com,lixu.xuli@gmail.com,jkeenvniyn@hotmail.com,sandybb65@hotmail.com,hanyuhang49@hotmail.com,williambillchi@hotmail.com,lishangheng001@hotmail.com,liaozhmichael@gmail.com,lxinter@hotmail.com,hxin890424@hotmail.com,pyfz@sfu.ca
";

$array = explode(',',$string);

foreach($array as $key => $val){
		$MailChimp = new \Drewm\MailChimp(MC_KEY);
		$result = $MailChimp->call('lists/subscribe',array(
                'id'                => '9a249e7984',
                'email'             => array('email' => $val),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));
}

phpinfo();