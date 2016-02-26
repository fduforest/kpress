############################################
# Setup Server
############################################

set :stage, :production
set :stage_url, "kpress.ovh"
set :site1_url, "la-ferme-aux-charmes.fr"
set :site2_url, "location-vacances-le-touquet.fr"
server "149.202.56.206", user: "deploy", roles: %w{web app db}
set :deploy_to, "/var/www/kpress/"

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
