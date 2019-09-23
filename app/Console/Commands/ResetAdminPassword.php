<?php

namespace App\Console\Commands;

use App\Models\Manager;
use Illuminate\Console\Command;

/**
 * Class ResetAdminPassword 重置超级管理员密码 id=1
 * @package App\Console\Commands
 */
class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reset admin password';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        //
        $password = \Str::random(10);
        Manager::first()->update(['password' => bcrypt($password)]);
        $this->info('new password:' . $password);
    }
}
