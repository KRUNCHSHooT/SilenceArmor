<?php

declare(strict_types=1);

namespace KRUNCHSHooT\SilenceArmor;

use KRUNCHSHooT\LibTrimArmor\LibTrimArmor;
use KRUNCHSHooT\LibTrimArmor\MaterialType;
use KRUNCHSHooT\LibTrimArmor\PatternType;
use KRUNCHSHooT\LibTrimArmor\utils\TrimUtils;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use ReflectionClass;

class Main extends PluginBase {

    public function onCommand(\pocketmine\command\CommandSender $sender, \pocketmine\command\Command $command, string $label, array $args) : bool {
        if($command->getName() == "trim"){
            if(!$sender instanceof Player){
                $sender->sendMessage("USE IN GAME");
                return true;
            }
            $armor = [VanillaItems::NETHERITE_HELMET(), VanillaItems::NETHERITE_CHESTPLATE(), VanillaItems::NETHERITE_LEGGINGS(), VanillaItems::NETHERITE_BOOTS()];
            foreach($armor as $item){
                LibTrimArmor::create($item, MaterialType::EMERALD, PatternType::SILENCE);
                $sender->getInventory()->addItem($item);
            }
            return true;
            
        }
        return true;
    }

}
