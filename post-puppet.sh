#!/bin/bash


cd /home/vagrant

echo '#==> Disabling default Apache site, and reload'
sudo a2dissite default && sudo service apache2 reload


if grep -q bashrc ~/.bash_profile; then
	echo '#==> .bashrc already added to .bash_profile. OK!!'
else
	echo '#==> Adding .bashrc to .bash_profile.'
	echo '' >> ~/.bash_profile
	echo '. ~/.bashrc' >> ~/.bash_profile
fi


if grep -q INCLUDE_VAGRANT_CONFIG_V1 ~/.bashrc; then
	echo '#==> /vagrant/bashrc already added. OK!!'
else
	echo '#==> Adding /vagrant/bashrc to ~/.bashrc'
	echo '' >> ~/.bashrc
	echo '# INCLUDE_VAGRANT_CONFIG_V1' >> ~/.bashrc
	echo '. /vagrant/bashrc' >> ~/.bashrc
fi


PHANTOMJS_FILE='phantomjs-1.9.2-linux-x86_64.tar.bz2'
PHANTOMJS_URL='https://phantomjs.googlecode.com/files/phantomjs-1.9.2-linux-x86_64.tar.bz2'
PHANTOMJS_DIR='phantomjs-1.9.2-linux-x86_64'

if [ ! -f "$PHANTOMJS_FILE" ]; then
	echo '#==> Downloading PhantomJS'
	wget "$PHANTOMJS_URL"
else
	echo '#==> PhantomJS already loaded'
fi

if [ \( ! -d "$PHANTOMJS_DIR" \) -a -f "$PHANTOMJS_FILE" ]; then
	echo '#==> Extracting PhantomJS'
	tar xjf "$PHANTOMJS_FILE"
else
	echo '#==> PhantomJS already extracted'
fi


CASPERJS_URL='https://github.com/n1k0/casperjs/tarball/1.1-beta1'
CASPERJS_FILE='casperjs-1.1-beta1.tar.gz'
CASPERJS_DIR='n1k0-casperjs-cd1fab5'

if [ ! -f "$CASPERJS_FILE" ]; then
	echo '#==> Downloading CasperJS'
	wget "$CASPERJS_URL" -O"$CASPERJS_FILE"
else
	echo '#==> CasperJS already loaded'
fi

if [ \( ! -d "$CASPERJS_DIR" \) -a -f "$CASPERJS_FILE" ]; then
	echo '#==> Extracting CasperJS'
	tar xzf "$CASPERJS_FILE"
else
	echo '#==> CasperJS already extracted'
fi






