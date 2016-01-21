############################################
# Setup Server
############################################

set :stage, :staging
set :stage_url, "vps238104.ovh.net"
server "149.202.56.206", user: "deploy", roles: %w{web app db}
set :deploy_to, "/var/www/kpress/preprod"

############################################
# Setup Git
############################################

set :branch, "development"

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
