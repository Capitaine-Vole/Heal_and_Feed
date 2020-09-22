<?php

namespace CapitaineVole\Heal_and_Feed;

use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onEnable()
    {
        $this->getLogger()->info("Heal and Feed c'est bien alumé avec succès");
        // config
        @mkdir($this->getDataFolder());
        $this->saveResource("message.yml");
        $this->msg = new Config($this->getDataFolder() . "message.yml", Config::YAML);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()){
            case "heal":
                if ($sender instanceof Player){
                    if ($sender->hasPermission("use.heal")){
                        $sender->setHealth($sender->getMaxHealth());
                        $sender->sendMessage($this->msg->get("heal"));
                    } else{
                        $sender->sendMessage($this->msg->get("heal-no-perm"));
                    }
                } else{
                    $sender->sendMessage($this->msg->get("is-console"));
                }
                break;
            case "feed":
                if ($sender instanceof Player){
                    if ($sender->hasPermission("use.feed")){
                        $sender->setFood($sender->getMaxFood());
                        $sender->sendMessage($this->msg->get("feed"));
                    } else{
                        $sender->sendMessage($this->msg->get("feed-no-perm"));
                    }
                } else{
                    $sender->sendMessage($this->msg->get("is-console"));
                }
        }
        return true;
    }

}
