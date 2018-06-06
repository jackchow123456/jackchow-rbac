<?php
namespace Jackchow\Rbac\Command;

use think\console\Command as thinkCommand;
use think\console\Input;
use think\console\Output;
use think\Loader;
use think\facade\Env;
use Phinx\Util\Util;

class MigrateCommand extends thinkCommand
{
    protected function configure()
    {
        $this->setName('rbac:migrate')
            ->setDescription('generationRbacMigration');
    }

    protected function execute(Input $input, Output $output)
    {

        $migrate_from = __DIR__.'/../Database/migrations/migration.php';

        $seeds_from = __DIR__.'/../Database/seeds/RbacSeeder.php';

        if(!file_exists($migrate_from)){
            $output->writeln("The Migrations File is missing Please Contact To Author 775893055@qq.com");
        }

        if(!file_exists($seeds_from)){
            $output->writeln("The Seeds File is missing Please Contact To Author 775893055@qq.com");
        }

        $migrate_path = $this->getMigratePath();

        if (!file_exists($migrate_path)) {
            if ($this->output->confirm($this->input, 'Create migrations directory? [y]/n')) {
                mkdir($migrate_path, 0755, true);
            }
        }

        $this->verifyMigrationDirectory($migrate_path);

        $seed_path = $this->getSeederPath();

        if (!file_exists($seed_path)) {
            if ($this->output->confirm($this->input, 'Create seeders directory? [y]/n')) {
                mkdir($seed_path, 0755, true);
            }
        }

        $this->verifyMigrationDirectory($seed_path);


        $fileName = Util::mapClassNameToFileName('Rbac');


        if(file_exists($seed_path)){
            copy($seeds_from, $seed_path . DIRECTORY_SEPARATOR . 'RbacSeeder.php');
        }

        if(file_exists($migrate_path)){
            copy($migrate_from, $migrate_path . DIRECTORY_SEPARATOR . $fileName);
        }

        $output->writeln("Generate Migrate File Finish.");
    }

    protected function getMigratePath()
    {
        return Env::get('root_path') . 'database' . DIRECTORY_SEPARATOR . 'migrations';
    }

    protected function getSeederPath()
    {
        return Env::get('root_path') . 'database' . DIRECTORY_SEPARATOR . 'seeds';
    }

    protected function verifyMigrationDirectory($path)
    {
        if (!is_dir($path)) {
            throw new \InvalidArgumentException(sprintf('Migration directory "%s" does not exist', $path));
        }

        if (!is_writable($path)) {
            throw new \InvalidArgumentException(sprintf('Migration directory "%s" is not writable', $path));
        }
    }
}