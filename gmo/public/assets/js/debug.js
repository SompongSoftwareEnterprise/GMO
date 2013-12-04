
$(function() {

void function(login) {
	
	login('Customer', 'user0001', 'passwordcustomer0001')
	login('Agency', 'user0002', 'passwordagency0002')
	login('GMO Staff', 'staff18473', 'passwordstaff18473')
	login('Lab Staff', 'lab72812', 'passwordlab72812')

}(function login(accountType, username, password) {

	autofill('Login as ' + accountType, '#login-form',
	{
		"username": username,
		"password": password,
		"#login-form .btn.btn-primary.btn-lg": true
	})

})

autofill('Registration Customer', '#register-form',
{
	"is_company": false,
	"first_name": "Sompong",
	"last_name": "Somchai",
	"input[type=radio][value='M']": true,
	"date_of_birth__date": '22',
	"date_of_birth__month": '4',
	"date_of_birth__year": '2525',
	"country": "Thailand",
	"address1": "123/45 Pizza Hut",
	"address2": "Ngamvongvan Road",
	"city": "Chatuchak",
	"province": "Bangkok",
	"zip": "11221",
	"email": "sompongsoftwarecustomer@mailinator.com",
	"phone": "also invalid phone",
	"fax": "02-345-6780",
	"mobile": "081-234-5678"
})

autofill('Registration Agency', '#register-form',
{
	"is_company": true,
	"first_name": "Colorful Plant Agencies, Inc.",
	"country": "Thailand",
	"address1": "123/46 Lolcode",
	"address2": "Vibhavadi Road",
	"city": "Chatuchak",
	"province": "Bangkok",
	"zip": "11223",
	"email": "sompongsoftwareagency@mailinator.com",
	"phone": "02-333-4444",
	"fax": "02-345-6780",
	"mobile": "081-234-5678"
})

autofill('Certificate Request 1', '#new-request-form',
{
	"input[name='purpose[]'][value='Export']": true,
	"input[name='purpose[]'][value='Research']": true,
	"input[name='purpose[]'][value='Other']": true,
	"other": "Education",
	"manufactory_name": "Bolshave Export Services",
	"manufactory_address1": "3/1, 3rd Street",
	"manufactory_address2": "Saints District",
	"manufactory_city": "Steelport",
	"manufactory_province": "Bangkok",
	"manufactory_country": "Thailand",
	"manufactory_zip": "11022",
	"manufactory_phone": "0843755557",
	"manufactory_fax": "0825681223",
	"warehouse_name": "Bolshave Export Services's Warehouse",
	"warehouse_address1": "The Saints Club, 3/2, 3rd Street",
	"warehouse_address2": "Saints District",
	"warehouse_city": "Steelport",
	"warehouse_province": "Bangkok",
	"warehouse_country": "Thailand",
	"warehouse_zip": "11022",
	"warehouse_phone": "0843755557",
	"warehouse_fax": "0825681223",
	"contact_name": "Assisistance Professor Pavel",
	"contact_phone": "024446585",
	"contact_email": "we_are_one@we.are.many",
	"receiver_name": "Research Lab Storage",
	"receiver_address1": "SCP Foundation, 701, SCP Foundation Building",
	"receiver_address2": "7th District, Kabul River",
	"receiver_city": "Jalalabad",
	"receiver_province": "Bangkok",
	"receiver_country": "Thailand",
	"receiver_zip": "10101",
	"origin_of_plant": "Thailand",
	"example_type_ex1": "Generic Tropical Tomato",
	"example_quantity_ex1": "10000",
	"example_detail_ex1": "Many reports have been emerged after de-classification of SCP-504 with",
})

autofill('Certificate Request Example2', '#new-request-form',
{
    "example_type_ex2": "Generic Tropical Tomato",
    "example_quantity_ex2": "10000",
    "example_detail_ex2": "Many reports have been increasing velocity and lower joke tolerant",
})


$('#sompong-debugger-menu button').click(function() {
	$('#sompong-debugger').fadeToggle('fast')
})

function autofill(name, selector, data) {
	var form = document.querySelector(selector)
	if (form) {
		var button = $('<button class="btn btn-info btn-block"></button>')
			.html('&nbsp; Fill <b>' + name + '</b> &nbsp;')
			.appendTo('#sompong-debug-buttons')
		button.click(function(e) {

			var fast = e.shiftKey

			$('#sompong-debugger').fadeToggle('fast')
			var inputs = []

			;(function() {
				for (var i in data) {
					var c = form[i]
					if (!c) c = document.querySelector(i)
					if (c) inputs.push(c)
				}
				
			})()

			inputs.sort(function(a, b) {
				var dy = $(a).offset().top - $(b).offset().top
				var dx = $(a).offset().left - $(b).offset().left
				if (dy !== 0) return dy
				return dx
			})

			var startY = window.scrollY
			var finalY = $(inputs[inputs.length - 1]).offset().top - window.innerHeight + inputs[inputs.length - 1].offsetHeight + 96
			if (finalY < startY) finalY = startY

			// gen animation
			var frames = []
			inputs.forEach(function(input) {
				var value = data[input.name]
				frames.push(function() { input.focus(); })
				if (input.nodeName.toLowerCase() == 'button' ||
					input.type == 'button' ||
					input.type == 'submit') {
					frames.push(function() {
						input.click()
					})
				} else if (input.type == 'checkbox' || input.type == 'radio') {
					frames.push(function() {
						if (input.checked != value) input.click()
					})
				} else {
					for (var i = 1; i <= value.length; i ++) {
						;(function(i) {
							frames.push(function() { input.value = value.substr(0, i); })
						})(i)
					}
				}
			})

			var scrolling = []

			;(function() {
				var lastY = startY
				for (var i = 1; i <= frames.length; i ++) {
					var pos = i / frames.length
					if (pos < 0.5) {
						pos = Math.pow(pos / 0.5, 3) * 0.5
					} else {
						pos = 1 - Math.pow((1 - pos) / 0.5, 3) * 0.5
					}
					var y = Math.round(startY * (1 - pos) + finalY * (pos))
					scrolling.push(y - lastY)
					lastY = y
				}
			})()

			// run animation
			animate(0)

			function animate(i) {
				if (i < frames.length) {
					frames[i]()
					window.scrollBy(0, scrolling[i])
					if (fast) {
						animate(i + 1)
					} else {
						setTimeout(function() {
							animate(i + 1)
						}, 1000 / 60)
					}
				}
			}

		})
	}
}
	
})


