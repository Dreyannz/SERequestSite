<?php
/*
INTRODUCTION :

Softether Account Creator Script by imKobz | Current Version : 1.1
            -[Programmed in PHP (Basic)]-

* Fast Execute
* Can be uploaded in a FREE Host
* No more waiting in creating an account, Instant Activation.

This work is base on fractalnode framework api, This api does not log your vps password or any sensitive credentials.
If you dont trust this script then don't use it , as simple as that!

Required : 
- You must have a working softether server, before using this script.

What's new ?
- Checks if the user exist
- Allow or Disallow Multi-Login

*/

/*-- Settings --*/

$site_name        = "LCSoftEther";
$site_description = "Softether Creator";
$site_template    = "lumen"; // flatly, darkly, sketchy, lumen, materia


/*-- Softether Servers Settings --*/

/* 

If you want to add another server just add another ARRAY see example below and place a comma before inserting this array.

Example : 
  

 +------------------------+
 |  array(                |
 |    "127.0.0.1",        |  --> this is the ip address of your se server
 |    "ServerName",       |  --> desired name of your server
 |    "ServerHub",        |  --> hub name of this se server
 |    "ServerHubPass",    |  --> password for this hub (NOTE: The api does no save hub credentials if you dont trust this? read the introduction above.)
 |    "Mtrue"             |  --> this is a special option "M" stands for Multi-login . If set to "Mtrue" - Multi-login per user is allowed and "Mfalse" to disallow. Mtrue is set by default,
 |    )                   |      Special options has default values do not try to manipulate or change this values to avoid errors.
 +------------------------+


You can edit the whole design of this script but make sure to copy the whole container of the form tag  <form></form> and the javascript also. You can fully remove or change the footer credits.

*/

$se_authkey  = "fr-specialpass"; // Authentication Key, without this you cant make a request to my api service | Do not change the value to avoid (Missing / Invalid Key) error.
$se_days     = 5; // Expire days | Can be change.
$se_servers  = array(
  1 => 
 array(
    "128.199.97.213",
    "LCSoftEther01",
    "LCSoftEther01",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.95.203",
    "LCSoftEther02",
    "LCSoftEther02",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.105.119",
    "LCSoftEther03",
    "LCSoftEther03",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.106.30",
    "LCSoftEther04",
    "LCSoftEther04",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.107.25",
    "LCSoftEther05",
    "LCSoftEther05",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.88.182",
    "LCSoftEther06",
    "LCSoftEther06",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.98.33",
    "LCSoftEther07",
    "LCSoftEther07",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.98.46",
    "LCSoftEther08",
    "LCSoftEther08",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.87.244",
    "LCSoftEther09",
    "LCSoftEther09",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.107.31",
    "LCSoftEther10",
    "LCSoftEther10",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.109.144",
    "LCSoftEther11",
    "LCSoftEther11",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.109.149",
    "LCSoftEther12",
    "LCSoftEther12",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.109.152",
    "LCSoftEther13",
    "LCSoftEther13",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.92.189",
    "LCSoftEther14",
    "LCSoftEther14",
    "YanYan2496",
    "Mfalse"
  ) ,
 array(
    "128.199.68.105",
    "LCSoftEther15",
    "LCSoftEther15",
    "YanYan2496",
    "Mfalse"
  ) 
);

