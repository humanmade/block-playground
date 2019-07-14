# Block Development Playground

This project gives you an Altis-powered environment to use for block editor experiments. All script loading should be handled by the plugins, so you're free to focus on block development!

Custom blocks should be created within the [`custom-blocks` mu-plugin](./content/mu-plugins/custom-blocks).

## Installation

```
git clone git@github.com:humanmade/block-playground.git
cd block-playground
composer install
npm install
composer chassis init
```

You will now be able to load the site at [altis.local](http://altis.local), and [sign in](http://altis.local/admin) with the username `admin` and password `password`.

## Local Development

**Frontend development commands**

- `npm start`: Run the hot-reloading development server.
- `npm run build`: Generate production-ready frontend asset bundles.
- `npm run phpcs`: Run the PHP CodeSniffer linting tool against your project code.

**Virtual Machine commands**

`npm run vagrant`

Run any vagrant command against the virtual machine (providing that the local Chassis development environment has been initialized). You may use this script to easily run most `vagrant` commands, wherever you are in the project. For example:

- `npm run vagrant up`: Start the virtual machine.
- `npm run vagrant halt`: Stop the virtual machine.
- `npm run vagrant ssh`: SSH into the virtual machine.

Note: Because of how `npm run` scripts work, you wish to pass _arguments_ to a vagrant command (for example `vagrant ssh -c "wp plugin list"`) then you will need to put an additional `--` double-dash between the npm script command and the command's arguments. Examples:

- `npm run vagrant ssh -- -c "wp plugin list"`
  - List out installed plugins. Any WP-CLI command should work if invoked in this manner.
- `npm run vagrant ssh -- -c "mysqldump -uwordpress -pvagrantpassword wordpress > /chassis/database-backup.sql"`
  - Dump the `wordpress` database within the VM to a file `database-backup.sql` in your project root.
- `npm run vagrant destroy -- -f`
  - Destroy the virtual machine.
