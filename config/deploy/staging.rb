############################################
# Setup Server
############################################

set :stage, :staging
set :stage_url, "https://preprod.kpress.fr"
server "92.222.17.245", user: "keynetic", roles: %w{web app db}
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
