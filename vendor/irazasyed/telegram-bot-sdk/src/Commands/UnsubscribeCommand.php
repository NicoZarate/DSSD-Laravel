<?php

namespace Telegram\Bot\Commands;

use App\Subscriber;
/**
 * Class HelpCommand.
 */
class UnsubscribeCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "unsubscribe";

    /**
     * @var string Command Description
     */
    protected $description = "Unsubscribe Command";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->getUpdate()->getMessage()->getChat()->getId();
        try{ 
            $subscriber = Subscriber::where('chat_id', $chat_id)->firstOrFail()->delete();
            $this->replyWithMessage(['text' => 'Nos abandonaste :c ¡Adios!']);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            $this->replyWithMessage(['text' => '¡No se puede desubscribir algo que nunca se subscribió!']);
        }
    }
}
