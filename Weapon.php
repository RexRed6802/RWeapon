<?php
namespace Weapon;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\block\Air;
use pocketmine\entity\Effect;
use pocketmine\scheduler\CallbackTask;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Server;
use pocketmine\inventory\Inventory;
use pocketmine\utils\TextFormat;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
class Weapon extends PluginBase implements Listener {
public $tps;
public $players = [];
public $move = [];
  public function onEnable() {
  $this->getLogger()->info(TextFormat::GOLD."Weapon武器插件已启用 by:RexRed");
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
   	
  public function onHurt(EntityDamageEvent $event) {
$n= mt_rand(0,100);
    if ($event instanceof EntityDamageByEntityEvent) {
        $damager = $event->getDamager();
        $entity = $event->getEntity();
         $dn = $damager->getName();
         $bn = $entity->getName();
        if($damager instanceof Player){
switch($damager->getInventory()->getItemInHand()->getId()){
case'267':
if($n <= 10){
$damager->sendMessage("§c[ 戰士之劍 ]爆擊+3");
$event->setDamage($event->getDamage()+3);
}
break;
case'276':
if($n <= 10){
$damager->sendMessage("§c[ 精靈之劍 ]爆擊+5");
$event->setDamage($event->getDamage()+5);
}
if($n <= 20){
$damager->sendMessage("§c[ 精靈之劍 ]皇族寄託：炎天絕");
$entity->setOnFire(15);
}
if($n<=30){
$effect1=Effect::getEffect(Effect::SPEED);
			$effect1->setVisible(true);
			$effect1->setAmplifier(1);
			$effect1->setDuration(20*10);
$damager->addEffect($effect1);
$damage->sendMessage("§c[ 精靈之劍 ]精靈賞賜：速度加強1");
}
break;
case'283':
if($n <= 50){
$damager->sendMessage("§c[ 黃金之劍 ]燃燒！");
$entity->setOnFire(15);
}
break;
case'287':
}
}
}
}
}
