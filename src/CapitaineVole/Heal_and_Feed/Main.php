<?php

namespace CapitaineVole\Heal_and_Feed;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onEnable()
    {
        $this->getLogger()->info("Heal and Feed c'est bien alumé avec succès");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()){
            case "heal":
                if ($sender instanceof Player){
                    if ($sender->hasPermission("use.heal")){
                        $sender->setHealth($sender->getMaxHealth());
                        $sender->sendMessage("§2Vous avez bein été heal");
                    } else{
                        $sender->sendMessage("§cErreur : Vous n'avez pas le permission d'utiliser cette commande");
                    }
                } else{
                    $sender->sendMessage("§4Vous n'êtes pas un joueur");
                }
                break;
            case "feed":
                if ($sender instanceof Player){
                    if ($sender->hasPermission("use.feed")){
                        $sender->setFood($sender->getMaxFood());
                        $sender->sendMessage("§2Vous avez bien été feed");
                    } else{
                        $sender->sendMessage("§cErreur : Vous n'avez pas le permission d'utiliser cette commande");
                    }
                } else{
                    $sender->sendMessage("§4Vous n'êtes pas un joueur");
                }
        }
        return true;
    }

}
