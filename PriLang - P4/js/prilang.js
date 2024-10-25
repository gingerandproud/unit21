//Image swap at the top of the webpage from monkey to monkey with banana
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//login and signup functions 
function TheLogin(){
   var usernameClient = 'Student';
   var passwordClient = '1234';
   var usernameStaff = 'Staff'
   var passwordStaff = '5678';
   if (this.document.login.user.value == usernameClient && this.document.login.pass.value == passwordClient) {
    window.open(href= "../html/studenthome.html","_self");
    mywindow.close();
   }
   else if (this.document.login.user.value == usernameStaff && this.document.login.pass.value == passwordStaff) {
    window.open(href= "../html/teacherhome.html","_self");
    mywindow.close();
   } else {
    window.alert("Username or password incorrect");
   }
 }
function TheSignup(url){
  window.open(url,'_self');
}
function fgtpassword(){
  window.alert("Your Password is either 1234 OR 5678, now remember your username!")
}
function Return(url){
  window.open(url,"_self")
}
function signup(url){
  window.open(url,"_self")
}
function Return(url){
  window.open(url,"_self")
}
function Payment(url){
  window.open(url,"_self")
}
function learn(url){
  window.open(url,"_self")
}
function test(url){
  window.open(url,"_self")
}
function games(url){
  window.open(url,"_self")
}
function progress(url){
  window.open(url,"_self")
}
function logout(url){
  window.open(url,"_self")
}
function back(url){
  window.open(url,"_self")
}
function next(url){
  window.open(url,"_self")
}
function backtest(url){
  window.open(url,"_self")
}
function nexttest(url){
  window.open(url,"_self")
}
function settask(){
  window.alert("You have set a task.")
}