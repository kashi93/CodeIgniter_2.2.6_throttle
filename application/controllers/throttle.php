<?php
class Throttle extends CI_Controller
{

	public function index()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	
		$key = "in_use";
		$second = 120;
		$cache = $this->cache;

		if($this->cache->apc->is_supported() == false){
			$cache = $this->cache->file;
		}

		if ($cache->get($key) == true) {
			echo "To many attempt";
			return "To many attempt";
		}

		$cache->save($key, true, $second);

		// ...,

		sleep(rand(1, 3));
		// $this->cache->delete($key);

		echo "Success";
		return "Success";
	}
}
