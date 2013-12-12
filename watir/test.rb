
require 'pry'
require 'watir-webdriver'
require "test/unit"

class Watir::Browser
	include Test::Unit::Assertions
end

def autofill(name)
	execute_script "window.autofill['#{name}']()"
end

def id(id)
	element(id: id)
end

def selector(selector)
	element(css: selector)
end

def step(name)
	puts ">> #{name}"
	yield
	wait
end

def check_mail(mailbox)
	goto "http://mailinator.com/inbox.jsp?to=#{mailbox}"
	selector(".message").when_present.click
	text = selector(".mailview").when_present.text
	agency_id = nil
	if text =~ /Username: (\w+)/
		username = $1
	end
	if text =~ /Password: (\w+)/
		password = $1
	end
	if text =~ /Agency ID: (\w+)/
		agency_id = $1
	end
	[username, password, agency_id]
end

def login(type, username, password)
	step "Login as #{type}" do
		goto "http://192.168.56.101/"
		text_field(id: "username").set(username)
		text_field(id: "password").set(password)
		form(id: "login-form").submit
	end
end

def login_as(type)
	step "Login as #{type}" do
		goto "http://192.168.56.101/"
		autofill "Login as #{type}"
		wait
	end
end

Watir::Browser.new(:chrome).instance_eval do

if true

	login_as "GMO Staff"

	step "Click register button" do
		id("register-button").click
	end

	step "Register as customer" do
		id("register-customer").click
		wait
		autofill("Registration Customer")
		form(id: "register-form").submit
	end

	step "Fix phone number" do
		text_field(id: "phone").set("081-234-5671")
		form(id: "register-form").submit
	end

	step "Click finish button" do
		selector(".message-primary-action").click
	end

	step "Register as agency" do
		id("register-agency").click
		wait
		autofill("Registration Agency")
		form(id: "register-form").submit
	end
	
	customer_username = nil
	customer_password = nil
	agency_username = nil
	agency_password = nil
	agency_id = nil

	step "Check email for customer username and password" do
		customer_username, customer_password = check_mail("sompongsoftwarecustomer")
	end

	step "Check email for agency username and password" do
		agency_username, agency_password, agency_id = check_mail("sompongsoftwareagency")
	end

	puts " ==> Customer U/P: #{customer_username} #{customer_password}"
	puts " ==> Agency   U/P: #{agency_username} #{agency_password}"
	puts " ==> Agency   ID:  #{agency_id}"

else

	customer_username, customer_password = %w(user00013 fXm32sgl)
	agency_username, agency_password, agency_id = %w(user00014 es6d8akL 14)

end

	login("Customer", customer_username, customer_password)

	step "Go to account page" do
		id("account-link").click
	end

	step "Click agency link, and click add agency" do
		id("agency-tab-button").click
		id("add-agency-button").when_present.click
	end

	step "Enter Agency ID" do
		text_field(name: "agency_id").set(agency_id)
		id("searchButton").click
	end

	step "Click add agency" do
		id("add-agency-confirm-button").click
		assert id("agency").text.include?("Colorful Plant Agencies, Inc.")
	end

	login("Agency", agency_username, agency_password)

	step "Make 1-1/1 Request" do
		id("make-111").click
		autofill "Certificate Request 1-1/1"
		form(id: "new-request-form").submit
	end

	binding.pry
	close

end
