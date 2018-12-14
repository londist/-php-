var path = new RegExp('^/' + location.pathname.split('/')[1])
$('.sidebar-link').each(function () {
  var el = $(this)
  if (path.test(el.attr('href'))) {
    el.parent().addClass('active')
  }
})
