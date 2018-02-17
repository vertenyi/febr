<?php
class RTF {
	public static function rtfEditor(){
		echo 'Oh, my';
	}
}
?>
<script type="text/javascript"  src="js/rtf.js"></script>
<div id="rtControlPanel">
  <span class="btn" onClick="doBold()" title="bold">
	<b>b</b>
  </span> 
  <span class="btn" onClick="doUnderline()" title="underline">
	<u>u</u>
  </span>
  <span class="btn" onClick="doItalic()" title="italic">
	<i style="visibility: hidden;">i</i><i style="text-transform: lowercase;">i</i>
  </span>
  <span class="btn" onClick="doSize()" title="font-size">
	Text Size
  </span>
  <span class="btn" onClick="doColor()" title="font-color">
	Color
  </span>
  <span class="btn" onClick="doHr()" title="horizontal rule">
	-
  </span>
  <span class="btn" onClick="doUl()" title="unordered list">
	ul
  </span>
  <span class="btn" onClick="doOl()" title="ordered list">
	ol
  </span>
  <span class="btn" onClick="doLink()" title="link">
	href:
  </span>
  <span class="btn" onClick="doUnLink()" title="disable link">
	unlink
  </span>
  <span class="btn" onClick="doImage()" title="image">
	image
  </span>
</div>



<textarea name="rtArea" id="rtArea" cols="100" rows="14"></textarea>
<iframe name="rtField" id="rtField" class="article"></iframe>
<script>
var doc = document.getElementById('rtField').contentWindow.document;
doc.open();
doc.write('<?=$text?>');
doc.close();
</script>
