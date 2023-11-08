<?php

namespace App\Infrastructure;

use Exception;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use function scandir;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
        $this->registerDomainCommands();
        require base_path('routes/console.php');
    }

    private function registerDomainCommands(string $path = null): void
    {
        $parent = $path ?? (__DIR__ . '/../Domain');

        try {
            $files = scandir($parent);
        } catch (Exception $e) {
            return;
        }

        foreach ($files as $key => $file) {
            if ($file === "." || $file === "..") {
                continue;
            }

            $path = $parent . '/' . $file;

            if (is_dir($path)) {
                if (str_ends_with($file, 'Commands')) {
                    $this->load($path);
                    continue;
                }

                $path = $path . '/Infrastructure';
                $this->registerDomainCommands($path);
            }
        }
    }
}
