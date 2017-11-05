<?php

namespace Telegram\Bot\Commands;

/**
 * Class HelpCommand.
 */
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "Start Command to get you started";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithMessage(['text' => '¡Bienvenido al BuffeBot! Escriba /help para ver todos los comandos disponibles.']);

    }
}
