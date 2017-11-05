<?php

namespace Telegram\Bot\Commands;

use App\Subscriber;
/**
 * Class HelpCommand.
 */
class SubscribeCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "subscribe";

    /**
     * @var string Command Description
     */
    protected $description = "Subscribe Command";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->getUpdate()->getMessage()->getChat()->getId();
        try{ 
            $subscriber = Subscriber::create(['chat_id' => $chat_id]);
            $this->replyWithMessage(['text' => '¡Felicitaciones! Te subscribiste al mejor BuffeBot del universo. Periódicamente te enviaremos novedades del menú del buffet.']);
        }
        catch (\Illuminate\Database\QueryException $e){
            $this->replyWithMessage(['text' => 'Gracias por tu interés, pero ¡ya estás subscripto!']);
        }

    }
}
