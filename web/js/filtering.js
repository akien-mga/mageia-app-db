$(document).ready(function(){

  $('#application').selectToCheckboxes({
    apply: function(d){afterCheckboxChange(d)},
    defaults: getAllVals($('#application option[selected=selected]')),
  });
  $('#group').selectToCheckboxes({
    apply: function(d){afterCheckboxChange(d)},
    defaults: getAllVals($('#group option[selected=selected]')),
  });
  $('#distrelease').selectToCheckboxes({
    apply: function(d){afterCheckboxChange(d)},
    defaults: getAllVals($('#distrelease option[selected=selected]')),
  });
  $('#arch').selectToCheckboxes({
	    apply: function(d){afterCheckboxChange(d)},
	    defaults: getAllVals($('#arch option[selected=selected]')),
	  });
  $('#media').selectToCheckboxes({
	    apply: function(d){afterCheckboxChange(d)},
	    defaults: getAllVals($('#media option[selected=selected]')),
	  });
  $('form input[type=submit]').remove();
});


function getAllVals(options)
{
  var vals = [];
  $.each(options, function(key, value) {
    vals[key] = $(value).val();
  });
  return vals;
}

function afterCheckboxChange(changed)
{
  filtering = getFiltering();
  updateResults(filtering);
}

function getFiltering()
{
  var filtering = new Object;
  filtering['distrelease'] = getValuesFromCheckboxes($('input[type=checkbox][name=distrelease]:checked'));
  filtering['application'] = getValuesFromCheckboxes($('input[type=checkbox][name=application]:checked'));
  filtering['group'] = getValuesFromCheckboxes($('input[type=checkbox][name=group]:checked'));
  filtering['arch'] = getValuesFromCheckboxes($('input[type=checkbox][name=arch]:checked'));
  filtering['media'] = getValuesFromCheckboxes($('input[type=checkbox][name=media]:checked'));
  return filtering;
}

function getValuesFromCheckboxes(checkboxes)
{
 var vals = [];
 $.each(checkboxes, function(key, value) {
    vals[key] = $(value).attr('value');
  });
  return vals;
}

function filteringToLink(filtering)
{
  var link = '';
  $.each(filtering, function (key, value){
    if (value.length) {
      link += '/' + key + '/' + encodeURIComponent(value.join(','));
    }
  });
  var baseUri = window.location.href.substr(0, (window.location.href.lastIndexOf('.php') + 4));
  var route = window.location.href.match('^.*\.php/(.*)/(.*)[/]*(.*)$');
  if (null == route)
  {
    return baseUri;
  }
  return baseUri + '/' + route[1] + '/' + route[2] + link;
}

function updateResults(filtering)
{
  window.location = filteringToLink(filtering);
}

