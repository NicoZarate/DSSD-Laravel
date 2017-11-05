<?php

namespace Telegram\Bot\Commands;

use App\TodayMenu;
/**
 * Class HelpCommand.
 */
class TomorrowCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "tomorrow";

    /**
     * @var string Command Description
     */
    protected $description = "Tomorrow Menu Command";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {

        $tomorrow = date("Y-m-d", strtotime('tomorrow'));
    	$menu=TodayMenu::where('date', $tomorrow)->where('up',1)->first();
        if ($menu){

            $text = 'El menú de mañana es: ' . PHP_EOL;
            foreach ($menu->products as $p) {
                $text .= $p->name . ' ' . '$' . $p->price . PHP_EOL;
            }

            $this->replyWithMessage(compact('text'));

        }
        else{
            $this->replyWithMessage(['text' => 'Lo sentimos, ¡todavía no hay menú para mañana!']);

        }
    }
}
