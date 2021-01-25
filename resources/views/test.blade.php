<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 2 <html xmlns="http://www.w3.org/1999/xhtml">
 3 <head>
 4 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 5 <title>团购——限时抢</title>
 6 <link rel="stylesheet" href="style.css"  />
 7 </head>
 8 
 9 <body>
1请等待<span id="dd">15</span>秒
<script type="text/javascript">
function run(){
var s = document.getElementByIdx_x("dd");
if(s.innerHTML == 0){
   window.location.href='regform.shtml';
   return false;
}
s.innerHTML = s.innerHTML * 1 - 1;
}
window.setInterval("run();", 1000);
</script>
34 </body>
35 </html>