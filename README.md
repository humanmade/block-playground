# Block Development Playground

This project gives you an Altis-powered environment to use for block editor experiments. All script loading should be handled by the plugins, so you're free to focus on block development!

Custom blocks should be created within the [`custom-blocks` mu-plugin](./content/mu-plugins/custom-blocks).

## Installation

```
git clone git@github.com:humanmade/block-playground.git
cd block-playground
composer chassis init
```

## Local Development

- `npm run phpcs`: Run the PHP CodeSniffer linting tool against your project code.
- `npm run vagrant`: Run any vagrant command against the virtual machine. May only be used after initializing the local Chassis development environment.
  - `npm run vagrant up`: Start the virtual machine.
  - `npm run vagrant halt`: Stop the virtual machine.
  - `npm run vagrant ssh`: SSH into the virtual machine.
  - `npm run vagrant ssh -- -c "wp plugin list"`: SSH into the virtual machine and execute an arbitrary command (list plugins, in this example).
    - **Note**: unlike the normal `vagrant ssh` command, note that using `npm run` requires us to put an additional `--` double-dash before we add the `-c` argument.
