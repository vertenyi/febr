
function doFrameOn(){rtField.document.designMode = 'On';}
function doBold(){rtField.document.execCommand('bold',false,null); }
function doUnderline(){	rtField.document.execCommand('underline',false,null);}
function doItalic(){rtField.document.execCommand('italic',false,null); }
function doHr(){rtField.document.execCommand('inserthorizontalrule',false,null);}
function doOl(){rtField.document.execCommand("InsertOrderedList", false,"newOL");}
function doUl(){rtField.document.execCommand("InsertUnorderedList", false,"newUL");}
function doUnLink(){rtField.document.execCommand("Unlink", false, null);}
function doLink(){
	var linkURL = prompt("Enter link URL:", "http://"); 
	var selection = document.getSelection();
	rtField.document.execCommand("CreateLink", false, linkURL);
	//selection.anchorNode.parentElement.target = '_blank';
}
function doSize(){	
	var size = prompt('Enter a size 1 - 7', '');
	rtField.document.execCommand('FontSize',false,size);
}
function doColor(){
	var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
	rtField.document.execCommand('ForeColor',false,color);
}
function doImage(){
	var imgSrc = prompt('Enter image location', '');
    if(imgSrc != null){ rtField.document.execCommand('insertimage', false, imgSrc); }
}
function submitform(){
	var theForm = document.getElementById("rtForm");
	theForm.elements["rtArea"].value = window.frames['rtField'].document.body.innerHTML;
	theForm.submit();
}
 