############################################
# Setup Server
############################################

set :stage, :production
set :stage_url, "vps127271.ovh.net"
server "92.222.17.245", user: "root", roles: %w{web app db}
set :deploy_to, "/"

############################################
# Setup Git
############################################

set :branch, "master"

############################################
# Extra Settings
############################################

#specify extra ssh options:

#set :ssh_options, {
#    auth_methods: %w(password),
#    password: 'password',
#    user: 'username',
#}

#specify a specific temp dir if user is jailed to home
#set :tmp_dir, "/path/to/custom/tmp"
