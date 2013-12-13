
require 'pry'
require 'watir-webdriver'
require "test/unit"
require 'shellwords'

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

module Messagr
	def self.message(name)
		puts ">> #{name}"
		# system "pushnot watir #{Shellwords.shellescape name}"
	end
end

def step(name)
	Messagr.message name
	yield
	wait
end

Messagr.message "Get ready..."

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
	Messagr.message "Mail\nUsername: #{username}\nPassword: #{password}\nID: #{agency_id}"
	# sleep 3
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

if false
	sleep 10
	Messagr.message "GMO - Certificate Request System Test"
	sleep 5
end

if true

if true

	login_as "GMO Staff"

	step "Click register button" do
		id("register-button").click
	end

	step "Register as customer" do
		id("register-customer").click
		wait
		autofill("Registration Customer")
		text_field(name: "last_name").set("Somchai Test#{rand}")
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

	customer_username, customer_password = %w(user00008 qw8B9ilu)
	agency_username, agency_password, agency_id = %w(user00009 1qPeers4 9)

end

if true

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
		select_list(name: "owner_id").when_present.select(/Sompong Somchai/)
		form(id: "new-request-form").submit
	end

	step "Make sure status is Pending" do
		assert selector("td.text-warning").text =~ /Pending/
	end

	login_as "GMO Staff"

	step "Click link and create invoice" do
		tr(text: /New Request/i).a.click
		element(text: /Create Invoice/, class: 'btn').click
		element(text: /Back/, class: 'btn').click
		assert text =~ /Awaiting payment/i
	end

	step "Create receipt" do
		element(text: /Create Receipt/, class: 'btn').click
		back
	end

	step "Create lab task" do
		element(text: /Create Lab Task/, class: 'btn').click
		autofill "Lab Task Information"
		form(id: "create-lab-task-form").submit
		element(text: /Back/, class: 'btn').click
		tr(text: /Lab in Progress/i).exist?
	end

	login_as "Lab Staff"

	step "Check request" do
		assert trs.find { |c| c.text =~ /Generic/ }.text =~ /Pending/
		trs.find { |c| c.text =~ /Generic/ }.a.click
	end

	step "Upload forms" do
		element(class: 'btn', text: /Start Analyzing/).click
		file_field(name: 'file1').set(File.realpath('watir/file1.pdf'))
		execute_script "window.scrollBy(0,1000)"
		form(id: 'file1').submit
		file_field(name: 'file2').set(File.realpath('watir/file2.pdf'))
		execute_script "window.scrollBy(0,1000)"
		form(id: 'file2').submit
		file_field(name: 'file3').set(File.realpath('watir/file3.pdf'))
		execute_script "window.scrollBy(0,1000)"
		form(id: 'file3').submit
		file_field(name: 'file4').set(File.realpath('watir/file4.pdf'))
		execute_script "window.scrollBy(0,1000)"
		form(id: 'file4').submit
	end

	login_as "Lab Head"

	step "Go to lab" do
		a(text: /Waiting for Approval/i).click
		tr(text: /Waiting For Approval/i).when_present.a.click
	end

	step "Click pass button" do
		element(class: 'btn', text: 'Pass').click
	end

end

	login_as "GMO Staff"

	step "Check the request status - must be pending" do
		assert tr(text: /Pending/).exist?
	end

	login "Customer", customer_username, customer_password

	step "Status must be 'document needed'" do
		assert tr(text: /Document Needed/i)
	end

	step "Complete the document" do
		tr(text: /Document Needed/).a.click
		a(text: /Complete this/i).click
		autofill "Certificate Request 1-1/2"
		form(id: "new-request-form").submit
	end

	login_as "GMO Staff"
	step "Check the request status - must be lab PASS" do
		assert tr(text: /Lab PASS/i).exist?
	end

	step "Create a certificate!" do
		tr(text: /Lab PASS/i).a.click
		element(class: 'btn', text: /Create cer/i).click
		autofill "Certificate Info"
		element(class: 'btn', text: /Create cer/i).click
	end

	step "View the certificate!" do
		tr(text: /Complete/i).a.click
		element(class: 'btn', text: /View Cert/i).click
	end

	binding.pry
	close

end
