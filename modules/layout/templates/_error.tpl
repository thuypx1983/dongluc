{literal}
<html>

<link rel="icon" href="http://antisecurityteam.com/favicon.ico" type="image/x-icon">

<HEAD>
<script language="JavaScript">
var brzinakucanja = 200;
var pauzapor = 2000;
var vremeid = null;
var kretanje = false;
var poruka = new Array();
var slporuka = 0;
var bezporuke = 0;
poruka[0] = "~~BODA DOS~~"

function prikaz() {
var text = poruka[slporuka];

if (bezporuke < text.length) {
if (text.charAt(bezporuke) == " ")
bezporuke++
var ttporuka = text.substring(0, bezporuke + 1);
document.title = ttporuka;
bezporuke++
vremeid = setTimeout("prikaz()", brzinakucanja);
kretanje = true;
} else {
bezporuke = 0;
slporuka++
if (slporuka == poruka.length)
slporuka = 0;
vremeid = setTimeout("prikaz()", pauzapor);
kretanje = true;
}
}
function stop() {
if (kretanje)
clearTimeout(vremeid);
kretanje = false
}
function start() {
stop();
prikaz();
}
start();
</script>

<title>HACKED BY BODA DOS</title>





<center>

<center>
<img style="width:595px;height:231px" src="http://www.gifanimados.com/Gifs-Terror/Animaciones-Ojos-Terrorificos/Ojos-Amarillos-Oscuridad-83423.gif" />
<br /><br>


<div id="example1">
<p align="center"></p>

</div>
<script language="JavaScript">
/*
An object-oriented Typing Text script, to allow for multiple instances.
A script that causes any text inside any text element to be "typed out", one letter at a time. Note that any HTML tags will not be included in the typed output, to prevent them from causing problems. Tested in Firefox v1.5.0.1, Opera v8.52, Konqueror v3.5.1, and IE v6.
Browsers that do not support this script will simply see the text fully displayed from the start, including any HTML tags.

Functions defined:
TypingText(element, [interval = 100,] [cursor = "",] [finishedCallback = function(){return}]):
Create a new TypingText object around the given element. Optionally
specify a delay between characters of interval milliseconds.
cursor allows users to specify some HTML to be appended to the end of
the string whilst typing. Optionally, can also be a function which
accepts the current text as an argument. This allows the user to
create a "dynamic cursor" which changes depending on the latest character
or the current length of the string.
finishedCallback allows advanced scripters to supply a function
to be executed on finishing. The function must accept no arguments.

TypingText.run():
Run the effect.

static TypingText.runAll():
Run all TypingText-enabled objects on the page.
*/

TypingText = function(element, interval, cursor, finishedCallback) {
if((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
this.running = true; // Never run.
return;
}
this.element = element;
this.finishedCallback = (finishedCallback ? finishedCallback : function() { return; });
this.interval = (typeof interval == "undefined" ? 20 : interval);
this.origText = this.element.innerHTML;
this.unparsedOrigText = this.origText;
this.cursor = (cursor ? cursor : "");
this.currentText = "";
this.currentChar = 0;
this.element.typingText = this;
if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
TypingText.all.push(this);
this.running = false;
this.inTag = false;
this.tagBuffer = "";
this.inHTMLEntity = false;
this.HTMLEntityBuffer = "";
}
TypingText.all = new Array();
TypingText.currentIndex = 0;
TypingText.runAll = function() {
for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
}
TypingText.prototype.run = function() {
if(this.running) return;
if(typeof this.origText == "undefined") {
setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval); // We haven't finished loading yet. Have patience.
return;
}
if(this.currentText == "") this.element.innerHTML = "";
// this.origText = this.origText.replace(/<([^<])*>/, ""); // Strip HTML from text.
if(this.currentChar < this.origText.length) {
if(this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
this.tagBuffer = "<";
this.inTag = true;
this.currentChar++;
this.run();
return;
} else if(this.origText.charAt(this.currentChar) == ">" && this.inTag) {
this.tagBuffer += ">";
this.inTag = false;
this.currentText += this.tagBuffer;
this.currentChar++;
this.run();
return;
} else if(this.inTag) {
this.tagBuffer += this.origText.charAt(this.currentChar);
this.currentChar++;
this.run();
return;
} else if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
this.HTMLEntityBuffer = "&";
this.inHTMLEntity = true;
this.currentChar++;
this.run();
return;
} else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
this.HTMLEntityBuffer += ";";
this.inHTMLEntity = false;
this.currentText += this.HTMLEntityBuffer;
this.currentChar++;
this.run();
return;
} else if(this.inHTMLEntity) {
this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
this.currentChar++;
this.run();
return;
} else {
this.currentText += this.origText.charAt(this.currentChar);
}
this.element.innerHTML = this.currentText;
this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
this.currentChar++;
setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
} else {
this.currentText = "";
this.currentChar = 0;
this.running = false;
this.finishedCallback();
}
}

