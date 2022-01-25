<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepository;

class RoulettePlay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roulette:play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Play russian roulette game.';

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
        $name = $this->ask(
            "Only the brave will play this game. Please, name yourself !"
        );
        do {
            $bulletInChamber = rand(1,6);
            $playerGotChamber = rand(1,6);

            $this->info("Bullet in chamber: " . $bulletInChamber);
            $this->info("Player got chamber: " . $playerGotChamber);


            if($bulletInChamber === $playerGotChamber)
            {
                $cursed_numbers = $this->cacheRepository->get('Cursed-numbers', []);
                $cursed_numbers[$bulletInChamber] = $cursed_numbers[$bulletInChamber] ?? 0;
                $cursed_numbers[$bulletInChamber]++;

                $this->cacheRepository->set('Cursed-numbers', $cursed_numbers, 86400);


                $this->info("Congrats! Back to zero leader score. Reason: You died !");
                $statistics = $this->cacheRepository->get('Roulette results', []);
                $statistics[$name] = 0;

                $this->cacheRepository->set('Roulette results', $statistics, 86400);

                $killstreak = $this->cacheRepository->get('Kill-streak', 0);
                $killstreak++;
                $this->cacheRepository->set('Kill-streak', $killstreak, 86400);
                switch($killstreak){
                    case 1:
                        break;
                    case 2:
                        $this->info("DOUBLE KILL!");
                        break;
                    case 3:
                        $this->info("TRIPLE KILL!");
                        break;
                    case 4:
                        $this->info("MULTI KILL!");
                        break;
                    case 5:
                        $this->info("M-M-MONSTER KILL!");
                        break;
                    default:
                        $this->info("DOMINATING!");
                }
            } else {
                $statistics = $this->cacheRepository->get('Roulette results', []);
                $statistics[$name] = $statistics[$name] ?? 0;


                    $this->info("You survived !");
                    $statistics[$name]++;

                $this->cacheRepository->set('Roulette results', $statistics, 86400);
                $this->cacheRepository->set('Kill-streak', 0, 86400);

            }
        } while($bulletInChamber !== $playerGotChamber && strtolower($this->ask("Type Y to play again ?")) === 'y');
    }
}