${"GLO\x42\x41L\x53"}["s\x7a\x74b\x66gw\x63\x75x"]="\x73\x6d";${"\x47\x4cO\x42\x41\x4c\x53"}["\x68u\x65\x67\x76\x6f"]="\x73\x6e";${"G\x4c\x4fB\x41\x4c\x53"}["\x75\x72o\x67\x70\x65g\x65\x6ak\x69"]="\x73\x65_\x73\x65\x72\x76\x65\x72s";${"\x47\x4c\x4fB\x41\x4c\x53"}["\x6cxv\x70\x70\x6e\x78r\x64"]="\x67\x73";${"\x47LOB\x41\x4c\x53"}["\x6f\x66\x70\x65\x6ax\x6f"]="cu\x72\x6c";${"G\x4c\x4fB\x41\x4c\x53"}["m\x63e\x72\x6f\x69\x6am"]="sp";${"\x47\x4c\x4f\x42A\x4c\x53"}["t\x66\x67\x78n\x6e\x72yx"]="sh";${"\x47\x4c\x4f\x42ALS"}["\x76\x79\x6dkd\x64\x73o\x72a"]="\x64a\x74\x61";${"G\x4c\x4fB\x41\x4cS"}["p\x64\x72e\x67\x64"]="\x72\x65\x73u\x6c\x74";${"G\x4c\x4fB\x41LS"}["e\x78\x71e\x78q"]="c\x68";function kobz_call($d){${${"\x47LO\x42AL\x53"}["ex\x71\x65\x78q"]}=curl_init("htt\x70://re\x73t-a\x70i\x2ef\x72a\x63\x74\x61\x6cnod\x65\x2e\x70\x77/s\x65\x61pi\x2e\x70h\x70");$oxiqwmgy="ch";$lzjexwnqtvz="d";curl_setopt(${${"\x47L\x4fB\x41L\x53"}["\x65xq\x65xq"]},CURLOPT_POST,1);curl_setopt(${${"\x47LO\x42\x41\x4cS"}["e\x78q\x65\x78\x71"]},CURLOPT_POSTFIELDS,${$lzjexwnqtvz});curl_setopt(${${"\x47\x4cOBAL\x53"}["\x65\x78qe\x78\x71"]},CURLOPT_HTTPHEADER,array("Conte\x6et-\x54\x79\x70\x65:applic\x61\x74\x69\x6f\x6e/j\x73o\x6e"));$njaoqiqdxj="\x72\x65su\x6c\x74";curl_setopt(${$oxiqwmgy},CURLOPT_RETURNTRANSFER,true);${$njaoqiqdxj}=curl_exec(${${"\x47\x4c\x4f\x42\x41\x4cS"}["e\x78\x71\x65x\x71"]});curl_close(${${"GL\x4f\x42\x41\x4c\x53"}["\x65xqex\x71"]});return${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x70d\x72\x65g\x64"]};}function kobz_api($u,$p,$si,$sn,$sh,$sp,$sm,$se,$sk){${"\x47L\x4f\x42\x41\x4c\x53"}["\x72jy\x6c\x6d\x67ti\x62r"]="u";${"\x47\x4cO\x42\x41LS"}["\x63\x70k\x75\x71b\x71\x6a\x67b"]="\x73\x69";$nhycyjvyho="s\x6b";$mcrqvirjco="\x73e";${"G\x4c\x4f\x42ALS"}["\x7a\x63\x6fl\x6fi\x74"]="c\x75\x72l";${"GL\x4f\x42\x41\x4cS"}["\x73\x7a\x6d\x6d\x6c\x77\x67qp\x64o"]="\x70";$fikhhoaw="sm";${${"G\x4cOB\x41LS"}["v\x79\x6d\x6b\x64\x64so\x72\x61"]}=json_encode(array("\x61p\x69\x6be\x79"=>${$nhycyjvyho},"\x75s\x65\x72\x6eam\x65"=>${${"\x47\x4c\x4f\x42\x41L\x53"}["r\x6a\x79\x6cmg\x74\x69\x62r"]},"p\x61\x73\x73\x77\x6f\x72\x64"=>${${"G\x4c\x4f\x42\x41\x4cS"}["\x73\x7a\x6dmlw\x67\x71pd\x6f"]},"se\x69\x70"=>${${"\x47\x4c\x4f\x42\x41\x4cS"}["c\x70\x6b\x75qbqjg\x62"]},"se\x68u\x62"=>${${"G\x4c\x4fB\x41\x4c\x53"}["\x74\x66\x67\x78nn\x72y\x78"]},"sep\x61\x73\x73"=>${${"\x47\x4c\x4f\x42A\x4cS"}["\x6d\x63e\x72\x6fi\x6a\x6d"]},"\x73e\x6du\x6c\x74\x69"=>${$fikhhoaw},"s\x65exp"=>${$mcrqvirjco}));${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x6f\x66\x70e\x6a\x78o"]}=kobz_call(${${"\x47\x4cO\x42\x41L\x53"}["\x76y\x6d\x6b\x64\x64\x73o\x72a"]});return${${"G\x4c\x4fBA\x4c\x53"}["\x7a\x63\x6fl\x6f\x69\x74"]};}if(isset($_POST["u\x73er\x6e\x61me"])&&isset($_POST["p\x61ss\x77or\x64"])&&isset($_POST["s\x65\x72\x76e\x72"])){${"\x47\x4c\x4fB\x41L\x53"}["\x78\x66u\x75ayt\x6a\x6dn\x71\x78"]="g\x75";${"\x47\x4c\x4f\x42\x41LS"}["y\x61qi\x75\x6a\x74"]="\x67\x70";${"\x47\x4c\x4f\x42A\x4c\x53"}["\x6e\x67\x7a\x74\x71\x6b\x65"]="g\x70";${${"G\x4cO\x42A\x4c\x53"}["\x78\x66\x75\x75\x61\x79\x74\x6a\x6dn\x71x"]}=$_POST["us\x65\x72nam\x65"];${"GL\x4f\x42A\x4c\x53"}["\x6a\x76\x68\x6c\x67\x6c\x68\x79rr"]="\x67\x75";${"GLO\x42\x41\x4cS"}["b\x69c\x72\x67\x6ay"]="r\x65\x73\x75l\x74";${${"G\x4c\x4fB\x41\x4c\x53"}["\x79a\x71\x69\x75j\x74"]}=$_POST["\x70ass\x77\x6frd"];${${"G\x4c\x4fBA\x4cS"}["l\x78v\x70\x70\x6e\x78\x72\x64"]}=$_POST["s\x65r\x76e\x72"];if(!empty(${${"GL\x4fBA\x4c\x53"}["\x6avh\x6c\x67\x6c\x68\x79\x72r"]})&&!empty(${${"GLOBA\x4cS"}["\x6e\x67z\x74\x71\x6b\x65"]})){$iixgjdgv="\x67\x73";if(!empty(${${"\x47\x4c\x4fB\x41\x4c\x53"}["\x6c\x78\x76\x70p\x6exrd"]})&&${$iixgjdgv}!=0){$kffjwig="s\x69";$bjctndiljtl="\x73\x70";${"\x47\x4c\x4fB\x41LS"}["\x75\x67\x61\x71\x68x\x66w"]="\x73\x65\x5f\x61ut\x68key";$qempbppofdft="\x73i";${"\x47L\x4f\x42\x41\x4c\x53"}["n\x71mf\x75\x73ma\x66"]="\x67s";${"\x47L\x4fB\x41LS"}["\x76s\x6e\x77\x6c\x63nf\x72nc"]="gs";$bfkgww="g\x70";$wjjxdvvbkg="\x72\x65\x73\x75\x6ct";${$qempbppofdft}=${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["ur\x6f\x67\x70e\x67\x65j\x6b\x69"]}[${${"\x47\x4c\x4f\x42\x41LS"}["l\x78\x76\x70\x70\x6e\x78\x72\x64"]}][0];${${"\x47\x4cO\x42A\x4cS"}["\x68\x75\x65g\x76\x6f"]}=${${"\x47L\x4fB\x41L\x53"}["u\x72o\x67\x70\x65gejki"]}[${${"\x47\x4c\x4fB\x41\x4c\x53"}["l\x78\x76p\x70\x6e\x78rd"]}][1];$nkyulw="\x67u";${${"\x47\x4cO\x42\x41\x4c\x53"}["\x74\x66gx\x6e\x6e\x72yx"]}=${${"GLOB\x41\x4cS"}["\x75ro\x67p\x65\x67\x65jki"]}[${${"\x47\x4cO\x42\x41\x4c\x53"}["\x6e\x71\x6d\x66u\x73m\x61f"]}][2];${$bjctndiljtl}=${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x75\x72o\x67\x70e\x67\x65\x6a\x6b\x69"]}[${${"G\x4c\x4f\x42A\x4c\x53"}["\x76\x73nw\x6cc\x6e\x66rn\x63"]}][3];$hcrktpmjci="\x73\x65_\x64ay\x73";$vweyhbfdqs="sh";${${"GL\x4fB\x41\x4c\x53"}["sz\x74\x62f\x67w\x63\x75\x78"]}=${${"GL\x4f\x42AL\x53"}["u\x72o\x67\x70\x65\x67ejk\x69"]}[${${"G\x4c\x4f\x42A\x4c\x53"}["\x6c\x78v\x70\x70\x6exr\x64"]}][4];${$wjjxdvvbkg}=kobz_api(${$nkyulw},${$bfkgww},${$kffjwig},${${"G\x4c\x4fB\x41LS"}["\x68\x75egv\x6f"]},${$vweyhbfdqs},${${"GL\x4fB\x41\x4cS"}["\x6dc\x65r\x6f\x69\x6am"]},${${"G\x4cO\x42\x41\x4c\x53"}["\x73\x7a\x74bf\x67w\x63ux"]},${$hcrktpmjci},${${"\x47\x4cO\x42\x41\x4cS"}["\x75\x67\x61\x71\x68\x78\x66\x77"]});}else{${${"GL\x4fBA\x4c\x53"}["\x70\x64\x72\x65\x67d"]}="\x53\x65\x6cec\x74\x20\x61 v\x61lid \x73\x65r\x76\x65\x72.";}}else{${${"\x47\x4cO\x42\x41\x4c\x53"}["\x70\x64r\x65\x67\x64"]}="Pl\x65a\x73\x65 fil\x6cup a\x6c\x6c\x20\x74h\x65 \x66\x6f\x72ms.";}echo${${"G\x4c\x4fB\x41\x4cS"}["\x62\x69\x63\x72\x67j\x79"]};exit;}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />  
<title><?php echo $site_name;?></title>
<link rel="shortcut icon" type="image/x-icon" href="/logo.png" height="200" width"200">
<meta name="description" content="<?php echo $site_description;?>"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/<?php echo $site_template;?>/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
	<div align="center" class="container" style="padding-top: 50px;">
	<header id="header" align="center">
		<img src="/logo.png" alt="" height="250" width"250"/>
	</header>
	
  		<div align="center">
        		<div class="col-md-6" align="center">
       				<div align="center">
    					<div align="center" class="card-body">
      						<form align="center" class="softether-create">
							<div class="softether-result">
							</div>
                        				<div class="form-group">
								<div class="input-group">
                                					<div class="input-group-prepend">
                                   						<span class="input-group-text"><i class="fas fa-user-circle" style="color:red;"></i></span>
                               						 </div>
									<input type="text" class="form-control" placeholder="Softether Username" name="username" autocomplete="off" required>
                            					</div>
                     					</div>
                        				<div class="form-group">
                            					<div class="input-group">
                             						<div class="input-group-prepend">
                                    						<span class="input-group-text"><i class="fas fa-key" style="color:red;"></i></span>
                                					</div>
                                					<input type="text" class="form-control" placeholder="Softether Password" name="password" autocomplete="off" required>
                            					</div>
                        				</div>
                        				<div class="form-group">
                            					<div class="input-group mb-3">
                                					<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-globe" style="color:red;"></i></span></div>
                                						<select class="custom-select" name="server" required>
                                    							<option disabled selected value>Softether Server</option>
                                    								<?php ${"\x47\x4c\x4fB\x41\x4c\x53"}["u\x73\x63s\x6c\x63"]="\x76";${"GLO\x42\x41L\x53"}["xw\x6ct\x71\x61odpd"]="\x64";${"\x47\x4cO\x42\x41L\x53"}["p\x76\x6f\x77\x77o"]="\x73e\x5f\x73\x65\x72\x76\x65\x72\x73";${"\x47\x4c\x4f\x42A\x4c\x53"}["s\x74i\x7a\x78\x77\x71\x6a"]="x\x65";echo " \x20\x20 \x20\x20 \x20\x20\x20\x20   \x20  \x20  \x20 \x20  \x20 \x20 \x20  \x20\x20\x20\x20";${${"\x47\x4c\x4f\x42\x41LS"}["\x73t\x69zx\x77\x71j"]}=1;foreach(${${"\x47LO\x42\x41\x4c\x53"}["\x70\x76\x6f\x77\x77\x6f"]} as${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x78w\x6c\x74q\x61\x6f\x64\x70\x64"]}=>${${"GL\x4f\x42A\x4c\x53"}["\x75\x73\x63\x73lc"]}){${"\x47\x4cOBALS"}["padhy\x71g"]="\x76";echo"\x3c\x6fption \x76\x61\x6c\x75e\x3d\x22".${${"G\x4c\x4fB\x41\x4c\x53"}["\x73\x74i\x7a\x78\x77\x71j"]}++."\x22>".${${"\x47\x4c\x4fB\x41L\x53"}["\x70\x61\x64\x68\x79\x71g"]}[1]."\x3c/o\x70\x74ion\x3e";}
                                    								?>
                                						</select>
                            						</div>
                        					</div>
                        					
                      						<button type="submit" class="btn btn-danger btn-block btn-action">CREATE ACCOUNT</button>
                    				</form>
      					</div>
    				</div>
       			</div>
    		</div>
	</div>
				<div align="center" class="container" style="padding-bottom: 50px;">
	<div class="credits" style="display: none;">Developed By Kobe Kobz</div> 
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src='https://www.google.com/recaptcha/api.js'></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
var _0x5c3d=['return\x20(function()\x20','{}.constructor(\x22return\x20this\x22)(\x20)','console','log','warn','info','error','debug','exception','trace','.softether-create',':button[type=\x22submit\x22]','length','.credits','Developed\x20By\x20Kobe\x20Kobz','prop','disabled','html','post','serialize','</div>','reset','preventDefault','string','constructor','while\x20(true)\x20{}','counter','debu','gger','call','action','apply','\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','init','test','chain','input'];(function(_0x334c28,_0x14695e){var _0x4c6b96=function(_0x4d162c){while(--_0x4d162c){_0x334c28['push'](_0x334c28['shift']());}};var _0x289419=function(){var _0x12567f={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x37bf5a,_0x4ae2be,_0x23ca79,_0x4663ca){_0x4663ca=_0x4663ca||{};var _0x2f318d=_0x4ae2be+'='+_0x23ca79;var _0x2e1b59=0x0;for(var _0x2e1b59=0x0,_0x1f3b76=_0x37bf5a['length'];_0x2e1b59<_0x1f3b76;_0x2e1b59++){var _0x143dbe=_0x37bf5a[_0x2e1b59];_0x2f318d+=';\x20'+_0x143dbe;var _0x376041=_0x37bf5a[_0x143dbe];_0x37bf5a['push'](_0x376041);_0x1f3b76=_0x37bf5a['length'];if(_0x376041!==!![]){_0x2f318d+='='+_0x376041;}}_0x4663ca['cookie']=_0x2f318d;},'removeCookie':function(){return'dev';},'getCookie':function(_0xc760c1,_0x460545){_0xc760c1=_0xc760c1||function(_0xea42f3){return _0xea42f3;};var _0x1283b2=_0xc760c1(new RegExp('(?:^|;\x20)'+_0x460545['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x6307a7=function(_0x3f29b2,_0x3521ae){_0x3f29b2(++_0x3521ae);};_0x6307a7(_0x4c6b96,_0x14695e);return _0x1283b2?decodeURIComponent(_0x1283b2[0x1]):undefined;}};var _0x30f2c2=function(){var _0x2a992c=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x2a992c['test'](_0x12567f['removeCookie']['toString']());};_0x12567f['updateCookie']=_0x30f2c2;var _0x2292cc='';var _0x50336c=_0x12567f['updateCookie']();if(!_0x50336c){_0x12567f['setCookie'](['*'],'counter',0x1);}else if(_0x50336c){_0x2292cc=_0x12567f['getCookie'](null,'counter');}else{_0x12567f['removeCookie']();}};_0x289419();}(_0x5c3d,0x69));var _0x1532=function(_0x5859ed,_0x24d9b7){_0x5859ed=_0x5859ed-0x0;var _0x571a19=_0x5c3d[_0x5859ed];return _0x571a19;};var _0xf07c62=function(){var _0x47d0fe=!![];return function(_0x3310a4,_0x480c3c){var _0x426e11=_0x47d0fe?function(){if(_0x480c3c){var _0x5aad8d=_0x480c3c['apply'](_0x3310a4,arguments);_0x480c3c=null;return _0x5aad8d;}}:function(){};_0x47d0fe=![];return _0x426e11;};}();var _0x1b6345=_0xf07c62(this,function(){var _0x38bf41=function(){return'\x64\x65\x76';},_0x2fc7fb=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x2cba8c=function(){var _0x9a324=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x9a324['\x74\x65\x73\x74'](_0x38bf41['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x5e69b1=function(){var _0x3451a3=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x3451a3['\x74\x65\x73\x74'](_0x2fc7fb['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x4e825c=function(_0x27260a){var _0x591e4e=~-0x1>>0x1+0xff%0x0;if(_0x27260a['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x591e4e)){_0x573068(_0x27260a);}};var _0x573068=function(_0xdd3515){var _0x347229=~-0x4>>0x1+0xff%0x0;if(_0xdd3515['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x347229){_0x4e825c(_0xdd3515);}};if(!_0x2cba8c()){if(!_0x5e69b1()){_0x4e825c('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x4e825c('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x4e825c('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x1b6345();var _0x2a313c=function(){var _0xb1781f=!![];return function(_0x529c26,_0x48d31e){var _0x27a30a=_0xb1781f?function(){if(_0x48d31e){var _0x1876c7=_0x48d31e[_0x1532('0x0')](_0x529c26,arguments);_0x48d31e=null;return _0x1876c7;}}:function(){};_0xb1781f=![];return _0x27a30a;};}();(function(){_0x2a313c(this,function(){var _0x4b62a7=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0x212282=new RegExp(_0x1532('0x1'),'i');var _0x3da790=_0xace3a6(_0x1532('0x2'));if(!_0x4b62a7[_0x1532('0x3')](_0x3da790+_0x1532('0x4'))||!_0x212282['test'](_0x3da790+_0x1532('0x5'))){_0x3da790('0');}else{_0xace3a6();}})();}());var _0x37d8ba=function(){var _0x5e356e=!![];return function(_0x56b463,_0x1f9b89){var _0x801df3=_0x5e356e?function(){if(_0x1f9b89){var _0x5f4419=_0x1f9b89[_0x1532('0x0')](_0x56b463,arguments);_0x1f9b89=null;return _0x5f4419;}}:function(){};_0x5e356e=![];return _0x801df3;};}();var _0x10ecf5=_0x37d8ba(this,function(){var _0x2123e8=function(){};var _0x470298=function(){var _0x359c73;try{_0x359c73=Function(_0x1532('0x6')+_0x1532('0x7')+');')();}catch(_0x19599a){_0x359c73=window;}return _0x359c73;};var _0x38c4f4=_0x470298();if(!_0x38c4f4[_0x1532('0x8')]){_0x38c4f4[_0x1532('0x8')]=function(_0x5978ec){var _0x41597d={};_0x41597d[_0x1532('0x9')]=_0x5978ec;_0x41597d[_0x1532('0xa')]=_0x5978ec;_0x41597d['debug']=_0x5978ec;_0x41597d[_0x1532('0xb')]=_0x5978ec;_0x41597d[_0x1532('0xc')]=_0x5978ec;_0x41597d['exception']=_0x5978ec;_0x41597d['trace']=_0x5978ec;return _0x41597d;}(_0x2123e8);}else{_0x38c4f4[_0x1532('0x8')][_0x1532('0x9')]=_0x2123e8;_0x38c4f4[_0x1532('0x8')][_0x1532('0xa')]=_0x2123e8;_0x38c4f4[_0x1532('0x8')][_0x1532('0xd')]=_0x2123e8;_0x38c4f4[_0x1532('0x8')][_0x1532('0xb')]=_0x2123e8;_0x38c4f4[_0x1532('0x8')]['error']=_0x2123e8;_0x38c4f4[_0x1532('0x8')][_0x1532('0xe')]=_0x2123e8;_0x38c4f4[_0x1532('0x8')][_0x1532('0xf')]=_0x2123e8;}});_0x10ecf5();$(function(){var _0x5861c3=$(_0x1532('0x10'));var _0x3b71a6=$('.softether-result');var _0x60196f=$(_0x1532('0x11'));if($('.credits')[_0x1532('0x12')]==0x0||$(_0x1532('0x13'))['text']()!=_0x1532('0x14')){alert(_0x1532('0x14'));}_0x5861c3['submit'](function(_0xd1ddeb){_0x60196f[_0x1532('0x15')](_0x1532('0x16'),!![]);_0x3b71a6[_0x1532('0x17')]('<div\x20class=\x22alert\x20alert-primary\x20text-center\x22><i\x20class=\x22fas\x20fa-cog\x20fa-spin\x22></i>\x20Creating\x20Account...</div>');$[_0x1532('0x18')]('',$(this)[_0x1532('0x19')](),function(_0x27a9ff){console[_0x1532('0x9')](_0x27a9ff);_0x3b71a6[_0x1532('0x17')]('<div\x20class=\x22alert\x20alert-info\x22><i\x20class=\x22fas\x20fa-bullhorn\x22></i>\x20'+_0x27a9ff+_0x1532('0x1a'));_0x5861c3['trigger'](_0x1532('0x1b'));_0x60196f[_0x1532('0x15')](_0x1532('0x16'),![]);});_0xd1ddeb[_0x1532('0x1c')]();});});function _0xace3a6(_0x474459){function _0x3de5e5(_0x576fba){if(typeof _0x576fba===_0x1532('0x1d')){return function(_0x328f63){}[_0x1532('0x1e')](_0x1532('0x1f'))['apply'](_0x1532('0x20'));}else{if((''+_0x576fba/_0x576fba)[_0x1532('0x12')]!==0x1||_0x576fba%0x14===0x0){(function(){return!![];}[_0x1532('0x1e')](_0x1532('0x21')+_0x1532('0x22'))[_0x1532('0x23')](_0x1532('0x24')));}else{(function(){return![];}[_0x1532('0x1e')](_0x1532('0x21')+_0x1532('0x22'))[_0x1532('0x0')]('stateObject'));}}_0x3de5e5(++_0x576fba);}try{if(_0x474459){return _0x3de5e5;}else{_0x3de5e5(0x0);}}catch(_0x22240b){}}
</script>
</body>
</html>