</script>



<center>
<h1><div class="style2"><script type="text/javascript">farbbibliothek=new Array();farbbibliothek[0]=new Array("#FF0000","#FF1100","#FF2200","#FF3300","#FF4400","#FF5500","#FF6600","#FF7700","#FF8800","#FF9900","#FFaa00","#FFbb00","#FFcc00","#FFdd00","#FFee00","#FFff00","#FFee00","#FFdd00","#FFcc00","#FFbb00","#FFaa00","#FF9900","#FF8800","#FF7700","#FF6600","#FF5500","#FF4400","#FF3300","#FF2200","#FF1100");farbbibliothek[1]=new Array("#00FF00","#000000","#00FF00","#00FF00");farbbibliothek[2]=new Array("#00FF00","#FF0000","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00");farbbibliothek[3]=new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");farbbibliothek[4]=new Array("#FF0000","#EE0000","#DD0000","#CC0000","#BB0000","#AA0000","#990000","#880000","#770000","#660000","#550000","#440000","#330000","#220000","#110000","#000000","#110000","#220000","#330000","#440000","#550000","#660000","#770000","#880000","#990000","#AA0000","#BB0000","#CC0000","#DD0000","#EE0000");farbbibliothek[5]=new Array("#000000","#000000","#000000","#FFFFFF","#FFFFFF","#FFFFFF");farbbibliothek[6]=new Array("#0000FF","#FFFF00");farben=farbbibliothek[4];function farbschrift(){for(var c=0;c<Buchstabe.length;c++){document.getElementById("a"+c).style.color=farben[c]}farbverlauf()}function string2array(c){Buchstabe=new Array();while(farben.length<c.length){farben=farben.concat(farben)}k=0;while(k<=c.length){Buchstabe[k]=c.charAt(k);k++}}function divserzeugen(){for(var c=0;c<Buchstabe.length;c++){document.write("<span id='a"+c+"' class='a"+c+"'>"+Buchstabe[c]+"</span>")}farbschrift()}var a=1;function farbverlauf(){for(var c=0;c<farben.length;c++){farben[c-1]=farben[c]}farben[farben.length-1]=farben[-1];setTimeout("farbschrift()",30)}var farbsatz=1;function farbtauscher(){farben=farbbibliothek[farbsatz];while(farben.length<text.length){farben=farben.concat(farben)}farbsatz=Math.floor(Math.random()*(farbbibliothek.length-0.0001))}setInterval("farbtauscher()",5000);text="HACKED BY BODA DOS & EGYPT HACKERS";string2array(text);divserzeugen();</script></div></h1>

<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<BODY text=#ffffff bgColor=#000000 width="500"
height="2000">
</center>


<div class="style2">
<div id="example1"></div>
<p id="example2">
<b><i><font color="white">=============================================================<br>
</font></i><font color="white"><i><br>| :::: ||| HACKED BY BODA DOS?? EGYPT 
HACKERS||| :::: | <sup><br></sup><br><il>=============================================================</i></div>


<div align="center" class="shdw"><font size="4">[~]:</font><span lang="ar-sa"><font size="4">======</font></span><font size="4"><span lang="ar-sa">(<font color="#FFFF00" face="DecoType Naskh">&#1587;&#1610;&#1581;&#1604;&#1602; 
&#1575;&#1604;&#1589;&#1602;&#1585; &#1575;&#1604;&#1605;&#1589;&#1585;&#1610; &#1601;&#1610; &#1605;&#1608;&#1575;&#1602;&#1593;&#1603;&#1605;</font>)</span>======:[~]</font></h1></div>



</body>
</html>&nbsp;</div></span></script><iframe width="0%" height="0" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/20990786&amp;color=ff6600&amp;auto_play=true&amp;show_artwork=false" target="_blank"></iframe>
</body>
</HTML>
{/literal}