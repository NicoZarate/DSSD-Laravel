<?php

namespace Telegram\Bot\Commands;

use App\TodayMenu;
/**
 * Class HelpCommand.
 */
class TodayCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "today";

    /**
     * @var string Command Description
     */
    protected $description = "Today Menu Command";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
    	$menu=TodayMenu::where('date',date("Y-m-d"))->where('up',1)->first();
        if ($menu){
            //$this->replyWithMessage(['text' => 'menu menu']);
            //$prods = $menu->products();

            $text = 'El menú de hoy es: ' . PHP_EOL;
            foreach ($menu->products as $p) {
                $text .= $p->name . ' ' . '$' . $p->price . PHP_EOL;
            }

            $this->replyWithMessage(compact('text'));

        }
        else{
            $this->replyWithMessage(['text' => 'Lo sentimos, ¡hoy no hay menú!']);

        }

    }
}
