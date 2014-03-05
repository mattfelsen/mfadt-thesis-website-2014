MFAD+T Thesis Website 2014
=========================

## Software
1. MAMP - Apache (web server), MySQL (database server), PHP (server-side programming) for Mac
2. Sequel Pro - MySQL frontend GUI

## Setup

1. Fork the repo to make your own copy of the project
	- This is done on the GitHub site
	- Click the Fork button in the top right of the project page

2. Clone your repo, not the original project repo
	- Use Terminal or your GitHub client of choice
	- For Terminal, navigate to where you want and clone

			cd /Applications/MAMP/htdocs
			git clone https://github.com/YOUR_GITHUB_USERNAME/mfadt-thesis-website-2014.git

	- optionally, simplify this folder name

			mv mfadt-thesis-website-2014 mfadt

3. Set up upstream tracking. Verify by listing the remote sources

		git remote add upstream https://github.com/mattfelsen/mfadt-thesis-website-2014.git
		git remote -v

4. Set up WordPress and the database
	- Create a database called mfadt-2014
	- Import latest sql file with Sequel Pro
	- Create mfadt MySQL and add all permissions for mfadt-2014 database
	- Add wp-config.php file

5. Test WP Install
	- Navigate to `http://localhost:8888/mfadt` and make sure we're good to go


## Git Workflow
#### Notes
- The general hierarchy is:

	**master** -> **develop** -> **feature**

- **master** is what will be currently live on the mfadt site and is always 100% stable
- **develop** will be our live development site and will be nearly stable
- **master** and **develop** are never worked on directly. Always use a feature branch

#### Steps
1. Start from develop. Pull in the latest updates/changes. Think of this as `git pull` when working with an upstream repository

		git checkout develop
		git fetch upstream
		git merge upstream/develop

2. Make your feature branch

		git checkout -b my-feature
		
	(This command creates a branch called my-feature and then switches to that branch. It's shorthand for)
	
		git branch my-feature
		git checkout my-feature

3. Make all your changes. Add files, change files, delete files. When you're ready:

		git add file1.php
		git add file2.php
		git commit -m "I added this sweet thing"

4. Merge it into develop

		git checkout develop
		git merge --no-ff my-feature
		git branch -d my-feature

5. Submit a pull request on GitHub!