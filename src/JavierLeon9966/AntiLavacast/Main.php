<?php
declare(strict_types = 1);
namespace JavierLeon9966\AntiLavacast;
use pocketmine\block\{Lava, Water};
use pocketmine\event\block\BlockSpreadEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
class Main extends PluginBase implements Listener{

	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/**
	 * @ignoreCancelled
	 * @priority HIGHEST
	 */
	public function onBlockSpread(BlockSpreadEvent $event): void{
		$source = $event->getSource();
		if(($source instanceof Lava or $source instanceof Water) and $event->getBlock()->y != $source->y){
			$event->setCancelled();
		}
	}
}
