Vagrant.configure("2") do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  config.vm.network :private_network, ip: "192.168.56.101"
    config.ssh.forward_agent = true

  config.vm.provider :virtualbox do |v|
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--memory", 1024]
    v.customize ["modifyvm", :id, "--name", "my-first-box"]
  end

  config.vm.network "forwarded_port", guest: 80, host: 32080
  config.vm.network "forwarded_port", guest: 3306, host: 32306
  config.vm.network "forwarded_port", guest: 22, host: 32022
  
  config.vm.synced_folder "./", "/var/www", id: "vagrant-root", :mount_options => ["dmode=777","fmode=666"]

  config.vm.provision :shell, :inline =>
    "sudo sed -i 's/us.archive.ubuntu.com/mirror1.ku.ac.th/g' /etc/apt/sources.list"

  config.vm.provision :shell, :inline =>
    "if [[ ! -f /apt-get-run ]]; then sudo apt-get update && sudo touch /apt-get-run; fi"

  config.vm.provision :shell, :inline => 'echo -e "mysql_root_password=gmodb
controluser_password=awesome" > /etc/phpmyadmin.facts;'

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "manifests"
    puppet.module_path = "modules"
    puppet.options = ['--verbose']
  end

  config.vm.provision "shell", :path => 'post-puppet.sh', :privileged => false

end
