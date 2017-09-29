curl "https://api.github.com/users/YOUR_USERNAME/repos?per_page=100" | grep -e 'git_url*' | cut -d \" -f 4 | xargs -L1 git clone
