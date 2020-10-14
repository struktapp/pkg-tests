<?php

namespace App\Command\Tests;

use Strukt\Console\Input;
use Strukt\Console\Output;
use Strukt\Core\Registry;
use Strukt\Env;
use Strukt\Raise;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use PHPUnit\TextUI\ResultPrinter;
use PHPUnit\TextUI\TestRunner;

/**
* test:run  Run Tests
* 
* Usage:
*	
*      test:run <class> [<method>]
*
* Arguments:
*
*      class     Strukt class namespace
*      method    Method name
*/
class Exec extends \Strukt\Console\Command{

	public function execute(Input $in, Output $out){

		$class = $in->get("class");	 
		$method = $in->get("method");	 	

		$core = Registry::getSingleton()->get("core");

		$suite = new TestSuite();

		if(!empty($class)){

			if(!preg_match("/^\w+\.tes\.\w+$/", $class))
				new Raise(sprintf("Invalid namespace [%s]!", $class));

			if(!empty($method)){

				$reflect = new \ReflectionClass($core->get($class));

				$suite->addTest($reflect->newInstance($method));
			}
			else{

				$suite->addTestSuite($core->getNamespace($class));
			}
		}

		$runner = new TestRunner();
		// $runner->doRun($suite);
		$runner->run($suite);
			
		// $out->add("Models generated successfully.");
	}
}