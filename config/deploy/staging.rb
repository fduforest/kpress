############################################
# Setup Server
############################################

set :stage, :staging
set :stage_url, "kpress.ovh"
set :site1_url, "la-ferme-aux-charmes.ovh"
set :site2_url, "location-touquet.ovh"
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
