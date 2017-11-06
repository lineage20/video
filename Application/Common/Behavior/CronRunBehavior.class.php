<?php
namespace Common\Behavior;
use Think\Behavior;
defined('THINK_PATH') or exit();

class CronRunBehavior  extends Behavior {

	public function run(&$params) {
		$this -> checkTime();
	}

	private function checkTime() {
		if(F('CRON_CONFIG')){
			$crons = F('CRON_CONFIG');
		}
		if (!empty($crons) && is_array($crons)) {
			$update = false;
			// $log = array();
			foreach ($crons as $key => $cron) {
				if (empty($cron[2]) || $_SERVER['REQUEST_TIME'] > $cron[2]) {
					// G('cronStart');
					R($cron[0],array($key));
					// G('cronEnd');
					// $_useTime = G('cronStart', 'cronEnd', 6);
					$cron[2] = $_SERVER['REQUEST_TIME'] + $cron[1];
					$crons[$key] = $cron;
					// $log[] = 'Cron:' . $key . ' Runat ' . date('Y-m-d H:i:s') . ' Use ' . $_useTime . ' s ' . "\r\n";
					$update = true;
				}
			}
			if ($update) {
				F('CRON_CONFIG', $crons);
				// \Think\Log::write(implode('', $log));
			}
		}
	}
}
