<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepository;

class RouletteLeaderboard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roulette:leaderboard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show russian roulette game leaderboard.';


    private CacheRepository $cacheRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CacheRepository $cacheRepository)
    {
        parent::__construct();
        $this->cacheRepository = $cacheRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $statistics = $this->cacheRepository->get('Roulette results', []);

        $table = [];

        foreach ($statistics as $key => $count) {
            $table[] = [$key, $count];
        }
        ksort($table);

        $this->table(['Name', 'Times survived'], $table);
    }
}
