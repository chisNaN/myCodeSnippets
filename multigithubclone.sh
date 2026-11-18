curl "https://api.github.com/users/YOUR_USERNAME/repos?per_page=100" | grep -e 'git_url*' | cut -d \" -f 4 | xargs -L1 git clone

# example with a pseudo and ssh keys

curl "https://api.github.com/users/chisNaN/repos?per_page=100" | grep -e 'ssh_url*' | cut -d \" -f 4 | cut -c15- | xargs -L1 git clone gh
