

$(document).on('click', '[data-set-input]', function(e) {
	var target = $(e.target)
	var link = target.closest('[data-set-input]')
	var param = link.data('set-input').split('=')
	var name = param[0]
	var value = param[1]
	var form = target.closest('form')
	form.find('[name=' + name + ']').val(value).trigger('change')
})

$(function() {
	
	function updateSearchBy() {
		var $this = $(this)
		var value = $this.val()
		var text = 'Search by ...'
		$('#entrepreneur_requests_search_form [data-set-input="search_by=' + value + '"]').each(function() {
			text = $(this).text()
		})
		$('#entrepreneur_requests_search_by_text').text(text)
		$('#entrepreneur_requests_search_button').each(function() {
			this.disabled = value == ''
		})
	}
	
	$('#entrepreneur_requests_search_by').on('change', updateSearchBy).trigger('change')
	
})
