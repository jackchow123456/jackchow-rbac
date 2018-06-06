<?php
namespace Jackchow\Rbac\Command;

use think\console\Command as thinkCommand;
use think\console\Input;
use think\console\Output;
use think\Loader;

class PublishCommand extends thinkCommand
{
    protected function configure()
    {
        $this->setName('rbac:publish')
            ->setDescription('generationRbacConfigureFile');
    }

    protected function execute(Input $input, Output $output)
    {
        $from = __DIR__.'/../../config/config.php';

        $to = Loader::getRootPath().'config';
        if(!file_exists($from)){
            $output->writeln("The Configure File is missing Please Contact To Author 775893055@qq.com");
        }

        copy($from, $to . '/rbac.php');

        $output->writeln("Generate Configure File Finish");
    }
}