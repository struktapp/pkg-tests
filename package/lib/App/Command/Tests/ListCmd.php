<?php

namespace App\Command\Tests;

use Strukt\Console\Input;
use Strukt\Console\Output;
use Strukt\Core\Registry;

use Symfony\Component\Yaml\Yaml;

/**
* test:ls List Tests
*/
class ListCmd extends \Strukt\Console\Command{

	public function execute(Input $in, Output $out){

		$r = Registry::getSingleton();

		$appnr = $r->get("nr.app");

		foreach($appnr->getKeys() as $mod_alias){

			$mod = $appnr->get($mod_alias);

			foreach($mod->get("tes")->getKeys() as $obj_name){

				$ns = sprintf("%s.tes.%s", $mod_alias, $obj_name);

				$qns = $r->get("core")->getNamespace($ns);

				$child = get_class_methods($qns);
				$parent = get_class_methods(get_parent_class($qns));

				array_push($parent, "setUp");

				$methods = array_diff($child, $parent);

				$ls .= sprintf("* %s\n  - %s\n\n", $ns, implode("\n  - ", $methods));
			}
		}

		$out->add(sprintf("\n%s", $ls));
	}
}