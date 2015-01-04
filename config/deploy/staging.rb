############################################
# Setup Server
############################################

set :stage, :staging
set :stage_url, "http://www.example.com"
server "92.222.17.245", user: "root", roles: %w{web app db}
set :deploy_to, "/preprod"

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
