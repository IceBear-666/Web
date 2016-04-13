window._mstAppId = 'TixPHw-eUIOTN3jPY1yocT4RVa6dUYhYro0f8PulSFLQ1xlHyLw8JhxVpndDXRQ-W';
window._mstToLang = 'zh-chs';
var sDetectedLanguage = 'en';
var sToLang = 'zh-chs';
if(window.location.host.indexOf("hipp.de") != -1 || window.location.host.indexOf("amazon.de") != -1){
	sDetectedLanguage = 'de';
}else if(window.location.host.indexOf("co.jp") != -1){
	sDetectedLanguage = 'jp';
}

(function (sDetectedLanguage)
{
	sDetectedLanguage = sDetectedLanguage || 'en';

	var eWidgetDiv = document.getElementById('MicrosoftTranslatorWidget');
	if (!eWidgetDiv)
	{
		var eWidgetDiv = document.createElement('div');
		eWidgetDiv.id = 'MicrosoftTranslatorWidget';
		eWidgetDiv.style.display = 'none';
		document.body.insertBefore(eWidgetDiv, document.body.firstChild);
	}

	var eWidgetScript = document.createElement('script');
	eWidgetScript.type = 'text/javascript';
	eWidgetScript.src = 'http://www.microsofttranslator.com/ajax/v2/widget.aspx?from=_' + sDetectedLanguage + '&toolbar=thin';
	document.body.insertBefore(eWidgetScript, document.body.firstChild);

	var nLoadTries = 0;
	var oLoadLoop = setInterval(function ()
	{
		++nLoadTries
		if (window.Microsoft && window.Microsoft.Translator)
		{
			clearInterval(oLoadLoop);
			Microsoft.Translator.translate(document.body, sDetectedLanguage, sDetectedLanguage == sToLang ? (sToLang == 'en' ? 'es' : 'en') : sToLang);
		}
		else if (nLoadTries > 10)
		{
			clearInterval(oLoadLoop);
		}
	}, 1000);
})();
