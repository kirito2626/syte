function toggleTxt(elem, anotherTxt) {
	var txt = elem.text();

	elem.click(function(){
		if( $(this).text() == txt ) {
			$(this).text(anotherTxt);
		} else {
			$(this).text(txt);
		}
	});
};
toggleTxt($("#light"), "Свет отключён");

function Data_phone() {
	if (document.body.style.background == 'rgba(0, 0, 0, 0.8)') document.body.style.background = 'url(../img/bg.png)';
	else document.body.style.background = 'rgba(0, 0, 0, 0.8)';
	return false;
}